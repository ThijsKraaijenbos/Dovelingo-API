<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Models\Badge;
use Illuminate\Http\Request;

class TrophyController extends Controller
{
    /**
     * Toon het uploadformulier.
     */
    public function index()
    {
        return view('trophy-filler');
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
            'required_score' => 'nullable|integer|min:0', // Optionele score
        ]);

        $uploadedFiles = [];
        $letters = explode(',', strtoupper($request->letters)); // Letters als array

        // Controleer of het aantal letters gelijk is aan het aantal geüploade afbeeldingen
        if (count($letters) !== count($request->file('files'))) {
            return back()->with('error', 'Het aantal letters moet gelijk zijn aan het aantal afbeeldingen.');
        }

        // Haal de required_score op (indien meegegeven)
        $requiredScore = $request->input('required_score', 0); // Standaard score is 0 als deze niet meegegeven is

        foreach ($request->file('files') as $index => $file) {
            $originalFileName = $file->getClientOriginalName();

            // Sla het bestand op in de storage
            $path = $file->storeAs('letter-img', $originalFileName, 'public');
            $uploadedFiles[] = $path;

            // Maak een nieuwe Badge aan en sla deze op in de database
            Badge::create([
                'image_url' => $path,
                'title' => pathinfo($originalFileName, PATHINFO_FILENAME),
                'required_score' => $requiredScore, // Vul de vereiste score in
            ]);
        }

        // Geef succesmelding en de paden van de geüploade afbeeldingen
        return back()->with('success', 'Afbeeldingen geüpload!')
            ->with('paths', $uploadedFiles);
    }
}
