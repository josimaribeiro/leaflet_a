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

    <!-- Passagem das coordenadas em JSON para o JS -->
    <script>
        const coordenadas = {!! $coordenadasJson !!};
    </script>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if (coordenadas.length === 0) {
                alert('Nenhuma coordenada cadastrada.');
                return;
            }

            // Cria o mapa na div #map
            const map = L.map('map');

            // Adiciona os tiles do Geoapify
            L.tileLayer('https://maps.geoapify.com/v1/tile/osm-liberty/{z}/{x}/{y}.png?apiKey={{ env('GEOAPIFY_API_KEY') }}', {
                maxZoom: 18,
                attribution: '&copy; <a href="https://www.geoapify.com/">Geoapify</a> contributors'
            }).addTo(map);

            // Cria bounds para ajustar o zoom
            const bounds = L.latLngBounds([]);

            // Define o ícone personalizado de árvore
            const treeIcon = L.icon({
                iconUrl: 'https://cdn-icons-png.flaticon.com/128/740/740934.png',
                iconSize: [32, 32],      // largura e altura do ícone em px
                iconAnchor: [16, 32],    // ponto do ícone que ficará na coordenada
                popupAnchor: [0, -32]    // ponto do ícone onde o popup abrirá
            });

            // Para cada coordenada, adiciona um marcador com o ícone e popup
            coordenadas.forEach(function (coord) {
                const marker = L.marker([coord.latitude, coord.longitude], { icon: treeIcon })
                    .addTo(map)
                    .bindPopup(
                        `<strong>${coord.nome}</strong><br>` +
                        `Lat: ${coord.latitude}<br>` +
                        `Lng: ${coord.longitude}`
                    );

                // Expande os limites do mapa para incluir esse marcador
                bounds.extend(marker.getLatLng());
            });

            // Ajusta o zoom e a área para mostrar todos os marcadores
            map.fitBounds(bounds);
        });
    </script>
</body>
</html>
