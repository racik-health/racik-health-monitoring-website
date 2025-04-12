<?php

namespace App\Repositories\Contracts\Frontend;

use App\Models\User;

interface FrontendRegisterRepositoryInterface
{
    public function register(array $data): User;
}