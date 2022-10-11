<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

        <title>Selldone Connect OS | Provider Sample</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

        <script>
            {{-- Critical secure data! Make sure not acessible to the public in the producstion enviorment. --}}
            @isset($config)
                window.SD_CONFIG={!! json_encode($config) !!}
            @endisset()
        </script>

    </head>
    <body >

    <!-- ♺ Application -->
    <div id="app"></div>

    <script src="{{ mix('/js/app.js') }}"></script>



    </body>
</html>
