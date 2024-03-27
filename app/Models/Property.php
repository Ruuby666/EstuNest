<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'price',
        'city',
        'address',
        'images',
        'dni_landlord',
    ];

    public function landlord()
    {
        return $this->belongsTo(User::class, 'dni_landlord', 'dni');
    }
}
