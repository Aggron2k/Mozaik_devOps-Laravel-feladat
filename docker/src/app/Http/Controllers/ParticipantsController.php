<?php
namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    public function index()
    {
        // Minden résztvevő lekérdezése az adatbázisból
        $participants = Participant::all();

        // Válaszként visszaadjuk a résztvevőket JSON formátumban
        return view('participants', ['participants' => $participants]);
    }
    public function store(Request $request)
    {
        // Validálás (opcionális)
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        // Új résztvevő létrehozása az adatbázisban
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
        // A résztvevő keresése és törlése
        $participant = Participant::findOrFail($id);
        $participant->delete();

        // Visszatérés sikeres válasszal
        return response()->json(['success' => 'Participant deleted successfully']);
    }
}
