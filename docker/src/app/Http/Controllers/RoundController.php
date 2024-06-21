<?php

namespace App\Http\Controllers;

use App\Models\Round;
use App\Models\Participant;
use Illuminate\Http\Request;

class RoundController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'max_points' => 'required|integer',
            'competition_id' => 'required|exists:competitions,id',
        ]);

        $round = Round::create([
            'name' => $request->name,
            'date' => $request->date,
            'max_points' => $request->max_points,
            'competition_id' => $request->competition_id,
        ]);

        return response()->json($round);
    }

    public function destroy($id)
    {
        $round = Round::findOrFail($id);
        $round->delete();

        return response()->json(['success' => true]);
    }

    public function addParticipant(Request $request)
    {
        $request->validate([
            'round_id' => 'required|integer|exists:rounds,id',
            'participant_id' => 'required|integer|exists:participants,id',
            'total_points' => 'required|integer|min:0',
        ]);

        $round = Round::find($request->round_id);
        $participant = Participant::find($request->participant_id);

        if ($round && $participant) {
            if (!$round->participants()->where('participant_id', $participant->id)->exists()) {
                $round->participants()->attach($participant->id, ['total_points' => $request->total_points]);
            } else {
                $round->participants()->updateExistingPivot($participant->id, ['total_points' => $request->total_points]);
            }

            return response()->json(['success' => true, 'message' => 'Participant added to round successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Error adding participant to round'], 400);
    }
}
