<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';

    protected $primaryKey = 'res_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'cust_id',
        'console_id',
        'waktu_mulai',
        'durasi_jam',
        'disetujui_oleh',
        'status',
    ];
}
