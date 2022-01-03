<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;
use App\Models\Voyage;
use Kyslik\ColumnSortable\Sortable;//追記


class Ship extends Model
{
    use HasFactory, Sortable;

    // protected $primaryKey = "";

    public $sortable = ['id','vessel_name'];//追記(ソートに使うカラムを指定

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