@props(['title' => 'कोपिला मिडिया हाउस', 'description' => 'कोपिला मिडिया हाउस — ताजा समाचार, विश्लेषण र घटनाक्रम एकै ठाउँमा।'])
<!DOCTYPE html>
<html lang="ne">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Devanagari+Sanskrit&family=Hind:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
</head>

<body class="bg-paper text-ink antialiased">
    <x-frontend-header />
    <main>
        {{ $slot }}
    </main>
    <x-frontend-footer />
</body>

</html>
