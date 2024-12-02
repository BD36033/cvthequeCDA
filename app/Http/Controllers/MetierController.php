<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Metier,
};
use App\Http\Requests\MetierRequest;

class MetierController extends Controller
{
    public function index()
    {
        $metiers = Metier::all();
        return view('metiers.index', compact('metiers'));
    }

    public function create()
    {
        return view('metiers.create');
    }

    public function store(MetierRequest $metierRequest)
    {
        $validatedData = $metierRequest->validated();
        Metier::create($validatedData);
        return redirect()->route('metiers.index')
            ->withInformation('Le métier a été créé avec succès');
    }

    public function show(string $slug)
    {
        $metier = Metier::where('slug', $slug)->firstOrFail();
        $data = [
            'titre' => 'Les métiers de ' . config('app.name'),
            'description' => 'l\'ensemble des métiers de ' . config('app.name'),
            'metier' => $metier,
        ];
        return view('metiers.show', $data);
    }

    public function edit(string $slug)
    {
        $metier = Metier::where('slug', $slug)->firstOrFail();
        return view('metiers.edit', compact('metier'));
    }

    public function update(MetierRequest $request, string $slug)
    {
        $metier = Metier::where('slug', $slug)->firstOrFail();
        $validatedData = $request->validated();
        $metier->update($validatedData);
        return redirect()->route('metiers.index')
            ->withInformation('Le métier a été mis à jour avec succès');
    }

    public function destroy(string $slug)
    {
        $metier = Metier::where('slug', $slug)->firstOrFail();
        $metier->delete();
        return redirect()->route('metiers.index')
            ->withInformation('Le métier a été supprimé avec succès');
    }

    public function confirmDelete(string $slug)
    {
        $metier = Metier::where('slug', $slug)->firstOrFail();
        return view('metiers.delete', compact('metier'));
    }
}
