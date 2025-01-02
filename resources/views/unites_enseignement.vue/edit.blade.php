@extends('layout')

@section('content')
    <h1>Modifier l'UE</h1>
    <form action="{{ route('ues.update', $ue->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="code">Code UE :</label>
        <input type="text" name="code" id="code" value="{{ $ue->code }}" required>
        <label for="nom">Nom de l'UE :</label>
        <input type="text" name="nom" id="nom" value="{{ $ue->nom }}" required>
        <label for="credits_ects">Crédits ECTS :</label>
        <input type="number" name="credits_ects" id="credits_ects" value="{{ $ue->credits_ects }}" min="1" max="30" required>
        <label for="semestre">Semestre :</label>
        <input type="text" name="semestre" id="semestre" value="{{ $ue->semestre }}" required>
        <button type="submit">Enregistrer</button>
    </form>
@endsection
