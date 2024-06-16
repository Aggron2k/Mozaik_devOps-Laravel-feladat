<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'address'
    ];

    public function rounds()
    {
        return $this->belongsToMany(Round::class, 'round_participant');
    }
}
