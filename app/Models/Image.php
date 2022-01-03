<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Voyage;

class Image extends Model
{
    use HasFactory;


    public function voyage()
    {
        return $this->belongsTo(Voyage::class);
    }
}
