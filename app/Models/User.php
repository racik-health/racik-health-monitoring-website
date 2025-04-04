<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the consumption histories for the user.
     */
    public function consumptionHistories(): HasMany
    {
        return $this->hasMany(ConsumptionHistory::class);
    }

    /**
     * Get the health inputs for the user.
     */
    public function healthInputs(): HasMany
    {
        return $this->hasMany(HealthInput::class);
    }

    /**
     * Get the recommendation results for the user.
     */
    public function recommendationResults(): HasMany
    {
        return $this->hasMany(RecommendationResult::class);
    }

    /**
     * Get the dispenser control logs for the user.
     */
    public function dispenserControlLogs(): HasMany
    {
        return $this->hasMany(DispenserControlLog::class);
    }
}
