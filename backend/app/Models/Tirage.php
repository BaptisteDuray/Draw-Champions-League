<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tirage extends Model
{
    public function clubs()
    {
        return $this->belongsToMany(Club::class);
    }
}
