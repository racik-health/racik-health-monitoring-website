<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ConsumptionReportStoreRequest;
use App\Http\Requests\Admin\ConsumptionReportUpdateRequest;
use App\Models\HerbalMedicine;
use App\Models\User;
use App\Repositories\Contracts\Admin\ConsumtionReportRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ConsumptionReportController extends Controller
{
    public function __construct(public ConsumtionReportRepositoryInterface $consumptionReportRepository)
    {
        $this->consumptionReportRepository = $consumptionReportRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data['consumption_reports'] = $this->consumptionReportRepository->getAllConsumtionReports();
        return view('app.admin.pages.reports.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $data['patients'] = User::latest()->get();
        $data['herbal_medicines'] = HerbalMedicine::latest()->get();
        return view('app.admin.pages.reports.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsumptionReportStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        try {
            $consumption = $this->consumptionReportRepository->createConsumtionReport($validated);

            return redirect()->route('admin.consumption-reports.index')->with('success', 'Data laporan konsumsi berhasil ditambahkan');
        } catch (\Exception $e) {
            Log::error('Terjadi kesalahan saat menambahkan data laporan konsumsi: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan data laporan konsumsi, silahkan coba lagi');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $data['consumption_report'] = $this->consumptionReportRepository->getConsumtionReportById($id);
        $data['patients'] = User::latest()->get();
        $data['herbal_medicines'] = HerbalMedicine::latest()->get();
        return view('app.admin.pages.reports.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConsumptionReportUpdateRequest $request, string $id): RedirectResponse
    {
        $validated = $request->validated();

        try {
            $consumption = $this->consumptionReportRepository->updateConsumtionReport($id, $validated);

            return redirect()->route('admin.consumption-reports.index')->with('success', 'Data laporan konsumsi berhasil diubah');
        } catch (\Exception $e) {
            Log::error('Terjadi kesalahan saat mengubah data laporan konsumsi: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengubah data laporan konsumsi, silahkan coba lagi');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        try {
            $consumption = $this->consumptionReportRepository->deleteConsumtionReport($id);

            return redirect()->route('admin.consumption-reports.index')->with('success', 'Data laporan konsumsi berhasil dihapus');
        } catch (\Exception $e) {
            Log::error('Terjadi kesalahan saat menghapus data laporan konsumsi: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data laporan konsumsi, silahkan coba lagi');
        }
    }
}
