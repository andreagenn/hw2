<html>
    <head>
        <title>Power Gym - @yield('title')</title>
        <meta charset="utf-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>

        @section('header')
            <header>
                <nav>
                    <div id="links">
                        <a href='/laravel/public/homepage' id="home">Home</a>
                        <a href='/laravel/public/account'>Account</a>
                        <a href='/laravel/public/scheda'>Scheda</a>
                        <a href='/laravel/public/ricerca_scheda'>Ricerca</a>
                        <a href='/laravel/public/calorie'>Calorie</a>
                    </div>
                <div id="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                </nav>
                <h1>@yield('titolo')</h1>
                <div id="overlay"></div>
            </header>            
        @show

        @yield('content')
        
        @section('footer')
            <footer>
                <p>
                    Powered by Andrea Gennuso O46002118
                </p>
            </footer>
        @show

    </body>
</html>
