<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bus;

class Route extends Model
{
    use HasFactory;

    public function buses()
    {
        return $this->hasMany(Bus::class);
    }
}
