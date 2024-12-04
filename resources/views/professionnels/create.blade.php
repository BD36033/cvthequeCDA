@extends('accueilVue')
@section('contenu')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Ajouter un métier</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('professionnels.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                           id="nom" name="nom" value="{{ old('nom') }}">
                    @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <textarea class="form-control @error('email') is-invalid @enderror" 
                              id="email" name="email" rows="3">{{ old('email') }}</textarea>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="numero_de_telephone" class="form-label">Numéro de téléphone</label>
                    <textarea class="form-control @error('numero_de_telephone') is-invalid @enderror" 
                              id="numero_de_telephone" name="numero_de_telephone" rows="3">{{ old('numero_de_telephone') }}</textarea>
                    @error('numero_de_telephone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <textarea class="form-control @error('password') is-invalid @enderror" 
                              id="password" name="password" rows="3">{{ old('password') }}</textarea>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                            <div class="mb-3">
                <label for="metier_id" class="form-label">Métier</label>
                <select class="form-control @error('metier_id') is-invalid @enderror" id="metier_id" name="metier_id">
                    <option value="">Sélectionnez un métier</option>
                    @foreach($metiers as $metier)
                        <option value="{{ $metier->id }}">{{ $metier->designation }}</option>
                    @endforeach
                </select>
                @error('metier_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

                    <div class="mb-3">
            <label for="competences" class="form-label">Compétences</label>
            <select class="form-control @error('competences') is-invalid @enderror" id="competences" name="competences[]" multiple>
                @foreach($competences as $competence)
                    <option value="{{ $competence->id }}">{{ $competence->designation }}</option>
                @endforeach
            </select>
            @error('competences')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
                            <div class="d-flex justify-content-between">
                    <a href="{{ route('professionnels.index') }}" class="btn btn-secondary">Retour</a>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection