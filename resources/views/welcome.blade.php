<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Travelo!</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div>
    <div class="flex justify-between items-center">


        <div class="">
            <h1 class="font-bold text-yellow text-6xl">Bist du auch
                Travelo?</h1>
            <p class="text-5xl font-light">Teile dein Erlebnis mit
                der ganzen Welt.</p>
            <p class="text-3xl font-light">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
        </div>
        <div class='bg-black bg-opacity-25 min-h-screen w-3/6 relative'>
                <img src="../img/header-img.jpg" alt="car" class="w-full h-full object-cover absolute mix-blend-overlay">
        </div>

    </div>
{{--    <img src="../img/header-img.jpg" alt="car">--}}
    <div id="app">
        <all-posts></all-posts>
{{--        <create-post></create-post>--}}
    </div>
</div>
</body>
<script src="{{ asset('js/app.js') }}" defer></script>
</html>
