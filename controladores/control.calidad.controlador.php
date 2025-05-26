<?php 
session_start();
require_once "../ApiAbad/api_abad.php";
if (isset($_SESSION["recaptcha_secretkey"])) 
{  			
	switch ($_POST['cod']) { 
		/*====================================================================*/
		case 'cliente_seleccionado': /*STEP ONE SELECCIONAMOS A QUIEN ATENDER     1nombrecliente*/ 
				$nomCliente =$_POST["nomCliente"];
				$idCliente  =$_POST['idCliente'];
				?>
				<script type="text/javascript">
						$("#modalFichaCONCAL").modal("hide");
						// Render datos paciente and id en atributo idpciente
					 	$('#fcc_nomcliente').val('<?php echo  $_POST["nomCliente"];?>');
					 	$('#fcc_lugprocedencia').val('<?php echo  $_POST["direccion"];?>');
						
				</script>
				<?php
		break;
		/*====================================================================*/
		case '2': /*STEP ONE SELECCIONAMOS A QUIEN ATENDER*/ 
				echo "2";
		break;
		/*====================================================================*/
		default:
			# code...
		   	echo "Acceso denegado <!>";;
		break;
	}
}
else
{
	include '../vistas/modulos/404.php';
}
 ?>


