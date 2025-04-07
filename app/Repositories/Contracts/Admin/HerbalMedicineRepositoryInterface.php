<?php

namespace App\Repositories\Contracts\Admin;

use App\Models\HerbalMedicine;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

interface HerbalMedicineRepositoryInterface
{
    public function getAllHerbalMedicines(): Collection;
    public function getHerbalMedicineById(int $id): ?HerbalMedicine;
    public function createHerbalMedicine(array $data): HerbalMedicine;
    public function updateHerbalMedicine(int $id, array $data): bool|RedirectResponse;
    public function deleteHerbalMedicine(int $id): bool|RedirectResponse;
}
