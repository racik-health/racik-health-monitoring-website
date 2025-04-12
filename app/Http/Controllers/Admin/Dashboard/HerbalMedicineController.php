<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HerbalMedicineStoreRequest;
use App\Http\Requests\Admin\HerbalMedicineUpdateRequest;
use App\Repositories\Contracts\Admin\HerbalMedicineRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class HerbalMedicineController extends Controller
{
    public function __construct(public HerbalMedicineRepositoryInterface $herbalMedicineRepository)
    {
        $this->herbalMedicineRepository = $herbalMedicineRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data['herbal_medicines'] = $this->herbalMedicineRepository->getAllHerbalMedicines();
        return view('app.admin.pages.herbal-medicines.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('app.admin.pages.herbal-medicines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HerbalMedicineStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        try {
            $herbalMedicine = $this->herbalMedicineRepository->createHerbalMedicine($validated);

            return redirect()->route('admin.herbal-medicines.index')->with('success', 'Data jamu herbal berhasil ditambahkan');
        } catch (\Exception $e) {
            Log::error('Terjadi kesalahan saat menambahkan data jamu herbal: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan data jamu herbal, silahkan coba lagi');
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
        $data['herbal_medicine'] = $this->herbalMedicineRepository->getHerbalMedicineById($id);
        return view('app.admin.pages.herbal-medicines.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HerbalMedicineUpdateRequest $request, string $id): RedirectResponse
    {
        $validated = $request->validated();

        try {
            $herbalMedicine = $this->herbalMedicineRepository->updateHerbalMedicine($id, $validated);

            return redirect()->route('admin.herbal-medicines.index')->with('success', 'Data jamu herbal berhasil diubah');
        } catch (\Exception $e) {
            Log::error('Terjadi kesalahan saat mengubah data jamu herbal: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengubah data jamu herbal, silahkan coba lagi');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $herbalMedicine = $this->herbalMedicineRepository->deleteHerbalMedicine($id);

            return redirect()->route('admin.herbal-medicines.index')->with('success', 'Data jamu herbal berhasil dihapus');
        } catch (\Exception $e) {
            Log::error('Terjadi kesalahan saat menghapus data jamu herbal: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data jamu herbal, silahkan coba lagi');
        }
    }
}
