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
        'surname',
        'email',
        'password',
        'phone',
        'profile_picture',
        'type',
    ];


    public function properties()
    {
        return $this->hasMany(Property::class, 'dni_landlord', 'dni');
    }
    public function document()
    {
        return $this->hasOne(Document::class, 'dni_user', 'dni');
    }





}
