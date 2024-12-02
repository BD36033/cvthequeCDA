@extends('accueilVue')
@section('contenu')
<div class="d-flex w-100 justify-content-center mb-4 flex-column">
    <div class="btn-group w-20 m-auto mb-4">
        <a class="btn btn-secondary" href="{{route('metiers.index')}}">Retour</a>
    </div>
    
    <div class="d-flex justify-content-center m-auto card text-white bg-primary mb-3" style="max-width: 20rem;">
        <div class="card-header">Métier {{ $metier->id }}</div>
        <div class="card-body">
            <h4 class="card-title">{{ $metier->designation }}</h4>
            <p class="card-text">{{ $metier->description }}</p>
        </div>
    </div>
</div>
@endsection