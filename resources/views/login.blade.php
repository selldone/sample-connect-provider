<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

        <title>Selldone Connect OS | Login</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">


    </head>
    <body  style="background-color: #e2e8f0;font-family: Roboto;text-align: start">
    <div style="min-height: 100vh;display: flex;align-items: center;justify-content: center;padding: 16px;">
        <div style="padding: 16px;max-width: 620px;margin: auto;background-color: #fff; border-radius: 16px">
           <h1> Authenticate</h1>
           <p>Give access to Selldone to read/write products, categories, and orders.</p>

            <a style="background-color: #0aa48d;color: #fff;;border-radius: 12px;padding: 22px 12px;cursor:pointer;display: block;margin: 12px;text-decoration: none;text-align: center;font-size: 17px" href="/auth/login/accept?state={{$state}}" >Grant Access</a>


            <a style="background-color: #eee;color: #333;;border-radius: 12px;padding: 22px 12px;cursor:pointer;display: block;margin: 12px;text-decoration: none;text-align: center;font-size: 17px" href="/auth/login/reject?state={{$state}}" >Reject</a>

        </div>
    </div>

    </body>
</html>
