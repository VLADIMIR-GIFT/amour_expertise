<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Application Laravel</title>
    @vite('resources/js/app.js')  <!-- Assurez-vous d'utiliser Vite si vous avez configuré Vue ou autre -->
</head>
<body>
    @yield('content')
</body>
</html>
