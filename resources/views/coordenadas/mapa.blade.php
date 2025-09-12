<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Mapa Interativo</title>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin=""/>
    <style>
        #map {
            height: 600px;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h1>Mapa Interativo com Todos os Pontos</h1>
    <a href="{{ route('coordenadas.index') }}">← Voltar para a lista</a>

    <div id="map"></div>

    <!-- Dados das coordenadas em JSON vindos do controller -->
    <script>
        const coordenadas = {!! $coordenadasJson !!}
    </script>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if (coordenadas.length === 0) {
                alert('Nenhuma coordenada cadastrada.');
                return;
            }

            const map = L.map('map');

// Cria um array com todas as coordenadas
const bounds = L.latLngBounds([]);

coordenadas.forEach(function (coord) {
    const marker = L.marker([coord.latitude, coord.longitude])
        .addTo(map)
        .bindPopup(`<strong>${coord.nome}</strong><br>Lat: ${coord.latitude}<br>Lng: ${coord.longitude}`);

    // Adiciona a coordenada ao bounds
    bounds.extend(marker.getLatLng());
});

// Ajusta o mapa para mostrar todos os marcadores
map.fitBounds(bounds);


            L.tileLayer('https://maps.geoapify.com/v1/tile/osm-liberty/{z}/{x}/{y}.png?apiKey={{ env('GEOAPIFY_API_KEY') }}', {
                maxZoom: 18,
                attribution: '&copy; <a href="https://www.geoapify.com/">Geoapify</a> contributors'
            }).addTo(map);

            coordenadas.forEach(function (coord) {
                L.marker([coord.latitude, coord.longitude])
                    .addTo(map)
                    .bindPopup(`<strong>${coord.nome}</strong><br>Lat: ${coord.latitude}<br>Lng: ${coord.longitude}`);
            });
        });
    </script>
</body>
</html>
