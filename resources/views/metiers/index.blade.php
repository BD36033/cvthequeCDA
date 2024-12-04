@extends('accueilVue')
{{-- directive de blade spécifiant l'héritage--}}
{{-- directive de blade spécifiant l'injection du contenu de la section qui suit. Le lien est réalisé avec la directive @yield() --}}
@section('contenu')
@if(session('information'))
<div class="alert alert-dismissible alert-success w-50 m-auto">
  <h4>Informations :</h4>
  <p>{{session('information')}}</p>
</div>
@endif
<table class="table table-success w-50 m-auto rounded">
    <thead>
      <tr>
        <th scope="col">Intitulé</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($metiers as $index => $metier)
      <tr class="{{ $index % 2 == 0 ? 'table-info' : 'table-primary' }}">
        <td>{{ $metier->designation }}</td>
        <td class="d-flex justify-content-between">
          <form action="{{route('metiers.show', $metier->slug)}}" method="POST">
            @method('GET')
            @csrf {{--token pour les failles--}}
            <button class="btn btn-light mr-2" type="submit">
              consulter
            </button>
          </form>
          <form action="{{route('metiers.edit', $metier->slug)}}" method="POST">
            @method('GET')
            @csrf {{-- directive 'cisurf' token pour les failles--}}
            <button class="btn btn-warning mr-2" type="submit">
              modifier
            </button>
          </form>
          <a href="{{ route('metiers.confirm-delete', $metier->slug) }}" class="btn btn-danger">
            supprimer
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
    <div class="d-flex w-100 justify-content-center m-4">
      <a  class="btn btn-primary" href="{{route('metiers.create')}}">Ajouter</a>
    </div>
</table>

@endsection