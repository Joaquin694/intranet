<?php

// Verificar si la palabra 'logeo' está presente en la URL


   $imagina="background_sistema_information.png";
   $bgprimarycabe="#f3f3f3";
   $logo="HERMOLU2.PNG"; 
   $imgbn="plantilla/icono-blanco.png";

?>


<style type="text/css">
	.skin-blue-light .main-header .logo {
    background-color: <?php echo $bgprimarycabe; ?>  !important;
}
.skin-blue-light .main-header .navbar {
    background-color: <?php echo $bgprimarycabe; ?>  !important;
}

#btnsalir{
		font-weight: 200 !important;color: #ecf0f5;
	}

	#btnsalir:hover{
		color: red;
	}
	*,p{
		font-weight: 300 !important;
	}
	span.hidden-xs {
    color: #39023b !important;
}
span.hidden-xs {
    font-size: 15px !important;
} 


/* .navbar-custom-menu {
    padding-top: 30px !important;
	padding-bottom: 10px !important;
} */
ol.breadcrumb {
    display: none !important;
}
input#fechaInicio {
    background: transparent !important;
    border: 1px transparent;
    color: #fe9e23 !important;
    font-size: 18px !important;
    width: 140px !important;
}

.skin-blue-light .main-header .navbar{
	background-color: #ecf0f5 !important
}

.skin-blue-light .main-header .logo {
    background-color: #ffffff !important;
}

.skin-blue-light .main-header .navbar .sidebar-toggle {
    color: #fe9e23 !important;
}
</style>
<header class="main-header">

 	

	<!--=====================================

	LOGOTIPO

	======================================-->

	<a href="inicio" class="logo">

		

		<!-- logo mini -->

		<span class="logo-mini">

			

			<img src="vistas/img/<?php echo $imgbn; ?>" class="img-responsive" style="padding:10px;border-radius: 95px">



		</span>



		<!-- logo normal -->



		<span class="logo-lg">

			

			<img src="vistas/img/<?php echo $logo; ?>" class="img-responsive" style="width: 170px !important; " >
		</span>



	</a>



	<!--=====================================

	BARRA DE NAVEGACIÓN

	======================================-->

	<nav class="navbar navbar-static-top" role="navigation">

		

		<!-- Botón de navegación -->



	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        	<span class="sr-only">Toggle navigation</span>
      	</a>
		<!-- perfil de usuario -->
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!-- <li class="dropdown user user-menu" >
					<a href="#" style="padding-bottom: 0px !important" title="Base de datos a la que te has conectado">
						<i class="fa fa-database " aria-hidden="true" >
						<spam style="font-size: 12px;padding: 0px !important;font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;"> 
							DB Prod.
						</spam></i>
					</a>
				</li> -->
				<?php
				// Definir el color y el texto según el valor de la variable de sesión
				if ($_SESSION["db_user"] === "root") {
					$backgroundColor = "#250126"; // Fondo para la base de producción
					$message = '<i class="fa fa-database" aria-hidden="true"></i> BASE OFICIAL';
				} else {
					$backgroundColor = "#8B0000"; // Rojo oscuro para la base de pruebas
					$message = '<i class="fa fa-database" aria-hidden="true"></i> BASE DE PRUEBAS';
				}
				?>

				<li style="background-color: <?php echo $backgroundColor; ?>; border-radius: 20px; padding: 2px 10px; color: white; font-size: 11px !important; text-align: center !important; margin-top: 15px !important;">
					<?php echo $message; ?>
				</li>

				<li class="dropdown user user-menu" style="border-right: 1px solid #ecf0f5;border-left: 1px solid #ecf0f5;">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						

					<?php
						
					if($_SESSION["foto"] != ""){
						echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

					}else{
						echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';
					}
							
					?>	
						<span class="hidden-xs"><?php  echo $_SESSION["nombre"]; ?></span>
					</a>
				</li>
				


				<li class="dropdown user user-menu">
					<a href="salir"  title="Cerrar sesión">
						<i class="fa fa-power-off fa-lg" aria-hidden="true"  id="btnsalir"></i>
					</a>
				</li>
			</ul>
		</div>
	</nav>

	
 </header>


 <script>
	//LIMPIADOR DE INPUT TEXT CON CARACTERES RAROS
document.addEventListener('blur', function(e) {
  // Verificar si el evento se disparó desde un input de tipo texto
  if (e.target.tagName === 'INPUT' && e.target.type === 'text') {
    console.log('CUIDADO, EL TEXTO ESCRITO DEBE CONTENER ÚNICAMENTE LETROS Y/O NÚMEROS');
    var texto = e.target.value.trim();
    texto = texto.replace(/\\/g, "");
    texto = texto.replace(/["']/g, function(match) {
      return '\\' + match;
    });
    e.target.value = texto;
  }
}, true); // El tercer argumento true indica que el evento se captura durante la fase de captura

</script>