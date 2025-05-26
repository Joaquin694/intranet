<style>
    /* Estilos generales */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f0f4f8;
        /* Fondo general pastel claro */
        color: #333;
        /* Texto color gris oscuro para mejor legibilidad */
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        /* Incluir padding y border en el tamaño total del elemento */
    }

    /* Estilos para el contenedor principal */
    .content-wrapper {
        padding: 20px;
        background-color: #e7ebf0;
        /* Fondo pastel azul claro */
        border-radius: 8px;
        overflow: hidden;
        /* Evitar desbordamientos */
    }

    /* Estilos de la caja principal */
    .box {
        background-color: #ffffff;
        /* Fondo blanco para contraste */
        border: 1px solid #d1d9e0;
        /* Borde suave */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        /* Sombra ligera */
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        overflow: hidden;
        /* Evitar desbordamientos internos */
    }

    /* Títulos y subtítulos */
    .box-title,
    h4 {
        color: #2c3e50;
        /* Azul oscuro serio */
        font-weight: bold;
        margin-bottom: 15px;
    }

    /* Estilos para los inputs y select */
    .form-control {
        border: 1px solid #cfd8e3;
        /* Borde suave */
        border-radius: 4px;
        padding: 10px;
        background-color: #f8fafc;
        /* Fondo muy claro */
        color: #2c3e50;
        /* Texto en azul oscuro */
        width: 100%;
        /* Asegurar que los inputs ocupen todo el ancho disponible */
        box-sizing: border-box;
        /* Incluir padding y border en el tamaño total del elemento */
        margin-bottom: 15px;
    }

    /* Estilos para los radio buttons y checkboxes */
    input[type="radio"],
    input[type="checkbox"] {
        margin-right: 10px;
    }

    /* Estilos de los botones */
    .btn-primary {
        background-color: #5a6e8c;
        /* Azul pastel más oscuro para los botones */
        border-color: #4f5e77;
        /* Borde ligeramente más oscuro */
        color: #ffffff;
        /* Texto blanco para contraste */
        padding: 10px 20px;
        border-radius: 4px;
        transition: background-color 0.3s ease;
        display: inline-block;
        /* Asegurar que los botones se comporten correctamente */
    }

    .btn-primary:hover {
        background-color: #4f5e77;
        /* Oscurecer el color del botón al pasar el cursor */
    }

    /* Estilos para listas */
    .list-group-item {
        background-color: #f8fafc;
        /* Fondo pastel claro */
        border: 1px solid #cfd8e3;
        /* Borde de lista suave */
        color: #333;
        /* Texto gris oscuro */
        margin-bottom: 5px;
        /* Espacio entre los elementos de la lista */
    }

    /* Estilos para las áreas de input y select en los formularios */
    .select-area,
    .input-block {
        background-color: #ecf3fa;
        /* Azul pastel suave */
        padding: 15px;
        border-radius: 4px;
        border: 1px solid #cfd8e3;
        /* Borde suave */
        margin-top: 10px;
        width: 100%;
        /* Asegurar que ocupen todo el ancho disponible */
        overflow: hidden;
        /* Evitar desbordamientos */
    }

    /* Para ocultar elementos inicialmente */
    .select-area,
    .input-block {
        display: none;
    }

    /* Encabezado del formulario */
    .box-header {
        background-color: #e3eaf5;
        /* Fondo de encabezado pastel */
        border-bottom: 1px solid #d1d9e0;
        /* Borde inferior suave */
        padding: 10px 15px;
        border-radius: 8px 8px 0 0;
        margin-bottom: 15px;
    }

    /* Botones de subir archivos */
    input[type="file"] {
        background-color: #ffffff;
        /* Fondo blanco */
        border: 1px solid #d1d9e0;
        /* Borde suave */
        padding: 8px;
        border-radius: 4px;
        width: 100%;
        /* Asegurar que los inputs de archivo ocupen todo el ancho disponible */
        margin-top: 10px;
    }

    /* Ajustes de medios para responsividad */
    @media (max-width: 768px) {
        .row {
            flex-direction: column;
            /* En pantallas más pequeñas, las columnas se apilan verticalmente */
        }
    }



    .inputi {
        height: 40px !important;
    }

    .labeli {
        background: #243659;
        color: white;
        padding: 3px 10px;
        border-radius: 20px;
    }

    .bgbgbgb {
        background: #fffce5 !important;
        border: 1px solid #fffce5 !important;
        border-radius: 20px;
        margin-top: 16px !important
    }

    #asistente {
        display: flex;
        /* Utilizar Flexbox para alinear elementos */
        justify-content: flex-end;
        /* Alinear todos los elementos al final (derecha) */
        align-items: center;
        /* Alinear verticalmente en el centro */
    }
</style>


<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Gestión de Actividades</h3>
                    </div>
                    <form role="form" method="post" enctype="multipart/form-data" id="form-cola">
                        <div class="box-body">
                            <div class="box">
                                <!-- Sección 1: Lista de personas a atender -->
                                <div class="col-lg-12 col-xs-12">
                                    <h4>Lista de Personas a Atender*</h4>
                                    <ul id="listaClientes" class="list-group">
                                        <!-- Aquí se cargarán las personas en la cola, ordenadas por orden de llegada -->
                                    </ul>
                                </div>


                                <div id="asistente" class="col-lg-12 col-xs-12">
                                    <!-- Input DNI del Cliente -->
                                    <div class="col-lg-1 col-xs-12">
                                        <div class="form-group">
                                            <label for="dniCliente">Id Asistente</label>
                                            <input type="text" class="form-control" id="dniAsistente" name="dniAsistente" value='<?php echo $_SESSION["id"]; ?>'>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-xs-12">
                                    <h4>Datos del usuario atendido - Asistente</h4>
                                </div>

                                <!-- Espacio adicional entre secciones -->
                                <div class="col-lg-12 col-xs-12">
                                    <hr>
                                </div>
                                <!-- Radio Buttons para selección de categoría -->
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group">
                                        <div>
                                            <label class="labeli"><input class='rdbtnLop' type="radio" name="categoria" value="cliente" onclick="showInputs('cliente')"> Recepción por colas</label>
                                            <label class="labeli"><input class='rdbtnLop' type="radio" name="categoria" value="docente" onclick="showInputs('docente')"> Docente</label>
                                            <label class="labeli"><input class='rdbtnLop' type="radio" name="categoria" value="externo" onclick="showInputs('externo')"> Externo*</label>
                                            <label class="labeli"><input class='rdbtnLop' type="radio" name="categoria" value="labores" onclick="showInputs('labores')"> Labores administrativas</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bloques de entrada de datos según la selección -->
                                <div id="cliente" class="input-block col-lg-12 col-xs-12">
                                    <h4>Datos del usuario atendido - Recepción por colas</h4>
                                    <!-- Input DNI del Cliente -->
                                    <div class="col-lg-2 col-xs-12">
                                        <div class="form-group">
                                            <label for="dniCliente">DNI del Cliente</label>
                                            <input type="text" class="form-control" id="dniCliente" name="dniCliente" required autocomplete="off">
                                        </div>
                                    </div>

                                    <!-- Input Nombre y Apellido del Cliente -->
                                    <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="nombreCliente">Nombre y Apellido del Cliente</label>
                                            <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" required autocomplete="off">
                                        </div>
                                    </div>

                                    <!-- Input DNI del Alumno Consultado -->
                                    <div class="col-lg-2 col-xs-12">
                                        <div class="form-group">
                                            <label for="dniAlumno">DNI del Alumno Consultado</label>
                                            <input type="text" class="form-control" id="dniAlumno" name="dniAlumno" required autocomplete="off">
                                        </div>
                                    </div>

                                    <!-- Input Nombre y Apellido del Alumno Consultado -->
                                    <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="nombreAlumno">Nombre y Apellido del Alumno Consultado</label>
                                            <input type="text" class="form-control" id="nombreAlumno" name="nombreAlumno" required autocomplete="off">
                                        </div>
                                    </div>


                                    <!-- Input Carrera -->
                                    <div class="col-lg-3 col-xs-12">
                                        <div class="form-group">
                                            <label for="carreraCiclo">Carrera</label>
                                            <input type="text" class="form-control" id="carreraCiclo" name="carreraCiclo" required autocomplete="off">
                                        </div>
                                    </div>

                                    <!-- Input Ciclo -->
                                    <div class="col-lg-1 col-xs-12">
                                        <div class="form-group">
                                            <label for="ciclo">Ciclo</label>
                                            <input type="text" class="form-control" id="ciclo" name="ciclo" required autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div id="docente" class="input-block col-lg-12 col-xs-12">
                                    <h4>Datos del usuario atendido - Docente</h4>
                                    <!-- Input DNI del Cliente -->
                                    <div class="col-lg-2 col-xs-12">
                                        <div class="form-group">
                                            <label for="dniCliente">DNI del Docente</label>
                                            <input type="text" class="form-control" id="dniDocente" name="dniDocente" required autocomplete="off">
                                        </div>
                                    </div>

                                    <!-- Input Nombre y Apellido del Docente -->
                                    <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="nombreDocente">Nombre y Apellido del Docente</label>
                                            <input type="text" class="form-control" id="nombreDocente" name="nombreDocente" required autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div id="externo" class="input-block col-lg-12 col-xs-12">
                                    <h4>Datos del usuario atendido - Externo</h4>
                                    <!-- Input DNI del Externo -->
                                    <div class="col-lg-2 col-xs-12">
                                        <div class="form-group">
                                            <label for="dniExterno">DNI del Externo</label>
                                            <input type="text" class="form-control" id="dniExterno" name="dniExterno" required autocomplete="off">
                                        </div>
                                    </div>

                                    <!-- Input Nombre y Apellido del Externo -->
                                    <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="nombreExterno">Nombre y Apellido del Externo</label>
                                            <input type="text" class="form-control" id="nombreExterno" name="nombreExterno" required autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function showInputs(category) {
                                        // Ocultar todos los bloques de entrada
                                        document.querySelectorAll('.input-block').forEach(block => block.style.display = 'none');

                                        // Mostrar el bloque correspondiente a la selección
                                        document.getElementById(category).style.display = 'block';
                                    }

                                    // Inicialmente ocultar todos los bloques
                                    document.addEventListener('DOMContentLoaded', function() {
                                        document.querySelectorAll('.input-block').forEach(block => block.style.display = 'none');
                                    });
                                </script>


                                <div class="col-lg-12 col-xs-12 bgbgbgb">
                                    <!-- Subtítulo para datos del caso laboral realizado -->
                                    <div class="col-lg-12 col-xs-12">
                                        <hr>
                                        <h4>Registro de actividad </h4>
                                    </div>

                                    <!-- Input Categoría del Motivo Atendido -->
                                    <div class="col-lg-2 col-xs-12">
                                        <div class="form-group">
                                            <label for="categoriaMotivo">Categoría del Motivo Atendido</label>
                                            <select class="form-control inputi" id="categoriaMotivo" name="categoriaMotivo" required>
                                                <option value="Consulta">Consulta</option>
                                                <option value="Reclamo">Reclamo</option>
                                                <option value="Solicitud">Solicitud</option>
                                                <!-- Otras opciones pueden añadirse aquí -->
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Input Motivo en Líneas Generales -->
                                    <div class="col-lg-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="motivoGenerales">Motivo en Líneas Generales</label>
                                            <input type="text" class="form-control" id="motivoGenerales" name="motivoGenerales" required autocomplete="off">
                                        </div>
                                    </div>

                                    <!-- Textarea Comentario de la Atención Prestada -->
                                    <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="comentarioAtencion">Comentario de la Atención Prestada</label>
                                            <textarea class="form-control" id="comentarioAtencion" name="comentarioAtencion" rows="4" required></textarea>
                                        </div>
                                    </div>

                                    <!-- Select con opciones de estado del caso -->
                                    <div class="col-lg-2 col-xs-12">
                                        <div class="form-group">
                                            <label for="estadoCaso">Estado del Caso</label>
                                            <select class="form-control inputi" id="estadoCaso" name="estadoCaso">
                                                <option value="cerrado">Caso cerrado</option>
                                                <option value="pendiente">Caso pendiente</option>
                                                <option value="derivado">Caso derivado</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Selección de área para casos derivados -->
                                    <div class="col-lg-4 col-xs-12 " id="selectArea">
                                        <div class="form-group">
                                            <label for="areaDerivada">Indicar Área a Derivar</label>
                                            <input type="text" class="form-control" id="areaDerivada" name="areaDerivada" placeholder="Indicar área...">
                                        </div>
                                    </div>
                                    <!-- Input para cargar evidencia 1 -->
                                    <div class="col-lg-3 col-xs-12">
                                        <div class="form-group">
                                            <label for="evidencia1">Cargar Evidencia (Imagen o Archivo 1)</label>
                                            <input type="file" class="form-control" id="evidencia1" name="evidencia1" required>
                                        </div>
                                    </div>

                                    <!-- Input para cargar evidencia 2 -->
                                    <div class="col-lg-3 col-xs-12">
                                        <div class="form-group">
                                            <label for="evidencia2">Cargar Evidencia (Imagen o Archivo 2)</label>
                                            <input type="file" class="form-control" id="evidencia2" name="evidencia2">
                                        </div>
                                    </div>

                                    <br<hr><br><br>
                                </div>
                            </div>
                        </div>

                        <!-- Botón de envío en el pie del formulario -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Llamar a cliente</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>








<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Simulación de datos: aquí debería ir la lógica para cargar datos desde el servidor
        const clientes = [{
                dni: '12345678',
                nombre: 'Juan Pérez'
            },
            {
                dni: '87654321',
                nombre: 'Ana García'
            },
            // Más clientes...
        ];

        const listaClientes = document.getElementById('listaClientes');
        listaClientes.innerHTML = clientes.map(cliente => `
                <li class="list-group-item">DNI: ${cliente.dni} - Nombre: ${cliente.nombre}</li>
            `).join('');

        // Manejar la lógica de autocompletar (puede mejorarse con eventos AJAX al seleccionar un cliente)
        listaClientes.addEventListener('click', function(event) {
            showInputs('cliente');
            if (event.target.tagName === 'LI') {
                const clienteSeleccionado = clientes.find(cliente => cliente.dni === event.target.textContent.split(' ')[1]);
                document.getElementById('dniCliente').value = clienteSeleccionado.dni;
                document.getElementById('nombreCliente').value = clienteSeleccionado.nombre;
            }
        });





        // Ocultar inicialmente el campo de área
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('selectArea').style.display = 'none';
        });
    });



    // Obtener el elemento select por su ID
    const estadoCasoSelect = document.getElementById('estadoCaso');

    // Agregar un evento change al elemento select
    estadoCasoSelect.addEventListener('change', function() {
        const selectedValue = estadoCasoSelect.value; // Obtener el valor seleccionado

        // Comprobar el valor seleccionado y ejecutar la lógica correspondiente
        if (selectedValue === 'cerrado') {
            console.log("Caso cerrado seleccionado.");
            // Agregar aquí la lógica para el caso cerrado
            hideAllInputs(); // Ejemplo: ocultar todos los inputs adicionales
        } else if (selectedValue === 'pendiente') {
            console.log("Caso pendiente seleccionado.");
            // Agregar aquí la lógica para el caso pendiente
            hideAllInputs(); // Ejemplo: ocultar todos los inputs adicionales
        } else if (selectedValue === 'derivado') {
            console.log("Caso derivado seleccionado.");
            // Mostrar el input para área derivada
            document.getElementById('selectArea').style.display = 'block';
        }
    });

    // Función para ocultar todos los inputs adicionales
    function hideAllInputs() {
        document.getElementById('selectArea').style.display = 'none';
    }

    // Inicialmente ocultar el campo de área
    // hideAllInputs();

    $(document).on('submit', '#form-cola', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('accion', 'guardar');
        $.ajax({
            url: 'controladores/atendercola.controlador.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(respuesta) {
                if (respuesta == 'ok') {
                    swal({
                        type: "success",
                        title: "ha sido registrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value) {
                            window.location = "atendercola";
                        }
                    })
                } else {
                    alert("Erro al registrar. Por favor, inténtalo de nuevo.");
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en la solicitud AJAX:', status, error);
            }
        });
    })
</script>