<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

        <title>Selldone Connect OS | Error</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">


    </head>
    <body  style="background-color: #e2e8f0;font-family: Roboto;text-align: center">
    <div style="min-height: 100vh;display: flex;align-items: center;justify-content: center;padding: 16px">
        <div>
           <h1> ⚠ {!! $error !!}</h1>
            {!!$message??''  !!}
        </div>
    </div>

    </body>
</html>
