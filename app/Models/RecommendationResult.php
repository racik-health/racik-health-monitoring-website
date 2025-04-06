<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecommendationResult extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'recommendation_results';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Get the user that owns the recommendation result.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the health input that owns the recommendation result.
     */
    public function healthInput(): BelongsTo
    {
        return $this->belongsTo(HealthInput::class);
    }

    /**
     * Get the herbal medicine that owns the recommendation result.
     */
    public function herbalMedicine(): BelongsTo
    {
        return $this->belongsTo(HerbalMedicine::class);
    }
}
