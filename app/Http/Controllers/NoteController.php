<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Stagiaire;

class NoteController extends Controller
{
    public function create($stagiaire_id)
    {
        // Récupérer le stagiaire correspondant
        $stagiaire = Stagiaire::findOrFail($stagiaire_id);

        // Retourner la vue pour ajouter une note avec l'objet stagiaire
        return view('ajouter_note', compact('stagiaire'));
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'stagiaire_id' => 'required|exists:stagiaires,id',
            'cc1' => 'required',
            'cc2' => 'required',
            'cc3' => 'required',
        ]);

        // Créer une nouvelle note
        $note = new Note();
        $note->stagiaire_id = $request->stagiaire_id;
        $note->cc1 = $request->cc1;
        $note->cc2 = $request->cc2;
        $note->cc3 = $request->cc3;
        $note->save();

        // Rediriger avec un message de succès
        return redirect()->route('stagiairesD.index')->with('success', 'Note ajoutée avec succès');
    }

    public function edit($stagiaire_id)
    {
        $note = Note::findOrFail($stagiaire_id); // Utilisez le modèle Note pour récupérer la note
        return view('edit_note')->with("note", $note);
    }
    // Méthode pour mettre à jour la note
    public function update(Request $request, Note $note)
    {
        // Valider les données du formulaire
        $request->validate([
            'cc1' => 'required',
            'cc2' => 'required',
            'cc3' => 'required',
        ]);

        // Mettre à jour les champs de la note
        $note->cc1 = $request->cc1;
        $note->cc2 = $request->cc2;
        $note->cc3 = $request->cc3;
        $note-> stagiaire_id= $request-> stagiaire_id; 
        $note->save();


        // Rediriger avec un message de succès
        return redirect()->route('stagiairesD.index')->with('success', 'Note modfier avec succès');
    }

    // Autres méthodes du contrôleur...
}
