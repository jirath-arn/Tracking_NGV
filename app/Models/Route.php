<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bus;
use App\Models\Station;

class Route extends Model
{
    use HasFactory;

    public $table = 'routes';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name_route',
        'created_at',
        'updated_at',
    ];

    public function stations()
    {
        return $this->belongsToMany(Station::class);
    }

    public function buses()
    {
        return $this->hasMany(Bus::class);
    }
}
