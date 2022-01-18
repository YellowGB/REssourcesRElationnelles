<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script defer src="theme.js"></script>
        <link rel="stylesheet" type="text/css" href="{{ url('./style.css') }}">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css" />
        <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
        
        <title>Ressources Relationnelles</title>

    </head>
    <body>
        @yield( 'content' )
    </body>
</html>