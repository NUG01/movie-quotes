<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Movie Qoutes</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">



    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Nunito", sans-serif;
        }

        html {
            font-size: 62.5%;
            font-family: 'Nunito', sans-serif;
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

        .bck {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;


        }

        .grid {
            grid-template-rows: 4.2fr 1fr;
        }
    </style>

    @vite('resources/css/app.css')
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</head>

<body class="h-screen flex items-center justify-center gap-48">
    <a href="/">
        <ion-icon name="arrow-round-back"
            class="absolute top-0 left-0 translate-y-1/2 translate-x-full text-6xl text-white hover:drop-shadow-xl">
        </ion-icon>
    </a>

    <div class="flex items-center justify-center">
        <a href="/choose"
            class="order-1 bg-gray-500 px-8 py-4 rounded-xl drop-shadow-xl text-5xl text-white hover:drop-shadow-xl hover:text-gray-600 hover:bg-slate-50">Movies
        </a>
        <a href="/choose"
            class="order-1 bg-gray-500 py-4 px-8 rounded-xl drop-shadow-xl text-5xl text-white hover:drop-shadow-xl hover:text-gray-600 hover:bg-slate-50">Quotes
        </a>
    </div>

    <div class="flex absolute flex-col top-1/2 left-10 gap-2 -translate-y-1/2">
        <a href="#"><svg width="62" height="62" viewBox="0 0 66 62" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <circle cx="33" cy="29" r="28" stroke="white" stroke-width="2" />
                <path
                    d="M26.1445 24.6953C29.6445 24.6953 31.3945 26.4258 31.3945 29.8867C31.3945 30.3789 31.3594 30.9062 31.2891 31.4688H22.6523C22.6523 33.9844 24.1211 35.2422 27.0586 35.2422C28.457 35.2422 29.6992 35.0859 30.7852 34.7734V36.5312C29.6992 36.8438 28.3789 37 26.8242 37C22.5977 37 20.4844 34.9023 20.4844 30.707C20.4844 26.6992 22.3711 24.6953 26.1445 24.6953ZM22.6523 29.6641H29.3086C29.2617 27.5078 28.207 26.4297 26.1445 26.4297C23.957 26.4297 22.793 27.5078 22.6523 29.6641ZM34.3125 37V24.6953H35.7773L36.1641 26.2656C37.4219 25.2188 38.8047 24.6953 40.3125 24.6953C43.3828 24.6953 44.918 26.2227 44.918 29.2773V37H42.75V29.2422C42.75 27.4141 41.8398 26.5 40.0195 26.5C38.7773 26.5 37.5977 27.0195 36.4805 28.0586V37H34.3125Z"
                    fill="white" />
            </svg></a>
        <a href="#"><svg width="62" height="62" viewBox="0 0 66 62" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <circle cx="33" cy="29" r="28" fill="white" stroke="white" stroke-width="2" />
                <path
                    d="M21.1758 37V20.2422H23.3438V25.6562C24.5391 25.0156 25.918 24.6953 27.4805 24.6953C30.543 24.6953 32.0742 25.8789 32.0742 28.2461C32.0742 29.9648 30.9023 31.1523 28.5586 31.8086L32.4961 37H29.7539L25.8398 31.7852V30.8125C28.5508 30.5703 29.9062 29.7109 29.9062 28.2344C29.9062 27.0469 29.0469 26.4531 27.3281 26.4531C25.9766 26.4531 24.6484 26.8203 23.3438 27.5547V37H21.1758ZM34.4414 33.2852C34.4414 30.7617 36.1055 29.5 39.4336 29.5C40.5039 29.5 41.5742 29.5781 42.6445 29.7344V28.5742C42.6445 27.1602 41.5391 26.4531 39.3281 26.4531C38.0625 26.4531 36.7656 26.6484 35.4375 27.0391V25.2812C36.7656 24.8906 38.0625 24.6953 39.3281 24.6953C42.9844 24.6953 44.8125 25.9688 44.8125 28.5156V37H43.5938L42.8438 35.7812C41.6172 36.5938 40.2812 37 38.8359 37C35.9062 37 34.4414 35.7617 34.4414 33.2852ZM39.4336 31.2578C37.5508 31.2578 36.6094 31.9219 36.6094 33.25C36.6094 34.5781 37.3516 35.2422 38.8359 35.2422C40.3359 35.2422 41.6055 34.8438 42.6445 34.0469V31.4922C41.5742 31.3359 40.5039 31.2578 39.4336 31.2578Z"
                    fill="#171717" />
            </svg></a>
    </div>
</body>

</html>
