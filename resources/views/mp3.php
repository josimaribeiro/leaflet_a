<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mapa Travado - FAETEC Paracambi</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            height: 100vh;
            width: 100%;
            position: relative;
        }

        /* Ícone central fixo na tela */
        .marker-center {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 32px;
            height: 32px;
            margin-left: -16px;
            margin-top: -32px;
            background-image: url('https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png');
            background-size: contain;
            background-repeat: no-repeat;
            z-index: 1000;
            pointer-events: none;
        }

        .coords {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background: rgba(255,255,255,0.9);
            padding: 6px 10px;
            border-radius: 4px;
            font-family: monospace;
            font-size: 14px;
            z-index: 1001;
        }
    </style>
</head>
<body>

    <div id="map">
        <div class="marker-center"></div>
        <div class="coords" id="coords">Lat: -22.599753, Lng: -43.706397</div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        // Coordenadas da FAETEC Paracambi
        const faetecCoords = [-22.599753, -43.706397];

        // Mapa travado, sem interação
        var map = L.map('map', {
            center: faetecCoords,
            zoom: 17,
            zoomControl: false,
            dragging: false,
            scrollWheelZoom: false,
            doubleClickZoom: false,
            boxZoom: false,
            keyboard: false
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Coordenadas fixas (não mudam)
        document.getElementById('coords').innerText =
            `Lat: ${faetecCoords[0].toFixed(5)}, Lng: ${faetecCoords[1].toFixed(5)}`;
    </script>
</body>
</html>
<!--

-22.599753
-43.706397
    -->
