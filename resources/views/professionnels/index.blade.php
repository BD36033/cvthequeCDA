@extends('accueilVue')
@section('contenu')
@if(session('information'))
<div class="alert alert-dismissible alert-success w-50 m-auto">
    <h4>Informations :</h4>
    <p>{{session('information')}}</p>
</div>
@endif
<div class="d-flex w-100 justify-content-center m-4">
    <a class="btn btn-primary" href="{{ route('professionnels.create') }}">Ajouter un professionnel</a>
</div>
<table class="table table-success w-75 m-auto rounded">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">Numéro de téléphone</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($professionnels as $index => $professionnel)
        <tr class="{{ $index % 2 == 0 ? 'table-info' : 'table-primary' }}">
            <td>{{ $professionnel->nom }}</td>
            <td>{{ $professionnel->email }}</td>
            <td>{{ $professionnel->numero_de_telephone }}</td>
            <td class="d-flex justify-content-between">
                <a href="{{ route('professionnels.show', $professionnel->id) }}" class="btn btn-light">
                    Consulter
                </a>
                <a href="{{ route('professionnels.edit', $professionnel->id) }}" class="btn btn-warning">
                    Modifier
                </a>
                <a href="{{ route('professionnels.confirm-delete', $professionnel->id) }}" class="btn btn-danger">
                    Supprimer
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection