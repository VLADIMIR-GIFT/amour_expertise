<!-- resources/views/unites_enseignement/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Détails de l'UE</title>
</head>
<body>
    <h1>Détails de l'Unité d'Enseignement</h1>
    <p><strong>Nom :</strong> {{ $ue->nom }}</p>
    <p><strong>Description :</strong> {{ $ue->description }}</p>
</body>
</html>
