<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Competence,

};
use App\Http\Requests\CompetenceRequest;
class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competences = Competence::all(); // Récupérer toutes les compétences
        return view('competences.index', compact('competences')); // Assurez-vous que la vue existe
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('competences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompetenceRequest $competenceRequest)
    {
        $validatedData = $competenceRequest->validated();
        Competence::create($validatedData);
        return redirect()->route('competences.index')
            ->withInformation('La compétence a été créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Competence $competence)
    {
        $data = [
            'titre' => 'Les compétences de ' . config('app.name'),
            'description' => 'l\'ensemble des compétences de ' . config('app.name'),
            'competences'=>$competence,
        ];
        return view('competences.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competence $competence)
    {
        return view('competences.edit', compact('competence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompetenceRequest $request, Competence $competence)
    {
        $validatedData = $request->validated();
        
        $competence->update($validatedData);
        
        return redirect()->route('competences.index')
            ->withInformation('La compétence a été mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competence $competence)
    {
        $competence->delete();
        return redirect()->route('competences.index')
            ->withInformation('La compétence a été supprimée avec succès');
    }

    /**
     * Show the confirmation form before deleting the specified resource.
     */
    public function confirmDelete(Competence $competence)
    {
        return view('competences.delete', compact('competence'));
    }
}
