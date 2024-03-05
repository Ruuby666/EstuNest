<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni',
        'name',
        'email',
        'password',
        'phone',
        'type',
    ];


    public function properties()
    {
        return $this->hasMany(Property::class, 'dni_landlord', 'dni');
    }

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    public function scopeLandlords($query)
    {
        return $query->where('type', 'landlord');
    }

    public function scopeTenants($query)
    {
        return $query->where('type', 'tenant');
    }

    public function scopeWithRent($query)
    {
        return $query->with('rents');
    }

    public function scopeWithProperty($query)
    {
        return $query->with('properties');
    }



}
