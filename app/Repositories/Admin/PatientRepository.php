<?php

namespace App\Repositories\Admin;

use App\Models\User;
use App\Repositories\Contracts\Admin\PatientRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatientRepository implements PatientRepositoryInterface
{
    public function __construct(protected User $model)
    {
        $this->model = $model;
    }

    public function getAllPatients(): Collection
    {
        return $this->model->orderBy('created_at', 'desc')->get();
    }

    public function getPatientById(int $id): ?User
    {
        return $this->model->findOrFail($id);
    }

    public function createPatient(array $data): User
    {
        return DB::transaction(function () use ($data) {
            $data['password'] = Hash::make($data['password']);
            $patient = $this->model->create($data);
            $patient->assignRole('patient');

            return $patient;
        });
    }

    public function updatePatient(int $id, array $data): bool|RedirectResponse
    {
        return DB::transaction(function () use ($id, $data) {
            $patient = $this->getPatientById($id);

            if (isset($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            } else {
                unset($data['password']);
            }

            return $patient->update($data);
        });
    }

    public function deletePatient(int $id): bool|RedirectResponse
    {
        return DB::transaction(function () use ($id) {
            $patient = $this->getPatientById($id);

            return $patient->delete();
        });
    }
}

