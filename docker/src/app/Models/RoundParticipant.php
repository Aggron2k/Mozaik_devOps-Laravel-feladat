<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoundParticipant extends Model
{
    use HasFactory;
    protected $table = 'round_participant';

    protected $fillable = [
        'round_id',
        'participant_id',
        'total_points',
    ];

    public function round()
    {
        return $this->belongsTo(Round::class);
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}
