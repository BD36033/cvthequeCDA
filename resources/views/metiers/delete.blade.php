@extends('accueilVue')
@section('contenu')
<div class="container mt-4">
    <div class="card border-danger">
        <div class="card-header bg-danger text-white">
            <h4>Confirmation de suppression</h4>
        </div>
        <div class="card-body">
            <div class="alert alert-warning">
                <h5>Êtes-vous sûr de vouloir supprimer cette compétence ?</h5>
            </div>
            
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Compétence #{{ $metier->id }}</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">{{ $metier->designation }}</h6>
                    <p class="card-text">{{ $metier->description }}</p>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('metiers.index') }}" class="btn btn-secondary">Annuler</a>
                <form action="{{ route('metiers.destroy', $metier->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 