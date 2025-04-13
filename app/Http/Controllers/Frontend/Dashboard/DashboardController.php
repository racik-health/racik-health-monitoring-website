<?php

namespace App\Http\Controllers\Frontend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ConsumptionHistory;
use App\Models\Dispenser;
use App\Models\DispenserControlLog;
use App\Models\HealthInput;
use App\Models\HerbalMedicine;
use App\Models\RecommendationResult;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $userId = $user->id;

        // Health Input Statistics
        $totalHealthInputs = HealthInput::where('user_id', $userId)->count();
        $recentHealthInput = HealthInput::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->first();

        // Common symptoms (assuming symptoms are stored as comma-separated values)
        $commonSymptoms = HealthInput::where('user_id', $userId)
            ->select('symptoms', DB::raw('COUNT(*) as count'))
            ->groupBy('symptoms')
            ->orderByDesc('count')
            ->limit(3)
            ->get();

        // Recommendation Statistics
        $totalRecommendations = RecommendationResult::where('user_id', $userId)->count();
        $recentRecommendation = RecommendationResult::where('user_id', $userId)
            ->with('herbalMedicine:id,name,description')
            ->orderBy('created_at', 'desc')
            ->first();

        // Most recommended herbal medicine
        $mostRecommendedMedicine = RecommendationResult::where('user_id', $userId)
            ->select('herbal_medicine_id', DB::raw('COUNT(*) as count'))
            ->with('herbalMedicine:id,name')
            ->groupBy('herbal_medicine_id')
            ->orderByDesc('count')
            ->first();

        // Average confidence score
        $avgConfidenceScore = RecommendationResult::where('user_id', $userId)
            ->avg('confidence_score');

        // Consumption History Statistics
        $totalConsumptions = ConsumptionHistory::where('user_id', $userId)->count();
        $totalQuantityConsumed = ConsumptionHistory::where('user_id', $userId)
            ->sum('quantity');

        // Recent consumption history
        $recentConsumptions = ConsumptionHistory::where('user_id', $userId)
            ->with('herbalMedicine:id,name')
            ->orderBy('consumed_at', 'desc')
            ->limit(5)
            ->get();

        // Most consumed herbal medicine
        $mostConsumedMedicine = ConsumptionHistory::where('user_id', $userId)
            ->select('herbal_medicine_id', DB::raw('SUM(quantity) as total_quantity'))
            ->with('herbalMedicine:id,name')
            ->groupBy('herbal_medicine_id')
            ->orderByDesc('total_quantity')
            ->first();

        // Monthly consumption trend (last 6 months)
        $sixMonthsAgo = Carbon::now()->subMonths(6);
        $monthlyConsumption = ConsumptionHistory::where('user_id', $userId)
            ->where('consumed_at', '>=', $sixMonthsAgo)
            ->select(
                DB::raw('YEAR(consumed_at) as year'),
                DB::raw('MONTH(consumed_at) as month'),
                DB::raw('SUM(quantity) as total')
            )
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

        // Dispenser Control Statistics
        $dispenserControls = DispenserControlLog::where('user_id', $userId)->count();
        $successfulControls = DispenserControlLog::where('user_id', $userId)
            ->where('status', 'completed')
            ->count();

        // Success rate percentage
        $successRate = $dispenserControls > 0
            ? round(($successfulControls / $dispenserControls) * 100, 1)
            : 0;

        // Recent dispenser operations
        $recentDispenserOperations = DispenserControlLog::where('user_id', $userId)
            ->with('dispenser:id,name')
            ->orderBy('executed_at', 'desc')
            ->limit(3)
            ->get();

        return view('app.frontend.pages.dashboard.index', compact(
            'totalHealthInputs',
            'recentHealthInput',
            'commonSymptoms',
            'totalRecommendations',
            'recentRecommendation',
            'mostRecommendedMedicine',
            'avgConfidenceScore',
            'totalConsumptions',
            'totalQuantityConsumed',
            'recentConsumptions',
            'mostConsumedMedicine',
            'monthlyConsumption',
            'dispenserControls',
            'successfulControls',
            'successRate',
            'recentDispenserOperations'
        ));
    }
}
