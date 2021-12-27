<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;
use App\Models\Voyage;

class Ship extends Model
{
    use HasFactory;

    // protected $primaryKey = "";

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    // Voyage Moldeとのリレーション
    public function voyages()
    {
        return $this->hasMany(Voyage::class);
    }
}