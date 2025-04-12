<?php

namespace App\Repositories\Admin;

use App\Models\ConsumptionHistory;
use App\Repositories\Contracts\Admin\ConsumtionReportRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ConsumtionReportRepository implements ConsumtionReportRepositoryInterface
{
    public function __construct(protected ConsumptionHistory $model)
    {
        $this->model = $model;
    }

    public function getAllConsumtionReports(): Collection
    {
        return $this->model->orderBy('created_at', 'desc')->get();
    }

    public function getConsumtionReportById(int $id): ?ConsumptionHistory
    {
        return $this->model->findOrFail($id);
    }

    public function createConsumtionReport(array $data): ConsumptionHistory
    {
        return DB::transaction(function () use ($data) {
            $consumption = $this->model->create($data);

            return $consumption;
        });
    }

    public function updateConsumtionReport(int $id, array $data): bool|RedirectResponse
    {
        return DB::transaction(function () use ($id, $data) {
            $consumption = $this->getConsumtionReportById($id);

            return $consumption->update($data);
        });
    }

    public function deleteConsumtionReport(int $id): bool|RedirectResponse
    {
        return DB::transaction(function () use ($id) {
            $consumption = $this->getConsumtionReportById($id);

            return $consumption->delete();
        });
    }

}