<?php

namespace App\Http\Controllers\Frontend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dispenser;
use App\Models\DispenserControlLog;
use App\Models\HealthInput;
use App\Models\RecommendationResult;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RecommendationController extends Controller
{
    public function index(): View
    {
        // Get all health inputs with recommendations for the user
        $healthInputs = HealthInput::where('user_id', Auth::id())
            ->with(['recommendationResults.herbalMedicine'])
            ->whereHas('recommendationResults')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('app.frontend.pages.dashboard.health.recommendations.index', [
            'healthInputs' => $healthInputs
        ]);
    }

    public function show(int $healthInputId): View
    {
        // Get the health input with its recommendations
        $healthInput = HealthInput::where('id', $healthInputId)
            ->where('user_id', Auth::id())
            ->with(['recommendationResults.herbalMedicine'])
            ->firstOrFail();

        // Get active dispensers for the dispenser selection
        $activeDispensers = Dispenser::where('status', 'active')->get();

        return view('app.frontend.pages.dashboard.health.recommendations.show', [
            'healthInput' => $healthInput,
            'activeDispensers' => $activeDispensers
        ]);
    }

    public function prepareInDispenser(Request $request): RedirectResponse
    {
        // Validate the request
        $validated = $request->validate([
            'recommendation_id' => 'required|exists:recommendation_results,id',
            'dispenser_id' => 'required|exists:dispensers,id',
            'quantity' => 'required|integer|min:1|max:5',
        ]);

        // Get the recommendation
        $recommendation = RecommendationResult::with('herbalMedicine')
            ->findOrFail($validated['recommendation_id']);

        // Get the dispenser
        $dispenser = Dispenser::findOrFail($validated['dispenser_id']);

        // Check if dispenser is active
        if ($dispenser->status !== 'active') {
            return back()->with('error', 'Dispenser tidak aktif. Silakan pilih dispenser lain.');
        }

        // Check if herbal medicine has enough stock
        if ($recommendation->herbalMedicine->stock < $validated['quantity']) {
            return back()->with('error', 'Stok jamu tidak mencukupi.');
        }

        // Create command for the dispenser
        $command = json_encode([
            'action' => 'prepare',
            'medicine_id' => $recommendation->herbal_medicine_id,
            'medicine_name' => $recommendation->herbalMedicine->name,
            'quantity' => $validated['quantity']
        ]);

        // Log the dispenser control operation
        $log = DispenserControlLog::create([
            'user_id' => Auth::id(),
            'dispenser_id' => $validated['dispenser_id'],
            'status' => 'in_progress',
            'command' => $command,
            'response' => 'Menunggu respons dari dispenser',
            'ip_address' => $request->ip(),
            'executed_at' => now(),
        ]);

        // TODO: Send command to the dispenser
        // In a real application, you would send the command to the actual dispenser
        // For now, we'll simulate a successful operation

        // Update the log status (in a real app, this would happen after receiving response from dispenser)
        $log->update([
            'status' => 'completed',
            'response' => json_encode(['status' => 'success', 'message' => 'Jamu berhasil disiapkan'])
        ]);

        // Decrease the herbal medicine stock
        $recommendation->herbalMedicine->decrement('stock', $validated['quantity']);

        // Create consumption history
        $recommendation->herbalMedicine->consumptionHistories()->create([
            'user_id' => Auth::id(),
            'quantity' => $validated['quantity'],
            'note' => 'Disiapkan melalui dispenser ' . $dispenser->name,
            'consumed_at' => now(),
        ]);

        return redirect()->route('patient.dashboard')
            ->with('success', 'Jamu ' . $recommendation->herbalMedicine->name . ' sedang disiapkan di dispenser ' . $dispenser->name);
    }
}
