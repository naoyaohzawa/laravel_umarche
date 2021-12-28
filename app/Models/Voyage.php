<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ship;
use App\Models\Owner;
use App\Models\Image;

class Voyage extends Model
{
    use HasFactory;


    

    public function ship()
    {
        return $this->belongsTo(Ship::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
