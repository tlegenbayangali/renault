<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Renault | Сервисный центр</title>
    <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
    @livewireStyles
</head>
<body class="overflow-hidden">
<header class="text-white bg-renault-black py-5">
    <div class="px-6 flex items-center justify-between">
        <a href="#" class="logo flex items-center">
            <svg class="fill-white w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 358.09 470.11">
                <path
                        d="M161.12.07C155,11.51,72.55,165.75,37,232a5.71,5.71,0,0,0,.07,6.2c34.79,64.93,105.31,196.67,106,197.89.74-1.22,71.26-133,106.05-197.89a5.71,5.71,0,0,0,.07-6.2q-29.87-55.54-59.6-111.17a5.94,5.94,0,0,1,0-6.53c5.47-9.86,10.71-19.85,16.27-30.22.78,1.34,53.55,99.84,79.43,148.1a5.19,5.19,0,0,1,.06,5.63Q224,352.48,162.72,467.21c-1.09,2-2.2,3-4.68,2.93-10.11-.17-20.23-.12-30.35,0a3.63,3.63,0,0,1-3.75-2.24Q62.37,352.57.68,237.33a4.12,4.12,0,0,1-.05-4.45Q62.33,117.65,124,2.39c.52-1,1.74-2.2,2.65-2.22C137.92,0,149.21.07,161.12.07Z"/>
                <path
                        d="M207.89,47.14c-18.82,35.08-70.72,132-99,184.79a5.69,5.69,0,0,0-.06,6.19q29.87,55.56,59.6,111.18a6,6,0,0,1,0,6.53c-5.48,9.86-10.72,19.85-16.28,30.22-.73-1.25-53.5-99.76-79.43-148.12a5.19,5.19,0,0,1,0-5.63Q134.11,117.66,195.37,2.92c1.09-2,2.21-3,4.68-2.92,10.11.17,20.23.12,30.35,0a3.63,3.63,0,0,1,3.75,2.25q61.57,115.31,123.27,230.54a4.12,4.12,0,0,1,0,4.44Q295.76,352.51,234.1,467.76c-.52,1-1.74,2.19-2.65,2.21-11.29.15-22.58.09-34.4.09.77-1.51,83.27-155.9,124-231.95a5.71,5.71,0,0,0-.07-6.19C286.19,167,215.67,35.25,214.94,34c-.14.23-2.72,5-7.05,13.11"/>
            </svg>
            <h2 class="ml-4 text-lg">ТОО "Урал-Кров-Авто Плюс"</h2>
        </a>
        <livewire:timer.timer/>
    </div>
</header>
@yield('content')
<script src="{{ asset('js/app.js') }}"></script>
@livewireScripts
</body>
</html>
