<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'category',
        'description',
    ];

    public function consoles()
    {
        return $this->hasMany(Console::class);
    }
    public function images()
    {
            return $this->morphMany(Image::class, 'imageable');

    }
}
