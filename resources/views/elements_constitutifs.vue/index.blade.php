@extends('layouts.app')

@section('content')
    <h1>Liste des ECs</h1>
    <a href="{{ route('elements_constitutifs.create') }}">Créer un EC</a>

    <table>
        <thead>
            <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Coefficient</th>
                <th>UE Associée</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ecs as $ec)
                <tr>
                    <td>{{ $ec->code }}</td>
                    <td>{{ $ec->nom }}</td>
                    <td>{{ $ec->coefficient }}</td>
                    <td>{{ $ec->ue->nom }}</td>
                    <td>
                        <a href="{{ route('elements_constitutifs.edit', $ec->id) }}">Éditer</a>
                        <form action="{{ route('elements_constitutifs.destroy', $ec->id) }}" method="POST" style="display:inline;">
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
