<center>
<?php 

require_once "modelos/config.php";

	$frnCliFich1 = "SELECT * FROM `datos_maestros_productos`   where bar_code is null ";
     				$resultCliFich1 = $conexion->query($frnCliFich1);
     				while ($rowt=mysqli_fetch_row($resultCliFich1))
     				{  		 
              		 $id=$rowt[0];
              		 $barcode="HERLU ".$id."07";
              		 mysqli_query($conexion,"UPDATE datos_maestros_productos SET bar_code= '$barcode' WHERE id= '$id'");
	              					
              		}



include "datos-maestros-de-productos.php";


 ?>

</center>