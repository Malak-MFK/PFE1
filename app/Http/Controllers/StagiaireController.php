<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stagiaire;
    class StagiaireController extends Controller
    {
        public function index()
        {
            // Retrieve all records from the stagiaires table
            $stagiaires = Stagiaire::all();

            // Return the records as a JSON response
            return response()->json($stagiaires);
        }

        public function show(Stagiaire $stagiaire)
        {
            // Return the specified stagiaire record as a JSON response
            return response()->json($stagiaire);
        }

        public function store(Request $request)
        {
            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'cef' => 'required|string|max:255',
                'num_inscription' => 'required|string|max:255',
                'date_naissance' => 'required|date',
                'date_inscription' => 'required|date',
            ]);

            // Create a new Stagiaire record using the validated data
            $stagiaire = Stagiaire::create($validatedData);

            // Return the newly created record as a JSON response
            return response()->json($stagiaire, 201);
        }

        public function update(Request $request, Stagiaire $stagiaire)
        {
            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'lastname' => 'sometimes|required|string|max:255',
                'cef' => 'sometimes|required|string|max:255',
                'num_inscription' => 'sometimes|required|string|max:255',
                'date_naissance' => 'sometimes|required|date',
                'date_inscription' => 'sometimes|required|date',
            ]);

            // Update the specified Stagiaire record using the validated data
            $stagiaire->update($validatedData);

            // Return the updated record as a JSON response
            return response()->json($stagiaire);
        }

        public function destroy(Stagiaire $stagiaire)
        {
            // Delete the specified Stagiaire record
            $stagiaire->delete();

            // Return a 204 No Content response
            return response()->json(null, 204);
        }
    }
