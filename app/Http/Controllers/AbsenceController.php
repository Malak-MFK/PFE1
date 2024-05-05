<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;

class AbsenceController extends Controller
{
    public function index()
    {
        $absences = Absence::all();
        
        return view('absences.index', compact('absences'))->with('path', resource_path('views/absences/index.blade.php'));

    }

    public function create()
    {
        // Logique pour récupérer les stagiaires
        $stagiaires = \App\Models\Stagiaire::all();
        return view('absences.create', compact('stagiaires'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'stagiaire_id' => 'required|exists:stagiaires,id',
            'date_absence' => 'required|date',
            // Ajoutez d'autres validations au besoin
        ]);

        Absence::create([
            'stagiaire_id' => $request->stagiaire_id,
            'date' => $request->date_absence,
            // Ajoutez d'autres champs au besoin
        ]);

        return redirect()->route('absences.index')->with('success', 'Absence enregistrée avec succès.');
    }
}
