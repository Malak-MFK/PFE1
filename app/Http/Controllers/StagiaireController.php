<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StagiaireController extends Controller
{
    // Index method to fetch all stagiaires
    public function index()
    {
        $stagiaires = Stagiaire::all();
        return response()->json($stagiaires);
    }

    // Store method to add a new stagiaire
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'cef' => 'required|string|max:255',
            'num_inscription' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'date_inscription' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'groupe' => 'string|max:255',
        ]);

        $imagePath = $request->file('image')->store('stagiaires', 'public');

        $stagiaire = Stagiaire::create(array_merge($validatedData, ['image' => $imagePath]));

        return response()->json($stagiaire, 201);
    }

    // Update method to update an existing stagiaire
    public function update(Request $request, Stagiaire $stagiaire)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'lastname' => 'string|max:255',
            'cef' => 'string|max:255',
            'num_inscription' => 'string|max:255',
            'date_naissance' => 'date',
            'date_inscription' => 'date',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'groupe' => 'max:255'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($stagiaire->image) {
                Storage::disk('public')->delete($stagiaire->image);
            }

            // Store new image and update image path
            $imagePath = $request->file('image')->store('stagiaires', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Update stagiaire with new data
        $stagiaire->update($validatedData);

        return response()->json($stagiaire);
    }

    // Destroy method to delete a stagiaire
    public function destroy(Stagiaire $stagiaire)
    {
        if ($stagiaire->image) {
            Storage::disk('public')->delete($stagiaire->image);
        }

        $stagiaire->delete();

        return response()->json(null, 204);
    }
}
