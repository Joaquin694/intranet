<!DOCTYPE html>
<html>
<head>
  <title>Mapa de Camiones - Conductor</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script src="/socket.io/socket.io.js"></script>
</head>
<body>
  <div id="map" style="height: 90vh;"></div>
  <script>
    const socket = io();
    const map = L.map('map', {
      center: [-12.0464, -77.0428],
      zoom: 6,
      zoomControl: false
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    function enviarUbicacion() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
          const { latitude, longitude } = position.coords;
          socket.emit('actualizarUbicacion', { lat: latitude, lng: longitude });
        });
      }
    }
    
    setInterval(enviarUbicacion, 5000); // Envía la ubicación cada 5 segundos
  </script>
</body>
</html>
