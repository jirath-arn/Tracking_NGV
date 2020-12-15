<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Route;

class Bus extends Model
{
    use HasFactory;

    public $table = 'buses';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'route_id',
        'license_plate',
        'latitude',
        'longitude',
        'created_at',
        'updated_at',
    ];

    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id');
    }
}
