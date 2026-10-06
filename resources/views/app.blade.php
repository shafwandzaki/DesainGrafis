<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desain Grafis</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>
<body class="custom-scrollbar text-white">
    <x-bg-utama></x-bg-utama>

    <x-navbar></x-navbar>

    <main>
        <x-home></x-home>
        <x-desain></x-desain>
        <x-tools></x-tools>
        <x-karya></x-karya>
    </main>

    <x-footer></x-footer>
</body>
</html>