<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'year', 'available_languages', 'location'
    ];

    protected $casts = [
        'available_languages' => 'array'
    ];

    public function rounds()
    {
        return $this->hasMany(Round::class);
    }
}
