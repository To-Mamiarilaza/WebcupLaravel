<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listes des légumes</title>
</head>
<body>
    <h1>Voici la liste des légumes</h1>
    <ul>
        @foreach ($vegetables as $vegetable)
            <li>{{$vegetable->vegetable_name}}</li>
        @endforeach
    </ul>
</body>
</html>