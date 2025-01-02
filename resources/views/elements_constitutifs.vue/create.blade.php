@extends('layout')

@section('content')
    <h1>Créer un nouvel EC</h1>
    <form action="{{ route('ecs.store') }}" method="POST">
        @csrf
        <label for="nom">Nom de l'EC :</label>
        <input type="text" name="nom" id="nom" required>
        <label for="coefficient">Coefficient :</label>
        <input type="number" name="coefficient" id="coefficient" min="1" max="5" required>
        <label for="ue_id">Rattachement à une UE :</label>
        <select name="ue_id" id="ue_id">
            @foreach ($ues as $ue)
                <option value="{{ $ue->id }}">{{ $ue->nom }}</option>
            @endforeach
        </select>
        <button type="submit">Créer</button>
    </form>
@endsection
