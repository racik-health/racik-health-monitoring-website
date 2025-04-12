<?php

namespace App\Repositories\Contracts\Admin;

use App\Models\ConsumptionHistory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

interface ConsumtionReportRepositoryInterface
{
    public function getAllConsumtionReports(): Collection;
    public function getConsumtionReportById(int $id): ?ConsumptionHistory;
    public function createConsumtionReport(array $data): ConsumptionHistory;
    public function updateConsumtionReport(int $id, array $data): bool|RedirectResponse;
    public function deleteConsumtionReport(int $id): bool|RedirectResponse;
}