@extends('layout')

@section('content')
    <h1>Modifier l'EC</h1>
    <form action="{{ route('ecs.update', $ec->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nom">Nom de l'EC :</label>
        <input type="text" name="nom" id="nom" value="{{ $ec->nom }}" required>
        <label for="coefficient">Coefficient :</label>
        <input type="number" name="coefficient" id="coefficient" value="{{ $ec->coefficient }}" min="1" max="5" required>
        <label for="ue_id">Rattachement à une UE :</label>
        <select name="ue_id" id="ue_id">
            @foreach ($ues as $ue)
                <option value="{{ $ue->id }}" {{ $ue->id == $ec->ue_id ? 'selected' : '' }}>
                    {{ $ue->nom }}
                </option>
            @endforeach
        </select>
        <button type="submit">Enregistrer</button>
    </form>
@endsection
