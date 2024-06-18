<?php
namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    public function index()
    {
        $participants = Participant::all();
        return view('participants', ['participants' => $participants]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $participant = Participant::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
        ]);

        return response()->json($participant);
    }
    public function destroy($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();

        return response()->json(['success' => 'Participant deleted successfully']);
    }
}
