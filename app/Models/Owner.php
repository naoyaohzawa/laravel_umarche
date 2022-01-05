<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Ship;
use App\Models\Voyage;
use App\Models\OwnersCompany;


class Owner extends Authenticatable
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'owner_company_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function owner()
    {
        return $this->belongsTo(OwnersCompany::class);
    }


    // Ship Moldeとのリレーション
    public function ships()
    {
        return $this->hasMany(Ship::class);
    }

    // Voyage Moldeとのリレーション
    public function voyages()
    {
        return $this->hasMany(Voyage::class);
    }
}
