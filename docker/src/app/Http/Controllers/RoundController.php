<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Round;

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
}
