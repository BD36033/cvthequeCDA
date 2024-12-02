<?php

namespace App\Http\Controllers;

use App\Models\Professionnel;
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
        return view('professionnels.create');
    }

    public function store(ProfessionnelRequest $request)
    {
        $validatedData = $request->validated();
        Professionnel::create($validatedData);
        return redirect()->route('professionnels.index')
            ->withInformation('Le professionnel a été créé avec succès');
    }

    public function show(Professionnel $professionnel)
    {
        return view('professionnels.show', compact('professionnel'));
    }

    public function edit(Professionnel $professionnel)
    {
        return view('professionnels.edit', compact('professionnel'));
    }

    public function update(ProfessionnelRequest $request, Professionnel $professionnel)
    {
        $validatedData = $request->validated();
        $professionnel->update($validatedData);
        return redirect()->route('professionnels.index')
            ->withInformation('Le professionnel a été mis à jour avec succès');
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
