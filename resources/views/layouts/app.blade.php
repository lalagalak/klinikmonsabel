<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Monsabel Clinic</title>

    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Tai+Heritage+Pro:wght@400;700&family=Text+Me+One&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- VITE -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        html{
            scroll-behavior:smooth;
        }

        body{
            font-family:'Plus Jakarta Sans',sans-serif;
            background:#ffffff;
            overflow-x:hidden;
        }

        .logo-title{
            font-family:'Tai Heritage Pro',serif;
            font-weight:700;
        }

        .navbar-menu{
            font-family:'Text Me One',sans-serif;
            text-transform:uppercase;
            letter-spacing:2px;
            font-size:14px;
            font-weight:700;
        }

        .hero-title{
            font-family:'Tai Heritage Pro',serif;
            font-weight:700;
        }

        .logo-title{
            font-family:'Tai Heritage Pro',serif;
            font-weight:700;
        }

        .navbar-menu{
            font-family:'Text Me One',sans-serif;
            text-transform:uppercase;
            letter-spacing:2px;
            font-size:14px;
            font-weight:700;
        }

        .navbar-dropdown{
            font-family:'Text Me One',sans-serif;
            text-transform:uppercase;
            letter-spacing:1.5px;
            font-size:13px;
            font-weight:700;
        }

    </style>

</head>

<body class="antialiased bg-white">

    <div class="min-h-screen bg-white">

        {{-- NAVBAR --}}
        @include('layouts.navigation')

        {{-- PAGE HEADER --}}
        @isset($header)

            <header class="bg-white">

                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

                    {{ $header }}

                </div>

            </header>

        @endisset

        {{-- PAGE CONTENT --}}
        <main class="pt-16 md:pt-20">

            {{ $slot }}

        </main>

    </div>

    <script>
document.addEventListener("DOMContentLoaded", function () {

    const menuBtn = document.getElementById("menuBtn");
    const mobileMenu = document.getElementById("mobileMenu");

    if(menuBtn && mobileMenu){

        menuBtn.addEventListener("click", function(){

            mobileMenu.classList.toggle("hidden");

            // Ganti icon ☰ menjadi X
            const icon = this.querySelector("svg");

            if(mobileMenu.classList.contains("hidden")){

                icon.innerHTML = `
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"/>
                `;

            }else{

                icon.innerHTML = `
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"/>
                `;

            }

        });

    }

});
</script>

</body>
</html>