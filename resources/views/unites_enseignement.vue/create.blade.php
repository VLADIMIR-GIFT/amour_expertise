@extends('layouts.app')

@section('content')
    <h1>Créer une nouvelle UE</h1>

    <form action="{{ route('unites_enseignement.store') }}" method="POST">
        @csrf
        <div>
            <label for="code">Code</label>
            <input type="text" name="code" id="code" value="{{ old('code') }}">
        </div>
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}">
        </div>
        <div>
            <label for="credits_ects">Crédits ECTS</label>
            <input type="number" name="credits_ects" id="credits_ects" value="{{ old('credits_ects') }}">
        </div>
        <div>
            <label for="semestre">Semestre</label>
            <input type="number" name="semestre" id="semestre" value="{{ old('semestre') }}">
        </div>
        <button type="submit">Créer</button>
    </form>
@endsection
