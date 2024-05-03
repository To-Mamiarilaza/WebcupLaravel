<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <div>
            <label for="nom">Nom d'utilisateur:</label>
            <input type="text" id="nom" name="nom" required>
        </div>

        <div>
            <label for="mdp">Mot de passe:</label>
            <input type="password" id="mdp" name="mdp" required>
        </div>

        <button type="submit">Login</button>
    </form>
</body>
</html>
