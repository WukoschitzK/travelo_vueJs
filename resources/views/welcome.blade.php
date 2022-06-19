<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Travelo!</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap');
    </style>
</head>

<body>
<div>
    <div class="lg:flex flex-row-reverse justify-between items-center min-h-screen">
        <div class='bg-black bg-opacity-25 h-72 md:h-96 lg:min-h-screen lg:w-4/5 relative mb-9'>
            <img src="../img/header-img.jpg" alt="car" class="w-full h-full object-cover absolute object-left mix-blend-overlay">
        </div>

        <div class="pl-8 md:pl-16 lg:pl-28 lg:pr-32">
            <h1 class="font-bold text-yellow text-4xl md:text-6xl mb-2.5">Bist du auch
                Travelo?</h1>
            <p class="text-3xl md:text-4xl lg:text-5xl font-light mb-9">Teile dein Erlebnis mit
                der ganzen Welt.</p>
            <p class="text-xl md:text-3xl font-light">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
        </div>


    </div>
{{--    <img src="../img/header-img.jpg" alt="car">--}}
    <div id="app" class="pt-14 md:pt-20 lg:pt-28 px-8 md:px-16 lg:px-28">
        <all-posts></all-posts>
        <create-post></create-post>
    </div>
</div>
</body>
{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
</html>
