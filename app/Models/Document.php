<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni_user',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'dni_user', 'dni');
    }
}
