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
        $validatedData = $request->validated();
    
        // Si le mot de passe est fourni, hachez-le avant de le sauvegarder
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }
    
        $professionnel = Professionnel::create($validatedData);
        $professionnel->competences()->sync($request->competences);
    
        return redirect()->route('professionnels.index')
            ->with('information', 'Le professionnel a été créé avec succès');
    }

    public function show(Professionnel $professionnel)
    {
        $metiers = Metier::all();
        $competences = Competence::all();
        return view('professionnels.show', compact('professionnel', 'metiers','competences'));
    }

    public function edit(Professionnel $professionnel)
    {
        $metiers = Metier::all();
        return view('professionnels.edit', compact('professionnel', 'metiers'));
    }

    public function update(ProfessionnelRequest $request, Professionnel $professionnel)
    {
        $validatedData = $request->validated();
    
        // Si le mot de passe est fourni, hachez-le avant de le sauvegarder
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }
    
        // Mettez à jour le professionnel avec les données validées
        $professionnel->update($validatedData);
    
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
