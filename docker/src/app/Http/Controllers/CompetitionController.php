<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;

class CompetitionController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer|digits:4',
            // 'available_languages' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $competition = Competition::create([
            'name' => $validatedData['name'],
            'year' => $validatedData['year'],
            //'available_languages' => $validatedData['available_languages'],
            'location' => $validatedData['location'],
        ]);
        // $competition->save();

        //return redirect()->route('/');
        return response()->json($competition);
        
    }
}
