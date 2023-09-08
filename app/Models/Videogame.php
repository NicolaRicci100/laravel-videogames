<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Videogame extends Model
{
    use HasFactory;

    use SoftDeletes;

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
        'publisher_id'
    ];

    public function publisher()
    {
        return $this->belongsTo(Videogame::class);
    }
}
