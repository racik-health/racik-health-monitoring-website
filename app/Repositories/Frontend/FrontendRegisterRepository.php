<?php

namespace App\Repositories\Frontend;

use App\Models\User;
use App\Repositories\Contracts\Frontend\FrontendRegisterRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FrontendRegisterRepository implements FrontendRegisterRepositoryInterface
{
    public function __construct(protected User $model)
    {
        $this->model = $model;
    }

    public function register(array $data): User
    {
        return DB::transaction(function () use ($data) {
            $data['password'] = Hash::make($data['password']);
            $patient = $this->model->create($data);
            $patient->assignRole('patient');

            return $patient;
        });
    }
}
