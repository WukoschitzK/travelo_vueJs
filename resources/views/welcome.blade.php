<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Travelo!</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap");
        #app {
            font-family: Poppins, Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
</head>

<body>
<div id="app" >
    <div class="lg:flex flex-row-reverse justify-between items-center min-h-screen">
        <div class='bg-black bg-opacity-25 h-64 md:h-72 lg:min-h-screen lg:w-full relative mb-9 md:mb-20 lg:mb-0'>
            <img src="../img/header-img.jpg" alt="car" class="w-full h-full object-cover absolute object-left mix-blend-overlay">
        </div>

        <div class="pl-8 md:pl-16 lg:pl-28 lg:pr-28">
            <h1 class="font-poppins font-bold text-yellow text-4xl lg:text-7xl md:text-6xl mb-2.5 lg:leading-tight	">Bist du auch
                Travelo?</h1>
            <p class="text-3xl md:text-3xl lg:text-4xl font-light mb-9">Teile dein Erlebnis mit
                der ganzen Welt.</p>
            <p class="text-xl md:text-2xl font-light md:leading-10">Travelo ist das Online-Tagebuch für Reisende aus aller Welt. Teile deine Reiseerlebnisse mit unserer Community. Travelon!</p>
        </div>


    </div>

    <div class="pt-14 md:pt-20 lg:pt-28 px-8 md:px-16 lg:px-28">
        <all-posts></all-posts>
        <create-post></create-post>
    </div>
</div>
</body>
<script src="{{ mix('js/app.js') }}" defer></script>
</html>
