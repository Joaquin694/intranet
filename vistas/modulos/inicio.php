<!DOCTYPE html>
<html>
<head>
  <title>Mapa de Camiones</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <style>
    body {
      background-color: #121212;
      color: #ffffff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    #map {
      height: 90vh;
      margin-left: 56px !important;
      border-radius: 15px;
    }
    .leaflet-bottom.leaflet-right {
      bottom: 10px;
      right: 10px;
    }
    .leaflet-control-zoom {
      bottom: 10px !important;
      right: 10px !important;
      left: auto !important;
      top: auto !important;
    }
    #iconoInicial {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      transition: opacity 5s;
      z-index: 1001;
    }
    #fondo {
      position: absolute;
      top: 0;
      left: 0;
      width: 110%;
      height: 100%;
      background: rgba(57, 2, 59, 0.87);
      transition: opacity 5s;
      z-index: 1000;
    }
    .leaflet-popup-content-wrapper {
      background: rgba(0, 0, 0, 0.8);
      color: #fe9e23;
      font-size: 1.4em !important;
      border-radius: 10px;
      box-shadow: 0 0 15px rgb(254 158 35);
    }
    .leaflet-popup-content {
      font-size: 1.4em !important;
    }
    .popup-icon {
      color: #fe9e23;
      margin-right: 8px;
    }
    .popup-content {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }


    .floating-btn {
        position: absolute;
        bottom: 45px !important; 
        right: 10px !important;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 50px 50px 0px 0px !important;
        padding: 15px 30px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        z-index: 1000;
        transition: background-color 0.3s, transform 0.3s;
    }

    .floating-btn:hover {
        background-color: #0056b3;
        transform: translateY(-3px);
    }

    .floating-btn i {
        margin-right: 8px;
    }

    .floating-btn {
    background-color: #fe9e23 !important;
   }
   .floating-btn:hover {
    background-color: #fe9e23 !important;
   }
   .leaflet-top.leaflet-left {
    position: fixed;
    top: 80% !important;
    left: 18% !important;
  }
  </style>
</head>
<body>
  <div id="fondo"></div>
  <img id="iconoInicial" src="vistas/img/plantilla/icono-blanco.png" alt="Icono Inicial">
  <div id="map"></div>


  <button class="floating-btn" onclick="openFloatingWindow()">
    <i class="fa fa-map"></i> Explorar Mapa Avanzado
</button>

  <script>
    var map = L.map('map').setView([-12.046374, -77.042793], 12); // Coordenadas de Lima, Perú

    // Añadir capa de mapa satelital de ESRI
    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
      attribution: 'Tiles © Esri — Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
    }).addTo(map);

    // Añadir capa de nombres de calles
    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Reference/World_Boundaries_and_Places/MapServer/tile/{z}/{y}/{x}', {
      attribution: 'Tiles © Esri'
    }).addTo(map);

    var markers = {};
    var selectedMarker = null;

    // Función para convertir la fecha y hora a la zona horaria de Perú (GMT-5)
    function convertToPeruTime(dateString) {
        // Crear un objeto Date a partir de la cadena de fecha y hora
        let date = new Date(dateString);
        
        // Restar 5 horas (5 * 60 * 60 * 1000 milisegundos)
        date.setHours(date.getHours() - 5);
        
        // Formatear la fecha a un string con el formato adecuado (YYYY-MM-DD HH:MM:SS)
        let year = date.getFullYear();
        let month = ('0' + (date.getMonth() + 1)).slice(-2);
        let day = ('0' + date.getDate()).slice(-2);
        let hours = ('0' + date.getHours()).slice(-2);
        let minutes = ('0' + date.getMinutes()).slice(-2);
        let seconds = ('0' + date.getSeconds()).slice(-2);
        
        // Retornar la fecha ajustada en el formato adecuado
        return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
    }

    // Función para obtener la dirección a partir de las coordenadas
    function fetchAddress(lat, lon) {
      return fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lon}&format=json`)
        .then(response => response.json())
        .then(data => data.display_name)
        .catch(error => {
          console.error('Error fetching address:', error);
          return 'Dirección no disponible';
        });
    }

    function fetchAndUpdateMap() {
      console.log('Fetching data at:', new Date().toLocaleTimeString()); // Log the fetch time
      fetch('controladores/gps.controlador.php') // Aquí se llama al archivo PHP
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(data => {
          if (data.error) {
            console.error('Error from server:', data.error);
            return;
          }
          console.log('Data received:', data); // Log the received data
          if (!Array.isArray(data)) {
            console.error('Invalid data format:', data);
            return;
          }
          var camiones = data;

          // Actualizar los marcadores
          camiones.forEach(camion => {
            fetchAddress(camion.lat, camion.lng).then(address => {
              var popupContent = `
                <div class="popup-content"><i class="fa fa-map-marker popup-icon"></i><b>Dirección:</b> ${address}</div>
                <div class="popup-content"><i class="fa fa-map-marker popup-icon"></i><b>Posicion:</b> ${camion.lat},${camion.lng}</div>
                <div class="popup-content"><i class="fa fa-map-marker popup-icon"></i><b>GPS(Placa):</b> ${camion.plate_number}</div>                
                <div class="popup-content"><i class="fa fa-car popup-icon"></i><b>Modelo:</b> ${camion.model || 'N/A'}</div>
                <div class="popup-content"><i class="fa fa-barcode popup-icon"></i><b>IMEI:</b> ${camion.imei}</div>
                <div class="popup-content"><i class="fa fa-arrow-up popup-icon"></i><b>Altitud:</b> ${camion.altitude} m</div>
                <div class="popup-content"><i class="fa fa-compass popup-icon"></i><b>Ángulo:</b> ${camion.angle}</div>
                <div class="popup-content"><i class="fa fa-tachometer popup-icon"></i><b>Velocidad:</b> ${camion.speed} kph</div>
                <div class="popup-content"><i class="fa fa-clock-o popup-icon"></i><b>Hora:</b> ${convertToPeruTime(camion.dt_tracker)}</div>
                <div class="popup-content"><i class="fa fa-road popup-icon"></i><b>Odómetro:</b> ${camion.odometer} km</div>
              `;  

              if (markers[camion.imei]) {
                // Actualizar la posición del marcador existente
                markers[camion.imei].setLatLng([camion.lat, camion.lng]);
                markers[camion.imei].getPopup().setContent(popupContent);
              } else {
                // Crear un nuevo marcador si no existe
                var marker = L.marker([camion.lat, camion.lng]).addTo(map)
                  .bindPopup(popupContent);
                markers[camion.imei] = marker;

                // Manejar el evento de click en el marcador
                marker.on('click', function () {
                  selectedMarker = marker;
                });
              }
            });
          });

          // Reabrir el popup del marcador seleccionado, si existe
          if (selectedMarker) {
            selectedMarker.openPopup();
          }
        })
        .catch(error => console.error('Error fetching data:', error));
    }

    // Petición inicial
    fetchAndUpdateMap();

    // Petición y actualización cada 10 segundos
    setInterval(fetchAndUpdateMap, 10000);

    // Función para desvanecer el ícono inicial y el fondo después de 2 segundos
    setTimeout(() => {
      const iconoInicial = document.getElementById('iconoInicial');
      const fondo = document.getElementById('fondo');
      iconoInicial.style.opacity = '0';
      fondo.style.opacity = '0';
      setTimeout(() => {
        iconoInicial.remove();
        fondo.remove();
      }, 2000); // Cambiado a 2 segundos
    }, 2000); // Cambiado a 2 segundos


    function openFloatingWindow() {
        var width = 950;
        var height = 600;
        var left = (screen.width - width) / 2;
        var top = (screen.height - height) / 2;
        var newWindow = window.open('https://gps.ubicacionglobal.com/', 'Mapa Avanzado', 'width=' + width + ', height=' + height + ', top=' + top + ', left=' + left + ', resizable=yes, scrollbars=yes');
        
        if (window.focus) {
            newWindow.focus();
        }
    }
</script>
</body>
</html>
