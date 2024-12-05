<?php

namespace App\Http\Controllers;

use App\Models\Professionnel;
use App\Models\Metier;
use App\Models\Competence;
use App\Http\Requests\ProfessionnelRequest;

class ProfessionnelController extends Controller
{
    public function index()
    {
        $professionnels = Professionnel::all();
        return view('professionnels.index', compact('professionnels'));
    }

    public function create()
    {
        $metiers = Metier::all();
        $competences = Competence::all();
        return view('professionnels.create', compact('metiers', 'competences'));
    }

    public function store(ProfessionnelRequest $request)
    {
        // dd($request->file('cv'));
        $validatedData = $request->validated();

        // Si le mot de passe est fourni, hachez-le avant de le sauvegarder
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        $professionnel = Professionnel::create($validatedData);
        $professionnel->competences()->sync($request->competences);

        // Gestion de l'upload du CV
        if ($request->hasFile('cv')) {
            // Lire le contenu du fichier PDF
            $cvContent = file_get_contents($request->file('cv')->getRealPath());
            // Enregistrer le contenu dans la colonne cv_path (qui est maintenant un BLOB)
            $professionnel->cv_path = $cvContent; // Enregistre le contenu du CV


            $professionnel->save(); // Sauvegarde les modifications


        }

        return redirect()->route('professionnels.index')
            ->with('information', 'Le professionnel a été créé avec succès');
    }

    public function show(Professionnel $professionnel)
    {
        $metiers = Metier::all();
        $competences = Competence::all();

        return view('professionnels.show', compact('professionnel', 'metiers', 'competences'));
    }

    public function edit(Professionnel $professionnel)
    {
        $metiers = Metier::all();
        $competences = Competence::all();
        return view('professionnels.edit', compact('professionnel', 'metiers', 'competences'));
    }

    public function update(ProfessionnelRequest $request, Professionnel $professionnel)
{
    // Validation des données
    $validatedData = $request->validated();

    // Vérifiez si le mot de passe a été fourni
    if (!empty($validatedData['password'])) {
        $validatedData['password'] = bcrypt($validatedData['password']); // Hachez le mot de passe
    } else {
        unset($validatedData['password']); // Retirez le mot de passe des données à mettre à jour
    }

    // Mise à jour des informations du professionnel
    $professionnel->update($validatedData);

    // Gestion de l'upload du nouveau CV
    if ($request->hasFile('cv')) {
        $cvContent = file_get_contents($request->file('cv')->getRealPath());
        $professionnel->cv_path = $cvContent; // Enregistre le nouveau CV
    }

    // Synchroniser les compétences
    $professionnel->competences()->sync($request->competences);

    // Sauvegarde des modifications
    $professionnel->save(); // Assurez-vous de sauvegarder le modèle

    return redirect()->route('professionnels.index')
        ->with('information', 'Le professionnel a été mis à jour avec succès');
}

    public function destroy(Professionnel $professionnel)
    {
        $professionnel->delete();
        return redirect()->route('professionnels.index')
            ->withInformation('Le professionnel a été supprimé avec succès');
    }

    public function confirmDelete(Professionnel $professionnel)
    {
        return view('professionnels.delete', compact('professionnel'));
    }
}
