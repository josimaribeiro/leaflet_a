<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Coordenadas</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #f5f5f5;
        }
    </style>
</head>

<body>
    <h1>Coordenadas Cadastradas</h1>

    @if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('coordenadas.create') }}">Cadastrar nova coordenada</a>
    <br>
        <a href="{{ route('mapa.interativo') }}">Ver todos os pontos no mapa interativo</a>
    <br>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Miniatura</th>
                <th>Nome</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($coordenadas as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>



                    <img src="https://api.geoapify.com/v1/staticmap?style=osm-liberty&width=200&height=150&center=lonlat:{{ $c->longitude }},{{ $c->latitude }}&zoom=14&apiKey={{ env('GEOAPIFY_API_KEY') }}"


                        class="mapa-miniatura">
                </td>

                <td>{{ $c->nome }}</td>
                <td>{{ $c->latitude }}</td>
                <td>{{ $c->longitude }}</td>
                <td>
                    <a href="{{ route('coordenadas.show', $c->id) }}" target="_blank">Ver no mapa interno</a> |
                    <a href="https://www.google.com/maps?q={{ $c->latitude }},{{ $c->longitude }}" target="_blank">
                        Google Maps
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Nenhuma coordenada cadastrada.</td>
            </tr>
            @endforelse
        </tbody>
    </table>



</body>

</html>



<!--


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



            {{ $c->nome }} ({{ $c->latitude }}, {{ $c->longitude }})
            {{-- Link "Ver no mapa" para a página de detalhes --}}
            <a href="{{ route('coordenadas.show', $c->id) }}">Ver no mapa interno</a>

            <a href="https://www.google.com/maps?q={{ $c->latitude }},{{ $c->longitude }}" target="_blank">
                Abrir no Google Maps
            </a>



        </li>
        @endforeach
    </ul>

    <a href="https://myprojects.geoapify.com/projects">API Usada</a>
</body>

</html>


-->
