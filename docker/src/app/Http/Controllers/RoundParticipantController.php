<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoundParticipantController extends Controller
{
    public function destroy($round_id, $participant_id)
    {
        $deleted = DB::table('round_participant')
            ->where('round_id', $round_id)
            ->where('participant_id', $participant_id)
            ->delete();

        return response()->json(['success' => (bool)$deleted]);
    }
}
