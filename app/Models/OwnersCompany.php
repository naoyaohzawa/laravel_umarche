<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;

class OwnersCompany extends Model
{
    use HasFactory;
    
    public function image()
    {
        return $this->hasMany(Owner::class);
    }
}
