<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@700;900&amp;family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
            "colors": {
                    "outline-variant": "#40485d",
                    "on-tertiary-container": "#005a3c",
                    "on-error": "#490006",
                    "surface-container-lowest": "#000000",
                    "surface-bright": "#1f2b49",
                    "tertiary-fixed-dim": "#58e7ab",
                    "surface": "#060e20",
                    "inverse-surface": "#faf8ff",
                    "primary-container": "#7b9cff",
                    "surface-container": "#0f1930",
                    "on-tertiary-fixed": "#00452d",
                    "on-primary": "#002873",
                    "on-secondary-fixed-variant": "#724700",
                    "primary-dim": "#316bf3",
                    "primary-fixed-dim": "#658eff",
                    "on-error-container": "#ffa8a3",
                    "primary": "#90abff",
                    "on-secondary-fixed": "#4c2e00",
                    "on-surface-variant": "#a3aac4",
                    "on-tertiary": "#006443",
                    "on-background": "#dee5ff",
                    "on-tertiary-fixed-variant": "#006544",
                    "tertiary-fixed": "#69f6b8",
                    "secondary-fixed": "#ffc885",
                    "on-surface": "#dee5ff",
                    "secondary-container": "#855300",
                    "inverse-primary": "#0053dc",
                    "secondary": "#f8a010",
                    "on-secondary": "#4a2c00",
                    "on-primary-fixed-variant": "#00266e",
                    "surface-dim": "#060e20",
                    "error-container": "#9f0519",
                    "surface-variant": "#192540",
                    "primary-fixed": "#7b9cff",
                    "on-primary-fixed": "#000000",
                    "surface-container-low": "#091328",
                    "surface-tint": "#90abff",
                    "error-dim": "#d7383b",
                    "on-primary-container": "#001e5a",
                    "secondary-dim": "#e79400",
                    "tertiary": "#9bffce",
                    "tertiary-container": "#69f6b8",
                    "surface-container-highest": "#192540",
                    "surface-container-high": "#141f38",
                    "error": "#ff716c",
                    "background": "#060e20",
                    "on-secondary-container": "#fff6f0",
                    "inverse-on-surface": "#4d556b",
                    "outline": "#6d758c",
                    "tertiary-dim": "#58e7ab",
                    "secondary-fixed-dim": "#ffb554"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "fontFamily": {
                    "headline": ["Epilogue"],
                    "body": ["Inter"],
                    "label": ["Inter"]
            }
            },
        },
        }
    </script>

    <?php
        $version = '1993.4.8';
    ?>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logos/oxa_16x16.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logos/oxa_32x32.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('logos/oxa_48x48.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('logos/oxa_64x64.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('logos/oxa_96x96.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="128x128" href="{{ asset('logos/oxa_128x128.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('logos/oxa_192x192.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="256x256" href="{{ asset('logos/oxa_256x256.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('logos/oxa_512x512.png') }}?v=<?php echo $version ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logos/oxa_180X180.png') }}?v=<?php echo $version ?>">

    <!-- Google Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet"> -->

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


    <link href="{{asset('css/styles.css')}}?v=<?php echo $version ?>" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/particles.js"></script>

    <!-- Scripts -->
    <!-- vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
</head>
<body class="bg-surface text-on-surface font-body selection:bg-primary/30">   
        @include('components.topbar')
        <div class="container mt-5">
            @yield('content')
        </div>
        @include('components.navbar')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
