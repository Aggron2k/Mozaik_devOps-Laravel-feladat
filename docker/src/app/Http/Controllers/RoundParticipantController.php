<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RoundParticipant;
use App\Models\Participant;

class RoundParticipantController extends Controller
{
    public function destroy($round_id, $participant_id)
    {
        $deleted = DB::table('round_participant')
            ->where('round_id', $round_id)
            ->where('participant_id', $participant_id)
            ->delete();

        return response()->json(['success' => (bool) $deleted]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'round_id' => 'required|integer|exists:rounds,id',
            'participant_id' => 'required|integer|exists:participants,id',
            'total_points' => 'required|integer|min:0',
        ]);

        $roundParticipant = RoundParticipant::create([
            'round_id' => $validatedData['round_id'],
            'participant_id' => $validatedData['participant_id'],
            'total_points' => $validatedData['total_points'],
        ]);

        // Retrieve participant data
        $participant = Participant::find($validatedData['participant_id']);

        return response()->json([
            'success' => true,
            'round_participant' => $roundParticipant,
            'participant' => $participant
        ]);
    }
}
