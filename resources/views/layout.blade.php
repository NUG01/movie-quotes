<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Movie Qoutes</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/sansation" rel="stylesheet">




    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Sansation", sans-serif;
        }

        html {
            font-size: 62.5%;
        }

        body {
            background: rgb(78, 78, 78);
            background: radial-gradient(circle, rgba(78, 78, 78, 1) 0%, rgba(61, 59, 59, 1) 99%, rgba(61, 59, 59, 1) 100%);
        }

        .scrollHide::-webkit-scrollbar {
            display: none;
        }

        .scrollHide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .grid {
            grid-template-rows: 4.2fr 1fr;
        }

        .bck {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

@yield('content')

</html>
