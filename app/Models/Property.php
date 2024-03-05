<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'address',
        'price',
        'status',
    ];

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }
}
