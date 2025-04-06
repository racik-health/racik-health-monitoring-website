<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PatientStoreRequest;
use App\Http\Requests\Admin\PatientUpdateRequest;
use App\Repositories\Contracts\Admin\PatientRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PatientController extends Controller
{
    public function __construct(public PatientRepositoryInterface $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data['patients'] = $this->patientRepository->getAllPatients();
        return view('app.admin.pages.patients.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('app.admin.pages.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        try {
            $patient = $this->patientRepository->createPatient($validated);

            return redirect()->route('admin.patients.index')->with('success', 'Data pasien berhasil ditambahkan');
        } catch (\Exception $e) {
            Log::error('Terjadi kesalahan saat menambahkan data pasien: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan data pasien, silahkan coba lagi');
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
        $data['patient'] = $this->patientRepository->getPatientById($id);
        return view('app.admin.pages.patients.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatientUpdateRequest $request, string $id): RedirectResponse
    {
        $validated = $request->validated();

        try {
            $patient = $this->patientRepository->updatePatient($id, $validated);

            return redirect()->route('admin.patients.index')->with('success', 'Data pasien berhasil diubah');
        } catch (\Exception $e) {
            Log::error('Terjadi kesalahan saat mengubah data pasien: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengubah data pasien, silahkan coba lagi');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        try {
            $patient = $this->patientRepository->deletePatient($id);

            return redirect()->route('admin.patients.index')->with('success', 'Data pasien berhasil dihapus');
        } catch (\Exception $e) {
            Log::error('Terjadi kesalahan saat menghapus data pasien: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data pasien, silahkan coba lagi');
        }
    }
}
