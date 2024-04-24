<?php

namespace App\Http\Controllers;

use App\Models\Formateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormateurController extends Controller
{
    // Index method to fetch all formateurs
    public function index()
    {
        $formateurs = Formateur::all();
        return response()->json($formateurs);
    }

    // Store method to add a new formateur
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'diplom' => 'required|string|max:255',
            'matricule' => 'required|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('formateurs', 'public');

        $formateur = Formateur::create(array_merge($validatedData, ['image' => $imagePath]));

        return response()->json($formateur, 201);
    }

    // Update method to update an existing formateur
    public function update(Request $request, Formateur $formateur)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'lastname' => 'string|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'diplom' => 'string|max:255',
            'matricule' => 'string|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($formateur->image) {
                Storage::disk('public')->delete($formateur->image);
            }

            // Store new image and update image path
            $imagePath = $request->file('image')->store('formateurs', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Update formateur with new data
        $formateur->update($validatedData);

        return response()->json($formateur);
    }

    // Destroy method to delete a formateur
    public function destroy(Formateur $formateur)
    {
        if ($formateur->image) {
            Storage::disk('public')->delete($formateur->image);
        }

        $formateur->delete();

        return response()->json(null, 204);
    }
}
