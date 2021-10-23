<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/valves.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <img  id="logo" src="/he2b-esi.jpg" alt="HE2B-ESI">
        <h1>WEB II - @yield('title')</h1>
        <div class="menu">
            <a href="/">Home</a>
            <a href="/repositories">Dépots</a>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        WEBG4 - WEBII - NVS
    </footer>
</body>
</html>