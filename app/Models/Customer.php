<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'no_hp',
        'email'
    ];
}
