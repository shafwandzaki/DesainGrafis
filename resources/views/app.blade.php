<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dzaki | Desain</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="custom-scrollbar bg-[#0B0D17] text-white">
    <x-bg-utama/>
    <x-navbar/>
    <main>
        <x-home :home="$home"></x-home>
        <x-desain :desain="$desain"></x-desain>
        <x-tools :tools="$tools"></x-tools>
        <x-karya :karya="$karya"></x-karya>
    </main> 
    <x-footer></x-footer>
</body>
</html>