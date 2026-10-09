<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Heure</title>
</head>
<body>
    <h1>{{ now()->format('H:i') }}</h1>
    <p>{{ now()->format('d/m/Y') }}</p>
</body>
</html>
