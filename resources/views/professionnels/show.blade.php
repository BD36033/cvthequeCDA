@extends('accueilVue')
@section('contenu')
<div class="d-flex w-100 justify-content-center mb-4 flex-column">
    <div class="btn-group w-20 m-auto mb-4">
        <a class="btn btn-secondary" href="{{route('professionnels.index')}}">Retour</a>
    </div>
    
    <div class="d-flex justify-content-center m-auto card text-white bg-primary mb-3" style="max-width: 20rem;">
        <div class="card-header">Professionnel {{ $professionnel->id }}</div>
        <div class="card-body">
            <h4 class="card-title">{{ $professionnel->nom }}</h4>
            <p class="card-text">{{ $professionnel->email }}</p>
            <p class="card-text">{{ $professionnel->numero_de_telephone }}</p>
            <p>Métier: 
                @if($professionnel->metier_id)
                    {{ $metiers->firstWhere('id', $professionnel->metier_id)->designation ?? 'Métier non trouvé' }}
                @else
                    Aucun compétences assignées
                @endif
            </p>

            <p>Compétences: 
                @if($professionnel->competences->isNotEmpty())
                    <ul>
                        @foreach($professionnel->competences as $competence)
                            <li>{{ $competence->designation }}</li>
                        @endforeach
                    </ul>
                @else
                    Aucune compétence assignée
                @endif
            </p>
        </div>
    </div>
</div>
@endsection