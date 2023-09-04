<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'cover',
        'genre',
        'release_date',
        'price',
        'platform',
        'description',
        'age_rating',
        'vote',
    ];
}
