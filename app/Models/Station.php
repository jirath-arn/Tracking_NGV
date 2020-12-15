<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Route;

class Station extends Model
{
    use HasFactory;

    public $table = 'stations';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name_station',
        'latitude',
        'longitude',
        'created_at',
        'updated_at',
    ];

    public function routes()
    {
        return $this->belongsToMany(Route::class);
    }
}
