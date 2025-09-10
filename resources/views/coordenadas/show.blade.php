<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mapa - {{ $coordenada->nome ?? 'Sem nome' }}</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        #map { height: 500px; width: 100%; }
    </style>
</head>
<body>
    <h1>{{ $coordenada->nome ?? 'Coordenada' }}</h1>
    <p>Lat: {{ $coordenada->latitude ?? '—' }} | Lng: {{ $coordenada->longitude ?? '—' }}</p>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    @php
        // Normaliza possíveis vírgulas decimais e garante números ou null
        $lat = $coordenada->latitude ?? null;
        $lng = $coordenada->longitude ?? null;

        if (is_string($lat)) $lat = str_replace(',', '.', $lat);
        if (is_string($lng)) $lng = str_replace(',', '.', $lng);

        $lat_num = is_numeric($lat) ? (float) $lat : null;
        $lng_num = is_numeric($lng) ? (float) $lng : null;

        $coords = ($lat_num !== null && $lng_num !== null) ? [$lat_num, $lng_num] : null;

        // Nome como JSON (string segura para inserir em JS)
        $nome_json = json_encode($coordenada->nome ?? 'Sem nome');
    @endphp

    @if($coords)
<script>
    const coords = {!! json_encode($coords) !!};
    const nome = {!! $nome_json !!};

    console.log(coords, nome); // debug no console

    if (coords.length === 2) {
        const map = L.map('map').setView(coords, 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        L.marker(coords).addTo(map)
            .bindPopup(nome)
            .openPopup();
    } else {
        document.getElementById('map').innerHTML =
            '<p style="color:red;">Coordenadas inválidas!</p>';
    }
</script>
    @else
        <p style="color:tomato;">Coordenadas inválidas — verifique latitude e longitude no banco.</p>
    @endif

    <br>
    <a href="{{ route('coordenadas.index') }}">Voltar para lista</a>
</body>
</html>
