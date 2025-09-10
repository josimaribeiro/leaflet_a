<!DOCTYPE html>
<html lang="pt-br">

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Lista de Coordenadas</title>

    <style>
        .mapa-miniatura {
            border: 1px solid #ccc;
            margin-right: 10px;
            vertical-align: middle;
        }

        li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        li a {
            margin-left: auto;
        }
    </style>
</head>

<body>
    <h1>Coordenadas Cadastradas</h1>

    @if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('coordenadas.create') }}">Cadastrar nova coordenada</a>
    <br><br>

    <ul>
        @foreach($coordenadas as $c)
        <li>
            {{-- Miniatura do mapa --}}
            <img src="https://api.geoapify.com/v1/staticmap?style=osm-liberty&width=200&height=150&center=lonlat:{{ $c->longitude }},{{ $c->latitude }}&zoom=14&apiKey={{ env('GEOAPIFY_API_KEY') }}"

                class="mapa-miniatura">

            {{ $c->nome }} ({{ $c->latitude }}, {{ $c->longitude }})

            {{-- Link "Ver no mapa" para a página de detalhes --}}
            <a href="{{ route('coordenadas.show', $c->id) }}">Ver no mapa</a>
        </li>
        @endforeach
    </ul>

    <a href="https://myprojects.geoapify.com/projects">API Usada</a>
</body>

</html>
