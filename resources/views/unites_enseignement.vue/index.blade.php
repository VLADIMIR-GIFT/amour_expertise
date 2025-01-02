@extends('layouts.app')

@section('content')
    <h1>Liste des UEs</h1>
    <a href="{{ route('unites_enseignement.create') }}">Créer une UE</a>

    <table>
        <thead>
            <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Crédits ECTS</th>
                <th>Semestre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($unites_enseignement as $ue)
                <tr>
                    <td>{{ $ue->code }}</td>
                    <td>{{ $ue->nom }}</td>
                    <td>{{ $ue->credits_ects }}</td>
                    <td>{{ $ue->semestre }}</td>
                    <td>
                        <a href="{{ route('unites_enseignement.edit', $ue->id) }}">Éditer</a>
                        <form action="{{ route('unites_enseignement.destroy', $ue->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
