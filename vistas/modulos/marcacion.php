
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Map Example</title> -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        /* Estilos personalizados para los elementos del formulario */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }

        .form-container {
            max-width: 95%;
            margin: auto;
            background-color: white;
            padding: 10px;
            padding-left: 5%;
            border-radius: 5px;
            /* box-shadow: 0 2px 4px rgba(0,0,0,0.1); */
            height: 90%;
        }

        .form-group, .radio-group {
            display: inline-block;
            width: 16%;
            margin: 2px;
        }

        .form-group label, .radio-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 12px !important;
        }

        .radio-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .radio-group label {
            margin: 5px 10px;
            border: 1px solid #444;
            padding: 10px 20px;
            border-radius: 20px;
            background-color: #444;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .radio-group input[type="radio"] {
            display: none;
        }

        .radio-group input[type="radio"]:checked + label {
            background-color: #0056b3;
            color: white;
        }

        .radio-group label:hover {
            background-color: #0056b3;
        }

        button {
            padding: 10px 20px;
            background-color: #444;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px !important;
        }

        button:hover {
            background-color: #0056b3;
        }

        button {
            padding: 10px 20px;
            border: 2px solid #444; /* Borde azul */
            border-radius: 5px;
            background-color: white; /* Fondo blanco */
            color: #444; /* Texto azul */
            cursor: pointer;
        }

        button:hover {
            background-color: #444; /* Fondo azul al pasar el ratón */
            color: white; /* Texto blanco al pasar el ratón */
        }
        h3 {
    text-align: center;
    color: #444;
    margin-bottom: 40px;
    /* font-size: 36px; */
    border-bottom: 2px solid #444;
    padding-bottom: 10px;
    display: inline-block;
    margin-top: 20px;
}

#titulo-marcacion {
    /* Estilos específicos para el título de marcación, si es necesario */
}

#titulo-historial {
    /* Estilos específicos para el título del historial, si es necesario */
}


    </style>



<!-- ========================================================================================================================================= -->
<div class="form-container">
<h3 id="titulo-marcacion" ><b>Registro de Marcación</b></h3>

<form>
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $_SESSION["nombre"]; ?>" readonly> <!-- Agregado el atributo name -->
    </div>
    <div class="form-group">
        <label for="perfil">Perfil</label>
        <input type="text" id="perfil" name="perfil" value="<?php echo $_SESSION["perfil"]?>" readonly> <!-- Agregado el atributo name -->
    </div>
        
        
    <div class="form-group">
        <label for="fecha">Fecha Actual (Hora Perú)</label>
        <input type="text" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>" readonly> <!-- Agregado el atributo name -->
    </div>
    <div class="form-group">
        <label for="hora">Hora Actual (Hora Perú)</label>
        <input type="text" id="hora" name="hora" value="<?php echo date('H:i:s'); ?>" readonly> <!-- Agregado el atributo name -->
    </div>
    <div class="form-group">
        <input type="text" id="latitud" name="latitud" placeholder="Latitud" readonly title='Latitud'>
    </div>
    <div class="form-group">
        <input type="text" id="longitud" name="longitud" placeholder="Longitud" readonly title='Longitud'>
    </div>

    <div class="radio-group" style="width: 100%;">
        <!-- Los radio buttons ya tienen el atributo name -->
        <input type="radio" name="marcacion" id="ingreso" value="ingreso">
        <label for="ingreso">Ingreso</label>

        <input type="radio" name="marcacion" id="salida" value="salida">
        <label for="salida">Salida</label>

        <input type="radio" name="marcacion" id="inicio_refrigerio" value="inicio_refrigerio">
        <label for="inicio_refrigerio">Inicio de Refrigerio</label>

        <input type="radio" name="marcacion" id="fin_refrigerio" value="fin_refrigerio">
        <label for="fin_refrigerio">Fin de Refrigerio</label>

        <input type="radio" name="marcacion" id="inicio_comision" value="inicio_comision">
        <label for="inicio_comision">Inicio de Comisión</label>

        <input type="radio" name="marcacion" id="fin_comision" value="fin_comision">
        <label for="fin_comision">Fin de Comisión</label>
    </div>

    
    <div id="mapid" style="height: 200px;"></div><br>
    <button type="submit" style="margin-left: 10px;" class="button_form">Marcar</button>
</form>
<div id="ultimaMarcacion">
    Última Marcación: <span id="fechaHora"></span>, Tipo: <span id="tipo"></span><hr>
</div>


    <form id="historialForm">
        <div class="form-group">
            <label for="fechaInicio">Fecha de inicio</label>
            <input type="date" id="fechaInicio" name="fechaInicio" required>
        </div>
        <div class="form-group">
            <label for="fechaFinal">Fecha final</label>
            <input type="date" id="fechaFinal" name="fechaFinal" required>
        </div>
        <button type="submit" id='btn_busca_marcaciones'>Mostrar historial</button>
    </form>

    <table class="table table-striped" id="historialTable">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Perfil</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Marcación</th>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Nombre Usuario</th>
            </tr>
        </thead>
        <tbody>
            <!-- Los resultados se insertarán aquí -->
        </tbody>
    </table>
</div>

<!-- ========================================================================================================================================= -->


<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var map = L.map('mapid').setView([0, 0], 2); // Initialize the map with a default view

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    function onLocationFound(e) {
        var radius = e.accuracy / 2;

        L.marker(e.latlng).addTo(map)
            .bindPopup("Estas dentro " + radius + " metros de este punto").openPopup();

        L.circle(e.latlng, radius).addTo(map);

        document.getElementById('latitud').value = e.latlng.lat;
        document.getElementById('longitud').value = e.latlng.lng;
    }

    function onLocationError(e) {
        alert(e.message);
    }

    map.on('locationfound', onLocationFound);
    map.on('locationerror', onLocationError);

    map.locate({setView: true, maxZoom: 16});
});

 // Verifica si todos los campos están llenos
 function camposLlenos() {
    // Obtén todos los campos de texto del formulario
    const inputs = document.querySelectorAll('input[type="text"]');
    // Obtén todos los botones de opción del formulario
    const radios = document.querySelectorAll('input[type="radio"]');

    // Verifica si todos los campos de texto tienen contenido y tienen el atributo readonly
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value.trim() === '' || !inputs[i].hasAttribute('readonly')) {
            alert('Asegúrate de llenar todos los campos.');
            return false;
        }
    }

    // Verifica si al menos un botón de opción está seleccionado
    let radioSelected = false;
    for (let i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            radioSelected = true;
            break;
        }
    }

    if (!radioSelected) {
        alert('Selecciona el tipo de marcación que estás realizando.');
        return false;
    }

    return true;
}


// ======================== ENVIAMOS FORMULARIO =================================
        // Selecciona el botón y añade un evento click
        document.querySelector('.button_form').addEventListener('click', function(e) {
            e.preventDefault();

            if (!camposLlenos()) {
                alert('Por favor, completa todos los campos.');
                return;
            }

            // Serializa los datos del formulario
            var datos = new URLSearchParams(new FormData(document.querySelector('form'))).toString();
            datos += '&accion=registrarmarcacion'; // Agrega la variable 'accion' a los datos serializados

            // Crea un objeto XMLHttpRequest
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'controladores/marcacion.controlador.php', true);

            // Configura el evento onload
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    alert('Marcación registrada correctamente');
                }
            };

            // Configura el evento onerror
            xhr.onerror = function() {
                console.log(xhr.statusText);
                alert('Hubo un error al enviar el formulario.');
            };

            // Envía la solicitud
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send(datos);


    
        });


    // Función para obtener la última marcación
    function obtenerUltimaMarcacion() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'controladores/marcacion.controlador.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    document.getElementById('fechaHora').innerText = response.data.fecha + ' ' + response.data.hora;
                    document.getElementById('tipo').innerText = response.data.marcacion;
                }
            }
        };

        xhr.send('accion=obtenerUltimaMarcacion');
    }

    // Llama a la función cuando la página se carga
    document.addEventListener("DOMContentLoaded", obtenerUltimaMarcacion);




    document.getElementById('historialForm').addEventListener('submit', function(e) {
            e.preventDefault();

            var fechaInicio = document.getElementById('fechaInicio').value;
            var fechaFinal = document.getElementById('fechaFinal').value;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'controladores/marcacion.controlador.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        var tbody = document.getElementById('historialTable').getElementsByTagName('tbody')[0];
                        tbody.innerHTML = ''; // Limpiar la tabla antes de insertar nuevos datos

                        response.data.forEach(function(marcacion) {
                            var row = tbody.insertRow();
                            row.insertCell().innerText = marcacion.nombre;
                            row.insertCell().innerText = marcacion.perfil;
                            row.insertCell().innerText = marcacion.fecha;
                            row.insertCell().innerText = marcacion.hora;
                            row.insertCell().innerText = marcacion.marcacion;
                            row.insertCell().innerText = marcacion.latitud;
                            row.insertCell().innerText = marcacion.longitud;
                            row.insertCell().innerText = marcacion.nombreUsuario;
                        });
                    } else {
                        alert('No se pudieron obtener las marcaciones.');
                    }
                }
            };

            var datos = 'accion=obtenermarcaciones&fechaInicio=' + fechaInicio + '&fechaFinal=' + fechaFinal;
            xhr.send(datos);
        });



                    // Obtener la fecha actual
                    var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //Enero es 0!
                var yyyy = today.getFullYear();

                today = yyyy + '-' + mm + '-' + dd;

                // Establecer la fecha actual en los campos de entrada
                document.getElementById('fechaInicio').value = today;
                document.getElementById('fechaFinal').value = today;

                // Hacer clic automáticamente en el botón
                document.getElementById('btn_busca_marcaciones').click();
</script>
