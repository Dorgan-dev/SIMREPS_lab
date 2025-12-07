<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'username',
        'email',
        'profile_photo',  // ← PASTIKAN INI ADA
        'jenis_kelamin',
        'no_hp',
        'role',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get profile photo URL dengan fallback ke default
     */
    // Di Model User, alternatif pakai avatar generator:
    public function getProfilePhotoUrlAttribute()
    {
        if ($this->profile_photo && Storage::disk('public')->exists($this->profile_photo)) {
            return asset('storage/' . $this->profile_photo);
        }

        // Gunakan UI Avatars sebagai fallback
        $name = urlencode($this->name);
        $bg = $this->jenis_kelamin === 'Perempuan' ? 'FF69B4' : '3498db';
        return "https://ui-avatars.com/api/?name={$name}&background={$bg}&color=fff&size=200";
    }
    
    /**
     * Hapus foto lama saat update
     */
    public function deleteOldProfilePhoto()
    {
        if ($this->profile_photo && Storage::disk('public')->exists($this->profile_photo)) {
            Storage::disk('public')->delete($this->profile_photo);
            return true;
        }
        return false;
    }
}
