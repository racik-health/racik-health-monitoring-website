<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dispenser;
use App\Models\DispenserControlLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DispenserController extends Controller
{
    public function index(): View
    {
        // Basic dispenser statistics
        $totalDispensers = Dispenser::count();

        // Dispenser status distribution
        $dispenserStatus = Dispenser::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        // Ensure all status types have a value
        $dispenserStatus = array_merge([
            'active' => 0,
            'inactive' => 0,
            'maintenance' => 0
        ], $dispenserStatus);

        // Recently active dispensers (last 24 hours)
        $recentlyActiveDispensers = Dispenser::where('last_online', '>=', Carbon::now()->subDay())
            ->count();

        // Dispensers offline for more than 7 days
        $longOfflineDispensers = Dispenser::where('status', 'active')
            ->where('last_online', '<', Carbon::now()->subDays(7))
            ->count();

        // Dispensers that have never been online
        $neverOnlineDispensers = Dispenser::whereNull('last_online')->count();

        // Dispenser operations statistics
        $totalOperations = DispenserControlLog::count();
        $operationsToday = DispenserControlLog::whereDate('executed_at', Carbon::today())->count();
        $operationsThisWeek = DispenserControlLog::where('executed_at', '>=', Carbon::now()->startOfWeek())->count();

        // Operations by status
        $operationsByStatus = DispenserControlLog::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        $successfulOperations = $operationsByStatus['completed'] ?? 0;
        $failedOperations = $operationsByStatus['failed'] ?? 0;
        $inProgressOperations = $operationsByStatus['in_progress'] ?? 0;

        // Calculate success rate
        $successRate = $totalOperations > 0
            ? round(($successfulOperations / $totalOperations) * 100, 1)
            : 0;

        // Most active dispensers
        $mostActiveDispensers = DispenserControlLog::select('dispenser_id', DB::raw('count(*) as count'))
            ->with('dispenser')
            ->groupBy('dispenser_id')
            ->orderBy('count', 'desc')
            ->limit(6)
            ->get();

        // Most common commands
        $commonCommands = DispenserControlLog::select('command', DB::raw('count(*) as count'))
            ->groupBy('command')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();

        // Users with most dispenser operations
        $usersWithMostOperations = DispenserControlLog::select('user_id', DB::raw('count(*) as count'))
            ->with('user')
            ->groupBy('user_id')
            ->orderBy('count', 'desc')
            ->limit(6)
            ->get();

        // Recent dispenser operations
        $recentOperations = DispenserControlLog::with(['user', 'dispenser'])
            ->orderBy('executed_at', 'desc')
            ->limit(10)
            ->get();

        // Weekly operation trends
        $weeklyTrends = DispenserControlLog::select(
            DB::raw('DATE(executed_at) as date'),
            DB::raw('count(*) as count')
        )
            ->where('executed_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date')
            ->map(function ($item) {
                return $item->count;
            })
            ->toArray();

        // Fill in missing dates
        $dateRange = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $dateRange[$date] = $weeklyTrends[$date] ?? 0;
        }

        // System health alerts
        $systemHealth = [
            'inactiveDispenserAlert' => ($dispenserStatus['inactive'] ?? 0) > 0,
            'maintenanceDispenserAlert' => ($dispenserStatus['maintenance'] ?? 0) > 0,
            'longOfflineDispenserAlert' => $longOfflineDispensers > 0,
            'pendingOperationsAlert' => $inProgressOperations > 0,
            'neverOnlineDispenserAlert' => $neverOnlineDispensers > 0
        ];

        return view('app.admin.pages.dispensers.index', compact(
            'totalDispensers',
            'dispenserStatus',
            'recentlyActiveDispensers',
            'longOfflineDispensers',
            'neverOnlineDispensers',
            'totalOperations',
            'operationsToday',
            'operationsThisWeek',
            'successfulOperations',
            'failedOperations',
            'inProgressOperations',
            'successRate',
            'mostActiveDispensers',
            'commonCommands',
            'usersWithMostOperations',
            'recentOperations',
            'dateRange',
            'systemHealth'
        ));
    }
}
