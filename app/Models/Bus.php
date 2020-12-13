<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Route;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'license_plate',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'route_id' => 'int',
    ];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
