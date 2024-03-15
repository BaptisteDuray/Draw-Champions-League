<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    // Relation avec les clubs
    public function clubs()
    {
        return $this->hasMany(Club::class);
    }
}
