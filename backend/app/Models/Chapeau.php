<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapeau extends Model
{
    use HasFactory;

    protected $table = 'chapeaux';

    protected $fillable = [
        'rang_id',
        'rang',
    ];

    public $timestamps = false;
}
