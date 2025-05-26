<style>
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
</style>
<div class="form-container">
  <div class="row"><br>
  <h3 id="titulo-historial"><b>Historial de Marcaciones</b></h3>
  <br>
    <form id="filterForm">
      <input type="date" id="fechaInicio" name="fechaInicio" required>
      <input type="date" id="fechaFinal" name="fechaFinal" required>
      <input type="text" id="search" name="search" placeholder="Buscar por nombre o tipo">
      <button type="submit" id='btn_busca_maxrcaciones'>Filtrar</button>
    </form>

    <table class="table table-striped" id="marcacionesTable">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Perfil</th>
          <th>Fecha</th>
          <th>Hora</th>
          <th>Marcación</th>
          <th>Latitud</th>
          <th>Longitud</th>
        </tr>
      </thead>
      <tbody>
        </tbody>
    </table>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterForm = document.getElementById('filterForm');
    const marcacionesTableBody = document.getElementById('marcacionesTable').getElementsByTagName('tbody')[0];

    filterForm.addEventListener('submit', function(e) {
        e.preventDefault();

        // Obtener los valores de los campos del formulario
        const fechaInicio = document.getElementById('fechaInicio').value;
        const fechaFinal = document.getElementById('fechaFinal').value;
        const search = document.getElementById('search').value;

        // Crear un objeto FormData para enviar los datos del formulario
        const formData = new FormData();
        formData.append('fechaInicio', fechaInicio);
        formData.append('fechaFinal', fechaFinal);
        // formData.append('search', search);
        formData.append('accion', 'marcacionadmin');

        // Enviar una solicitud AJAX al servidor
        fetch('controladores/marcacion.controlador.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Limpiar la tabla antes de insertar los nuevos datos
            marcacionesTableBody.innerHTML = '';

            // Insertar los datos en la tabla
            if (data.success && data.data.length > 0) {
                data.data.forEach(marcacion => {
                    const row = marcacionesTableBody.insertRow();

                    const cellNombre = row.insertCell(0);
                    cellNombre.textContent = marcacion.nombre;

                    const cellPerfil = row.insertCell(1);
                    cellPerfil.textContent = marcacion.perfil;

                    const cellFecha = row.insertCell(2);
                    cellFecha.textContent = marcacion.fecha;

                    const cellHora = row.insertCell(3);
                    cellHora.textContent = marcacion.hora;

                    const cellMarcacion = row.insertCell(4);
                    cellMarcacion.textContent = marcacion.marcacion;

                    const cellLatitud = row.insertCell(5);
                    cellLatitud.textContent = marcacion.latitud;

                    const cellLongitud = row.insertCell(6);
                    cellLongitud.textContent = marcacion.longitud;
                });
            } else {
                const row = marcacionesTableBody.insertRow();
                const cell = row.insertCell(0);
                cell.textContent = 'No se encontraron marcaciones para los criterios seleccionados.';
                cell.colSpan = 7;
            }
        })
        .catch(error => console.error('Error:', error));
    });
    
});

document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('search');
                const table = document.getElementById('marcacionesTable');
                const rows = table.getElementsByTagName('tr');

                searchInput.addEventListener('keyup', function() {
                    const searchTerm = searchInput.value.toLowerCase();

                    for (let i = 1; i < rows.length; i++) { // Empezar en 1 para evitar la fila de encabezado
                        const cells = rows[i].getElementsByTagName('td');
                        let match = false;

                        for (let j = 0; j < cells.length; j++) {
                            const cellText = cells[j].textContent.toLowerCase();

                            if (cellText.includes(searchTerm)) {
                                match = true;
                                break;
                            }
                        }

                        rows[i].style.display = match ? '' : 'none';
                    }
                });
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

                // // // Hacer clic automáticamente en el botón
                // document.getElementById('btn_busca_maxrcaciones').click();
</script>
