<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Console extends Model
{
    use HasFactory;

    protected $table = 'consoles';

    protected $fillable = [
        'nama_unit',
        'nomor_unit',
        'kategori',
        'harga_per_jam',
        'room_id',
        'status',
        'deskripsi',
    ];

    /**
     * Scope untuk filter berdasarkan request
     */
    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }

    /**
     * Relasi ke tabel Room
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'console_id');
    }
}
