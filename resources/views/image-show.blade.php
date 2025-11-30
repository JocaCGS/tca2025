<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ $image->title }}</title>
</head>

<body>

    <h1>{{ $image->title }}</h1>

    <img src="{{ $image->image }}" alt="{{ $image->title }}" style="max-width: 100%; height: auto;">

    <p>Tag: {{ $image->tag }}</p>

    <br>

    <a href="{{ route('home') }}">Voltar</a>

</body>

</html>