<style>
    /* Elimina el fondo, bordes y sombras predeterminados del navegador */
input {
    background: none !important; /* Elimina cualquier fondo por defecto */
    border: none !important; /* Elimina todos los bordes predeterminados */
    border-bottom: 2px solid black !important; /* Mantén solo el borde inferior */
    box-shadow: none !important; /* Elimina sombras predeterminadas */
    border-radius: 0px !important; /* Elimina el redondeo del borde */
}

/* Asegúrate de que en el foco solo se aplique el borde inferior */
input:focus {
    outline: none !important; /* Quita el borde de enfoque predeterminado */
    border-bottom-color: #fe9e23 !important; /* Color del borde inferior cuando está en foco */
}

input:-internal-autofill-selected {
    appearance: menulist-button;
    background-image: none !important;
    background-color: transparent !important;
    color: fieldtext !important;
}
</style>

<?php
// Obtener la URL completa
$url = $_SERVER['REQUEST_URI'];

   $imagina="background_sistema_information__l.png";
   $bgprimary="#251029";
   $logo="HERMOLU2.PNG";
?>

<style>
    label {
    COLOR: #fe9e23 !important;
}
    .form-control:focus {
    border-color: #fe9e23 !important;
    box-shadow: none !important;
}
.form-control:focus {
    border-color: #fde9a1 !important;
    outline: 0 !important;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgb(254 158 35) !important;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgb(254 158 35) !important;
}
 .container-fluid, #div-b {
        background: #251029;             
    }
    .formu {
        background: white !important;
        padding: 10px 20px;
        max-width: 400px !important;
        margin: auto; /* Centra el formulario en dispositivos móviles */
        /* border: 1px solid #74047a; */
        border-radius: 5px;
        color: #e2f3ff;
    }

.input-container {
    position: relative;
}

#toggle-password {
    position: absolute;
    right: 30px; /* o la distancia que prefieras */
    top: 8px;  /* ajusta esta propiedad para centrarlo verticalmente */
    border: none;
    background: none;
    cursor: pointer;
    
}

h3#initxt {
    text-align: center;
    background: #edf3ff;
    padding: 7px;
    border-radius: 50px;
    color: #15626e;
    margin: 10px 18px 2px 18px;
}

#txtUse , #txtPass {
    border: 1px transparent !important;
    border-radius: 0px !important;
    background: white !important;
    border-bottom: 2px solid black !important;
}

  /* Capa de fondo con transparencia y blur */
  #blur-layer {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgb(254 158 35 / 21%);
    backdrop-filter: blur(1px);
    z-index: 1; /* Coloca la capa detrás del formulario */
  }

  /* Ajusta la posición del formulario por encima del blur */
  .login-box {
    position: relative;
    z-index: 2;
  }

  /* Elimina el fondo predeterminado */
input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0px 1000px white inset !important;
    box-shadow: 0 0 0px 1000px white inset !important;
}


/* Elimina el borde predeterminado en todos los estados */
input {
    background: none !important; /* Elimina cualquier fondo predeterminado */
    border: none !important; /* Elimina todos los bordes por defecto */
    border-bottom: 2px solid black !important; /* Solo deja el borde inferior */
    border-radius: 0 !important; /* Elimina cualquier redondeado */
    box-shadow: none !important; /* Elimina cualquier sombra de foco */
}

/* Elimina el borde que aparece al hacer foco */
input:focus {
    outline: none !important; /* Quita el borde de foco */
    border-bottom-color: #fe9e23 !important; /* Cambia el color del borde inferior solo cuando se selecciona */
    background: none !important; /* Evita que aparezca fondo de color */
}

</style>

<!-- Aquí va tu código PHP para iniciar la sesión -->
<?php
$_SESSION["saludoDeInicio"] = 1;
?>

<script type="text/javascript">
    $(document).ready(function() {
        var altura = $(window).height();
        var alturado = altura + 150;
        $('#back').css("height", alturado + "px");
        $('#txtUse').focus();
    });

    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('txtPass');
        var toggleButton = document.getElementById('toggle-password');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleButton.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>'; // Cambio para usar Font Awesome
        } else {
            passwordInput.type = 'password';
            toggleButton.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>'; // Cambio para usar Font Awesome
        }
    }
</script>
<div id="blur-layer"></div> <!-- Capa de blur -->

<div class="container-fluid d-flex align-items-center justify-content-center" style="height: 100vh; padding: 0;display: flex; justify-content: center; align-items: center; position: relative; overflow: hidden; background: url('vistas/img/<?php echo $imagina; ?>') right center / cover no-repeat;">
    <!-- Contenedor principal -->
    <div class="login-box">
        <!-- Caja de inicio de sesión centrada -->
        <div class="formu">
            <!-- Formulario de inicio de sesión -->  
               
            <!-- <h3 style="font-weight: 700; font-size: 24pt; position: relative; z-index: 99999999999;" id="initxt">
                <img src="vistas/img/plantilla/icono-blanco.png" alt="HL" style="width: 40px;">
                Hermoza Luz</h3>

                 -->
                 <center>
                 <img src="vistas/img/<?php echo $logo; ?>" alt="HL" style="width: 60% !important;margin-bottom: 10px;margin-top: 16px">
                 </center>
                
            <form method="post" autocomplete="off">
                <div class="form-group has-feedback">
                    <input id="txtUse" type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required autocomplete="off" style="height: 45px !important; border-radius: 5px; font-size: 12.5pt !important">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback input-container">
                    <input id="txtPass" type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required autocomplete="off" style="height: 45px !important; border-radius: 5px; font-size: 12.5pt !important">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <button id="toggle-password" type="button" onclick="togglePasswordVisibility()"> <i class="fa fa-eye" aria-hidden="true"></i> </button>
                </div>
                <hr>
                <div class="form-group">
                    <label for="databaseOption">Selecciona la base de datos:</label>
                    <select id="databaseOption" name="databaseOption" class="form-control" required>
                        <option value="" disabled selected>Seleccione una base de datos</option> <!-- Opción inicial vacía -->
                        <option value="oficial">OFICIAL</option>
                        <option value="pruebas">PRUEBAS</option>
                    </select>
                </div>


                <div class="text-center" style="text-align: center !important;">
                    <!-- Botón de ingresar centrado -->
                    <button class="btn btn-primary btn-block btn-flat" type="submit">Ingresar</button><br>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Aquí va tu código PHP para el ingreso de usuario -->
<?php
$login = new ControladorUsuarios();
$login->ctrIngresoUsuario();
?>
<script>
    document.querySelector('form').addEventListener('submit', function(e) {
        var select = document.getElementById('databaseOption');
        
        if (select.value === "") {
            alert('Por favor, seleccione una base de datos.');
            e.preventDefault(); // Evita que se envíe el formulario si no se ha seleccionado una opción
        }
    });



    document.getElementById('txtUse').addEventListener('focus', function() {
        this.removeAttribute('readonly');
    });

    document.getElementById('txtPass').addEventListener('focus', function() {
        this.removeAttribute('readonly');
    });

</script>