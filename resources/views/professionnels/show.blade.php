@extends('accueilVue')
@section('contenu')
<div class="container mt-5">
    <div class="text-center mb-4">
        <a class="btn btn-secondary" href="{{ route('professionnels.index') }}">Retour</a>
    </div>

    <div class="card bg-primary text-white card-professionnel">
        <div class="card-header text-center">
            <h5>Professionnel #{{ $professionnel->id }}</h5>
        </div>
        <div class="card-body">
            <h4 class="card-title text-center">{{ $professionnel->nom }}</h4>
            <p><strong>Email : </strong>{{ $professionnel->email }}</p>
            <p><strong>Téléphone : </strong>{{ $professionnel->numero_de_telephone }}</p>
            <p><strong>Métier : </strong>
                @if($professionnel->metier_id)
                {{ $metiers->firstWhere('id', $professionnel->metier_id)->designation ?? 'Métier non trouvé' }}
                @else
                Aucun métier assigné
                @endif
            </p>
            <p><strong>Compétences : </strong>
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
            <div class="text-center mt-4">
            @if($professionnel->cv_path)
            <h3>CV</h3>
            <div class="iframe-container">
                <iframe src="data:application/pdf;base64,{{ base64_encode($professionnel->cv_path) }}" allowfullscreen style="height: 800px;"></iframe>
            </div>
        @else
            <p>Aucun CV disponible.</p>
        @endif
            </div>
        </div>
    </div>
</div>
@endsection
