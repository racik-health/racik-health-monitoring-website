<?php

namespace App\Repositories\Admin;

use App\Models\HerbalMedicine;
use App\Repositories\Contracts\Admin\HerbalMedicineRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class HerbalMedicineRepository implements HerbalMedicineRepositoryInterface
{
    public function __construct(protected HerbalMedicine $model)
    {
        $this->model = $model;
    }

    public function getAllHerbalMedicines(): Collection
    {
        return $this->model->orderBy('created_at', 'desc')->get();
    }

    public function getHerbalMedicineById(int $id): ?HerbalMedicine
    {
        return $this->model->findOrFail($id);
    }

    public function createHerbalMedicine(array $data): HerbalMedicine
    {
        return DB::transaction(function () use ($data) {
            $herbalMedicine = $this->model->create($data);

            return $herbalMedicine;
        });
    }

    public function updateHerbalMedicine(int $id, array $data): bool|RedirectResponse
    {
        return DB::transaction(function () use ($id, $data) {
            $herbalMedicine = $this->getHerbalMedicineById($id);

            return $herbalMedicine->update($data);
        });
    }

    public function deleteHerbalMedicine(int $id): bool|RedirectResponse
    {
        return DB::transaction(function () use ($id) {
            $herbalMedicine = $this->getHerbalMedicineById($id);

            return $herbalMedicine->delete();
        });
    }
}
