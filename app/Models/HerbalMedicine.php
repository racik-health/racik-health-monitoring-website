<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class HerbalMedicine extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'herbal_medicines';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Get the consumption histories for the herbal medicine.
     */
    public function consumptionHistories(): HasMany
    {
        return $this->hasMany(ConsumptionHistory::class);
    }

    /**
     * Get the recommendation results for the herbal medicine.
     */
    public function recommendationResults(): HasMany
    {
        return $this->hasMany(RecommendationResult::class);
    }
}
