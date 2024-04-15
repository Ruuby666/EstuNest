<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

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
