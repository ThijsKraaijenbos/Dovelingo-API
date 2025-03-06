<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Word;
use Illuminate\Http\Request;

class ExercisesFiller extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        return view('exercises-filler', compact('lessons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming files
        $request->validate([
            'files' => 'required|array|min:1', // Ensure that at least one file is uploaded
            'files.*' => 'file|mimes:mp4', // Example validation rules
            'lesson_id' => 'required'
        ]);

        // Initialize an array to hold the file paths
        $uploadedFiles = [];
        $lessonId = $request->lesson_id;

        // Check if files were uploaded
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Get the original file name
                $originalFileName = $file->getClientOriginalName();

                // Store each file in the storage (e.g., 'public' disk)
                // The `storeAs` method allows you to specify the file name explicitly
                $path = $file->storeAs('exercise-videos/words', $originalFileName, 'public');  // 'public' disk
                $uploadedFiles[] = $path;  // Add the file path to the array

                Word::create([
                    'title' => pathinfo($originalFileName, PATHINFO_FILENAME), // Store name without extension
                    'video_path' => $path, // Store the file path
                    'lesson_id' => $lessonId,
                ]);
            }

            // Optionally: Save the file paths to the database or do something with them

            // Return success response with file paths
            return back()->with('success', 'Files uploaded successfully!')
                ->with('paths', $uploadedFiles);
        }

        return back()->with('error', 'No files were uploaded.');
    }

}
