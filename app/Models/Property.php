<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'rooms_available',
        'description',
        'price',
        'city',
        'address',
        'dni_landlord',
    ];

    // Relación con la tabla "alquila"
    public function rent()
    {
        return $this->hasMany(Rent::class, 'id_property');
    }
}
