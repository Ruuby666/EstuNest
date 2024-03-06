<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni_tenant',
        'id_property',
        'start_date',
        'end_date',
    ];

    // Relación con la tabla "users" (inquilino)
    public function tenant()
    {
        return $this->belongsTo(User::class, 'dni_tenant', 'dni');
    }

    // Relación con la tabla "properties"
    public function property()
    {
        return $this->belongsTo(Property::class, 'id_property');
    }
}
