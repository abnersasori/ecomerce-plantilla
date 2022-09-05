<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    <script src="/js/app.js" defer></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    
    
</head>
<body>
   
    <div id="app" class="d-flex flex-column h-screen justify-content-between">

        <header>
           @include('partials/nav')
       </header>

       <main class="py-3">
         @yield('content')
       </main>

       <footer class="bg-white text-center text-black-50 py-3 shadow">{{config('app.name')}}</footer>

    </div>
    
</body>
</html>