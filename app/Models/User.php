<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;
use Filament\Panel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements FilamentUser, MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'subscription_id',
        'name',
        'last_name',
        'email',
        'password',
        'registration_date',
        'termination_date',
        'role',
        'apple_id',
        'last_login',
        'status',
        'profile_image'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login' => 'datetime',
        'registration_date' => 'date',
        'termination_date' => 'date',
        'password' => 'hashed',
    ];

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Hash::needsRehash($value) 
                ? Hash::make($value) 
                : $value,
        );
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true; // Or your custom logic
    }

    /**
     * Get the URL to the user's profile image.
     */
    public function getProfileImageUrlAttribute(): ?string
    {
        return $this->profile_image 
            ? Storage::disk('direct')->url($this->profile_image)
            : null;
    }

    public function getFullNameAttribute(): string
    {
        return trim("{$this->name} {$this->last_name}");
    }
}
