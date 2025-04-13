<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Dispenser;
use App\Models\HerbalMedicine;
use App\Models\ConsumptionHistory;
use App\Models\HealthInput;
use App\Models\RecommendationResult;
use App\Models\DispenserControlLog;
use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(): View
    {
        // Time periods for trend analysis
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $thisWeekStart = Carbon::now()->startOfWeek();
        $lastWeekStart = Carbon::now()->subWeek()->startOfWeek();
        $lastWeekEnd = Carbon::now()->subWeek()->endOfWeek();
        $thisMonthStart = Carbon::now()->startOfMonth();
        $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();
        $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();

        // User statistics
        $totalUsers = User::count();
        $newUsersToday = User::whereDate('created_at', $today)->count();
        $newUsersThisWeek = User::where('created_at', '>=', $thisWeekStart)->count();
        $newUsersThisMonth = User::where('created_at', '>=', $thisMonthStart)->count();

        $genderDistribution = User::select('gender', DB::raw('count(*) as count'))
            ->groupBy('gender')
            ->pluck('count', 'gender')
            ->toArray();

        // User growth trend (last 6 months)
        $userGrowthTrend = User::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                return [
                    'month' => Carbon::createFromDate($item->year, $item->month, 1)->format('M Y'),
                    'count' => $item->count
                ];
            });

        // Dispenser statistics
        $totalDispensers = Dispenser::count();
        $dispenserStatus = Dispenser::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        $activeDispensersPercent = $totalDispensers > 0
            ? round((($dispenserStatus['active'] ?? 0) / $totalDispensers) * 100, 1)
            : 0;

        $recentlyActiveDispensers = Dispenser::where('status', 'active')
            ->where('last_online', '>=', Carbon::now()->subHours(24))
            ->count();

        $longOfflineDispensers = Dispenser::where('status', 'active')
            ->where('last_online', '<', Carbon::now()->subDays(7))
            ->count();

        // Herbal medicine statistics
        $totalHerbalMedicines = HerbalMedicine::count();
        $totalStock = HerbalMedicine::sum('stock');
        $lowStockMedicines = HerbalMedicine::where('stock', '<', 10)->count();
        $outOfStockMedicines = HerbalMedicine::where('stock', 0)->count();

        // Top 5 herbal medicines by stock
        $topStockMedicines = HerbalMedicine::orderByDesc('stock')
            ->limit(5)
            ->get(['id', 'name', 'stock']);

        // Consumption statistics
        $totalConsumptions = ConsumptionHistory::count();
        $consumptionsToday = ConsumptionHistory::whereDate('consumed_at', $today)->count();
        $consumptionsThisWeek = ConsumptionHistory::where('consumed_at', '>=', $thisWeekStart)->count();
        $consumptionsThisMonth = ConsumptionHistory::where('consumed_at', '>=', $thisMonthStart)->count();

        // Weekly consumption comparison
        $thisWeekConsumptions = ConsumptionHistory::where('consumed_at', '>=', $thisWeekStart)
            ->count();
        $lastWeekConsumptions = ConsumptionHistory::whereBetween('consumed_at', [$lastWeekStart, $lastWeekEnd])
            ->count();
        $weeklyConsumptionChange = $lastWeekConsumptions > 0
            ? round((($thisWeekConsumptions - $lastWeekConsumptions) / $lastWeekConsumptions) * 100, 1)
            : 0;

        // Top 5 most consumed medicines
        $topConsumedMedicines = ConsumptionHistory::select(
            'herbal_medicine_id',
            DB::raw('SUM(quantity) as total_consumed')
        )
            ->with('herbalMedicine:id,name')
            ->groupBy('herbal_medicine_id')
            ->orderByDesc('total_consumed')
            ->limit(5)
            ->get();

        // Consumption trend (last 6 months)
        $consumptionTrend = ConsumptionHistory::select(
            DB::raw('YEAR(consumed_at) as year'),
            DB::raw('MONTH(consumed_at) as month'),
            DB::raw('SUM(quantity) as total')
        )
            ->where('consumed_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                return [
                    'month' => Carbon::createFromDate($item->year, $item->month, 1)->format('M Y'),
                    'total' => $item->total
                ];
            });

        // Health input statistics
        $totalHealthInputs = HealthInput::count();
        $healthInputsToday = HealthInput::whereDate('created_at', $today)->count();
        $healthInputsThisWeek = HealthInput::where('created_at', '>=', $thisWeekStart)->count();
        $healthInputsThisMonth = HealthInput::where('created_at', '>=', $thisMonthStart)->count();

        // Common symptoms (assuming symptoms are stored as comma-separated values)
        $commonSymptoms = HealthInput::select('symptoms', DB::raw('COUNT(*) as count'))
            ->groupBy('symptoms')
            ->orderByDesc('count')
            ->limit(5)
            ->get();

        // Recommendation statistics
        $totalRecommendations = RecommendationResult::count();
        $recommendationsToday = RecommendationResult::whereDate('created_at', $today)->count();
        $recommendationsThisWeek = RecommendationResult::where('created_at', '>=', $thisWeekStart)->count();
        $recommendationsThisMonth = RecommendationResult::where('created_at', '>=', $thisMonthStart)->count();

        $avgConfidenceScore = RecommendationResult::avg('confidence_score');

        // Top 5 most recommended medicines
        $topRecommendedMedicines = RecommendationResult::select(
            'herbal_medicine_id',
            DB::raw('COUNT(*) as count')
        )
            ->with('herbalMedicine:id,name')
            ->groupBy('herbal_medicine_id')
            ->orderByDesc('count')
            ->limit(5)
            ->get();

        // High confidence recommendations (>90%)
        $highConfidenceRecommendations = RecommendationResult::where('confidence_score', '>=', 90)->count();
        $highConfidencePercent = $totalRecommendations > 0
            ? round(($highConfidenceRecommendations / $totalRecommendations) * 100, 1)
            : 0;

        // Dispenser control statistics
        $dispenserOperations = DispenserControlLog::count();
        $operationsToday = DispenserControlLog::whereDate('executed_at', $today)->count();
        $operationsThisWeek = DispenserControlLog::where('executed_at', '>=', $thisWeekStart)->count();
        $operationsThisMonth = DispenserControlLog::where('executed_at', '>=', $thisMonthStart)->count();

        $successfulOperations = DispenserControlLog::where('status', 'completed')->count();
        $failedOperations = DispenserControlLog::where('status', 'failed')->count();
        $inProgressOperations = DispenserControlLog::where('status', 'in_progress')->count();

        $successRate = $dispenserOperations > 0
            ? round(($successfulOperations / $dispenserOperations) * 100, 1)
            : 0;

        // Most active dispensers
        $mostActiveDispensers = DispenserControlLog::select(
            'dispenser_id',
            DB::raw('COUNT(*) as count')
        )
            ->with('dispenser:id,name')
            ->groupBy('dispenser_id')
            ->orderByDesc('count')
            ->limit(5)
            ->get();

        // Most active users
        $mostActiveUsers = DispenserControlLog::select(
            'user_id',
            DB::raw('COUNT(*) as count')
        )
            ->with('user:id,name')
            ->groupBy('user_id')
            ->orderByDesc('count')
            ->limit(5)
            ->get();

        // System health metrics
        $systemHealth = [
            'lowStockAlert' => $lowStockMedicines > 0,
            'outOfStockAlert' => $outOfStockMedicines > 0,
            'inactiveDispenserAlert' => ($dispenserStatus['inactive'] ?? 0) > 0,
            'maintenanceDispenserAlert' => ($dispenserStatus['maintenance'] ?? 0) > 0,
            'longOfflineDispenserAlert' => $longOfflineDispensers > 0,
            'pendingOperationsAlert' => $inProgressOperations > 0,
        ];

        return view('app.admin.pages.dashboard.index', compact(
            // User statistics
            'totalUsers',
            'newUsersToday',
            'newUsersThisWeek',
            'newUsersThisMonth',
            'genderDistribution',
            'userGrowthTrend',

            // Dispenser statistics
            'totalDispensers',
            'dispenserStatus',
            'activeDispensersPercent',
            'recentlyActiveDispensers',
            'longOfflineDispensers',

            // Herbal medicine statistics
            'totalHerbalMedicines',
            'totalStock',
            'lowStockMedicines',
            'outOfStockMedicines',
            'topStockMedicines',

            // Consumption statistics
            'totalConsumptions',
            'consumptionsToday',
            'consumptionsThisWeek',
            'consumptionsThisMonth',
            'thisWeekConsumptions',
            'lastWeekConsumptions',
            'weeklyConsumptionChange',
            'topConsumedMedicines',
            'consumptionTrend',

            // Health input statistics
            'totalHealthInputs',
            'healthInputsToday',
            'healthInputsThisWeek',
            'healthInputsThisMonth',
            'commonSymptoms',

            // Recommendation statistics
            'totalRecommendations',
            'recommendationsToday',
            'recommendationsThisWeek',
            'recommendationsThisMonth',
            'avgConfidenceScore',
            'topRecommendedMedicines',
            'highConfidenceRecommendations',
            'highConfidencePercent',

            // Dispenser control statistics
            'dispenserOperations',
            'operationsToday',
            'operationsThisWeek',
            'operationsThisMonth',
            'successfulOperations',
            'failedOperations',
            'inProgressOperations',
            'successRate',
            'mostActiveDispensers',
            'mostActiveUsers',

            // System health
            'systemHealth'
        ));
    }
}
