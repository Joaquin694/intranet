<!-- driver.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de Sesión del Conductor</title>
</head>
<body>
  <form id="driverForm">
    <label for="truckId">ID del Camión:</label>
    <input type="text" id="truckId" name="truckId" required>

    <label for="plate">Placa:</label>
    <input type="text" id="plate" name="plate" required>

    <label for="driver">Conductor:</label>
    <input type="text" id="driver" name="driver" required>

    <button type="submit">Iniciar Sesión</button>
  </form>

  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script src="#">// your_script_to_handle_form_and_websocket.js
document.getElementById('driverForm').addEventListener('submit', function(e) {
  e.preventDefault();

  // Obtener los valores del formulario
  const truckId = document.getElementById('truckId').value;
  const plate = document.getElementById('plate').value;
  const driver = document.getElementById('driver').value;

  // Inicializar WebSocket
  const ws = new WebSocket('ws://localhost:8080');

  ws.onopen = function() {
    // Enviar los datos del conductor al servidor
    ws.send(JSON.stringify({ truckId, plate, driver }));

    // Solicitar ubicación GPS
    if (navigator.geolocation) {
      navigator.geolocation.watchPosition(function(position) {
        // Enviar ubicación actualizada al servidor
        ws.send(JSON.stringify({
          id: truckId,
          lat: position.coords.latitude,
          lng: position.coords.longitude,
          plate: plate,
          driver: driver
        }));
      }, function(err) {
        console.warn(`ERROR(${err.code}): ${err.message}`);
      }, {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
      });
    } else {
      alert("La geolocalización no es soportada por este navegador.");
    }
  };

  // Manejar el cierre del WebSocket si es necesario
  ws.onclose = function() {
    // Implementar lógica de reconexión o cierre de sesión aquí
  };
});
</script>
</body>
</html>
