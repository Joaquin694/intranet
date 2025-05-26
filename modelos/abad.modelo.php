<?php 
require_once "config.php";
 
$accion=$_POST['accion'];
switch ($accion) {
	/*-----------------------------------------------------------------------------*/
    case "Newad":

	/*-----------------------------------------------------------------------------*/
    case "ratide":  /*INCLUDE Variedad/Altitud: si no hay*/
    			/*collect variables---*/
    			$columnaValidar=$_POST['columnaValidar'];
				$idDelDatoaValidar=$_POST['idDelDatoaValidar'];
				$label=$_POST['label'];
				$accion=$_POST['accion'];
				$idPadre=$_POST['idPadre'];
				/*Evalue if Variedad/Altitud exist---*/
				mysqli_query($conexion,"UPDATE `clientes` SET `variedad_altitud` = '$idDelDatoaValidar' WHERE `clientes`.`documento` = '$idPadre'");
				/*Toast value edit---*/
      //   		echo "<div  class='toastAbad toastMain'>
						// ".$label."
			   // 			<span style='color: orange'><i class='fa fa-angle-double-left' aria-hidden='true'></i> Editado ".$idPadre."</span>
					 //  </div>
					 //  <script type='text/javascript'>
					 //     $(document).ready(function(){view_toast('.toastMain');});
					 //   </script>";

        		break;
    /*-----------------------------------------------------------------------------*/
    case "Deletad":
        		echo "----   -- ^ --   ----";
        		break;
    /*-----------------------------------------------------------------------------*/
    case "Existad":
	        	echo "<p style='color: red;background: yellow'>Usted ya se encuentra registrado*</p>";
        		break;
    /*-----------------------------------------------------------------------------*/
    case "loadData":
                echo "primero recibe el dato nom table de api_abad.js";
                break;
    /*-----------------------------------------------------------------------------*/
    default:
        		echo "----   -- ^ --   ----";
    /*-----------------------------------------------------------------------------*/
}

?>

