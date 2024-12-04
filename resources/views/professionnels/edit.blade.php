@extends('accueilVue')
@section('contenu')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Modifier la compétence</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('professionnels.update', $professionnel->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control @error('nom') is-invalid @enderror"
                        id="nom" name="nom" value="{{ old('nom', $professionnel->nom) }}">
                    @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <textarea class="form-control @error('email') is-invalid @enderror"
                        id="email" name="email" rows="3">{{ old('email', $professionnel->email) }}</textarea>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="numero_de_telephone" class="form-label">Numéro de téléphone</label>
                    <textarea class="form-control @error('numero_de_telephone') is-invalid @enderror"
                        id="numero_de_telephone" name="numero_de_telephone" rows="3">{{ old('numero_de_telephone', $professionnel->numero_de_telephone) }}</textarea>
                    @error('numero_de_telephone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>



                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Laissez vide pour ne pas changer">
                    <small class="form-text text-muted">Laissez ce champ vide si vous ne souhaitez pas modifier le mot de passe.</small>
                </div>




                <div class="mb-3">
                    <label for="metier_id" class="form-label">Métier</label>
                    <select class="form-control @error('metier_id') is-invalid @enderror" id="metier_id" name="metier_id">
                        <option value="">Sélectionnez un métier</option>
                        @foreach($metiers as $metier)
                        <option value="{{ $metier->id }}" {{ $metier->id == $professionnel->metier_id ? 'selected' : '' }}>
                            {{ $metier->designation }}
                        </option>
                        @endforeach
                    </select>
                    @error('metier_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Compétences</label><br>
                    @foreach($competences as $competence)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="competence_{{ $competence->id }}" name="competences[]" value="{{ $competence->id }}"
                            {{ $professionnel->competences->contains($competence->id) ? 'checked' : '' }}>
                        <label class="form-check-label" for="competence_{{ $competence->id }}">
                            {{ $competence->designation }}
                        </label>
                    </div>
                    @endforeach
                </div>


                <div class="d-flex justify-content-between">
                    <a href="{{ route('professionnels.index') }}" class="btn btn-secondary">Retour</a>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection