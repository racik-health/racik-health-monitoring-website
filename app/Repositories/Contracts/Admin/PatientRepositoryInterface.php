<?php

namespace App\Repositories\Contracts\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

interface PatientRepositoryInterface
{
    public function getAllPatients(): Collection;
    public function getPatientById(int $id): ?User;
    public function createPatient(array $data): User;
    public function updatePatient(int $id, array $data): bool|RedirectResponse;
    public function deletePatient(int $id): bool|RedirectResponse;
}