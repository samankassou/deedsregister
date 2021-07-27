<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deeds Register - SCB Cameroun</title>
</head>

<body>
    <h1>Bonjour {{ $user->name }}!</h1>
    <p>Ce mail vous est envoyé suite a une demande de rénitialisation de votre mot de passe par un admin</p>
    <p>Cliquez sur le lien ci-dessous pour choisir un nouveau mot de passe</p>
    <a href="{{ route('password.reset', ['token' => $token]) }}">Cliquez ici</a>
</body>

</html>
