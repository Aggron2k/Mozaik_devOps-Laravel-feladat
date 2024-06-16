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
            'year' => 'required|integer',
            // 'available_languages' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $competition = Competition::create($validatedData);
        $competition->save();

        return redirect()->route('/');
        
    }
}
