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
            'year' => 'required|integer|digits:4|min:1000|max:' . date('Y'),
            'location' => 'required|string|max:255',
            'available_languages' => 'required|string|max:30',
        ]);

        if ($request->has('available_languages') && !empty($request->available_languages)) {

            $languages = json_decode($request->available_languages);


            $competition = Competition::create([
                'name' => $validatedData['name'],
                'year' => $validatedData['year'],
                'location' => $validatedData['location'],
                'available_languages' => json_encode($languages),
            ]);


            return response()->json($competition);
        }


        $competition = Competition::create([
            'name' => $validatedData['name'],
            'year' => $validatedData['year'],
            'location' => $validatedData['location'],
        ]);


        return response()->json($competition);
    }

    public function destroy($id)
    {
        $competition = Competition::findOrFail($id);
        $competition->delete();

        return response()->json(['success' => true]);
    }

}
