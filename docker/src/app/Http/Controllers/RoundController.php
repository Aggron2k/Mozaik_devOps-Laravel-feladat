<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Round;

class RoundController extends Controller
{
    public function destroy($id)
    {
        $round = Round::findOrFail($id);
        $round->delete();

        return response()->json(['success' => true]);
    }
}
