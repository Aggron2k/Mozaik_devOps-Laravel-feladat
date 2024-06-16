<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    use HasFactory;

    protected $fillable = [
        'competition_id', 'name', 'date'
    ];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'round_participant');
    }
}
