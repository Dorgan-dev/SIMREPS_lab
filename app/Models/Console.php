<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Console extends Model
{
    use HasFactory;

    // Jika nama tabel bukan "consoles", atur di sini
    // protected $table = 'consoles';

    protected $table = 'consoles';
    protected $primaryKey = 'console_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'console_id',
        'nama_unit',
        'nomor_unit',
        'kategori',
        'harga_per_jam',
        'ruangan_id',
        'status',
        'deskripsi',
    ];
        public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }

    // protected $casts = [
    //     'is_active' => 'boolean',
    //     'last_maintenance_at' => 'datetime',
    // ];

    // /**
    //  * ================================
    //  *          RELASI
    //  * ================================
    //  */

    // // Console berada di dalam sebuah ruangan
    // public function ruangan()
    // {
    //     return $this->belongsTo(Ruangan::class, 'ruangan_id');
    // }


    // /**
    //  * ================================
    //  *          SCOPES
    //  * ================================
    //  */

    // // Filter berdasarkan kategori PS
    // public function scopeKategori($query, $kategori)
    // {
    //     return $query->where('kategori', strtoupper($kategori));
    // }

    // // Console tersedia
    // public function scopeAvailable($query)
    // {
    //     return $query->where('status', 'available');
    // }


    // /**
    //  * ================================
    //  *       ACCESSOR (opsional)
    //  * ================================
    //  */

    // // Ubah teks status jadi label siap pakai
    // public function getStatusLabelAttribute()
    // {
    //     return match ($this->status) {
    //         'available' => 'Tersedia',
    //         'in_use' => 'Sedang Dipakai',
    //         'maintenance' => 'Perbaikan',
    //         default => 'Tidak Diketahui',
    //     };
    // }
}
