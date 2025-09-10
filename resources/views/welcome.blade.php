<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>Laravel</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        a {
            font-size: 20px;
            color: #3490dc;
            text-decoration: none;
            margin-top: 20px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Bem-vindo ao Laravel</h1>

    <p>Chave da API: {{ env('GEOAPIFY_API_KEY') }}</p>


    <a href="{{ route('coordenadas.index') }}">Ver Coordenadas</a>
    <br>
    <!-- Link para o mapa -->
    <a href="{{ url('/mp1') }}" target="_blank">📍 Ver Mapa 1</a>
    <br>

    <a href="{{ url('/mp2') }}" target="_blank">📍 Ver Mapa 2</a>
    <br>


    <a href="{{ url('/mp3') }}" target="_blank">📍 Ver Mapa 3</a>
    <br>

</body>

</html>
