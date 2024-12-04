@extends('accueilVue')
@section('contenu')
<div class="container mt-4">
    <div class="card border-danger">
        <div class="card-header bg-danger text-white">
            <h4>Confirmation de suppression</h4>
        </div>
        <div class="card-body">
            <div class="alert alert-warning">
                <h5>Êtes-vous sûr de vouloir supprimer ce professionnel ?</h5>
            </div>
            
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Professionnel #{{ $professionnel->id }}</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">{{ $professionnel->nom }}</h6>
                    <p class="card-text">{{ $professionnel->email }}</p>
                    <p class="card-text">{{ $professionnel->numero_de_telephone }}</p>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('professionnels.index') }}" class="btn btn-secondary">Annuler</a>
                <form action="{{ route('professionnels.destroy', $professionnel->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 