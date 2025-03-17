<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\AlphabetLetter;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    /**
     * Toon het uploadformulier.
     */
    public function index()
    {
        return view('letters-filler');
    }

    /**
     * Verwerk de geüploade bestanden en sla ze op.
     */
    public function store(Request $request)
    {
        // Validatie
        $request->validate([
            'files' => 'required|array|min:1',
            'files.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Alleen afbeeldingen toegestaan
//            'letters' => 'required|string', // Letters in CSV-formaat (bijv. "A,B,C")
        ]);

        $uploadedFiles = [];
        $letters = explode(',', strtoupper($request->letters)); // Letters als array

        if (count($letters) !== count($request->file('files'))) {
            return back()->with('error', 'Het aantal letters moet gelijk zijn aan het aantal afbeeldingen.');
        }

        foreach ($request->file('files') as $index => $file) {
//            $letter = $letters[$index] ?? '?'; // Fallback naar '?' als er geen letter is
            $originalFileName = $file->getClientOriginalName();

            $path = $file->storeAs('letter-img', $originalFileName, 'public');
            $uploadedFiles[] = $path;


            // Opslaan in database
            AlphabetLetter::create([
                'sign' => $path,
                'letter' => pathinfo($originalFileName, PATHINFO_FILENAME),
            ]);
        }

        return back()->with('success', 'Afbeeldingen geüpload!')
            ->with('paths', $uploadedFiles);
    }
}
