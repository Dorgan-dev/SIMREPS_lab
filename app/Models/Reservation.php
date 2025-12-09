<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Reservation extends Model
{
    protected $table = 'reservations';

    protected $primaryKey = 'res_id';
    public $incrementing  = true;
    protected $keyType    = 'int';

    protected $fillable = [
        'cust_id',
        'console_id',
        'tanggal_bermain',
        'waktu_mulai',
        'waktu_selesai',
        'durasi_jam',
        'status',
        'disetujui_oleh'
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
    public function console()
    {
        return $this->belongsTo(Console::class, 'console_id');
    }
}
