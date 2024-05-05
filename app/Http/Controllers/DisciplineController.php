<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use App\Models\Discipline;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    public function newCreate($id)
    {
        // Trouver le stagiaire correspondant à l'identifiant
        $stagiaire = Stagiaire::findOrFail($id);
    
        // Retourner la vue pour la rédaction du rapport disciplinaire avec le nouveau nom
        return view('nouveau_create', ['stagiaire' => $stagiaire]);
    }
    
    
    public function store(Request $request, Stagiaire $stagiaire)
    {
        // Validate the form data
        $request->validate([
            'content' => 'required|string',
        ]);
    
        // Create a new discipline report
        $discipline = new Discipline();
        $discipline->stagiaire_id = $stagiaire->id;

        $discipline->content = $request->input('content');
        $discipline->save();
    
        // Redirect to a different route after successful storage
        return redirect()->route('disciplines.store', ['stagiaire' => $stagiaire->id])->with('success', 'Rapport disciplinaire enregistré avec succès');
    }
    
}   