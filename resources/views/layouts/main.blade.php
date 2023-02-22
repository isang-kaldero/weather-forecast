<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">        

        <!-- Styles -->
        <link rel="stylesheet" href=" {{mix ('css/app.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />     
        
        <script src="{{ mix('/js/app.js') }}" defer></script>
        
    </head>
    <body>
        <div class="flex p-4 main content-center bg-gray-200 mb-6">
            <div class="flex flex-no-wrap content-center"><h1 class="p-4 uppercase text-gray-800 font-semibold">Weather Forecast</h1></div>

            @auth
            <div class="">
                <a href="{{ url('/logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a>
            </div>                            
            @endauth
        
        </div>   
        
        <main id="app">
            @yield('content')
        </main>
    </body>
</html>
