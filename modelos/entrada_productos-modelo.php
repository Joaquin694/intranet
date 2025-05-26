<?php 
require_once "../modelos/config.php";
 $a= $_POST['a'];
 $b= $_POST['b'];
 $c= $_POST['c'];
 $d= $_POST['d'];
 $e= $_POST['e'];
 $f= $_POST['f'];
 $g= $_POST['g'];
 $h= $_POST['h'];

// CONSULTAMOS SI YA HAY REGISTRO INICIADO . PARA DEFINIR SI ES INGRESO O EDICION
 $query = "SELECT COUNT(*) FROM `entrada_productos` WHERE fk_producto='$a'";$result = $conexion->query($query);
 $rowt=mysqli_fetch_row($result);$count_reg=$rowt[0];


                   if ($count_reg==='0') {     /*INGRESO NUEVO*/
                   	# code...
                   	
                   	mysqli_query($conexion,"INSERT INTO `entrada_productos` (`id`, `fk_producto`, `fk_proveedor`, `fk_almacen`, `nombre_lote`, `fecha_vencimiento`, `tipo_pago`, `tipo_comprobante`, `numero_comprobante`) VALUES (NULL, '$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h')");
                   	echo '<div class="alert alert-success" role="alert">
			  				<strong> Datos ingresados </strong> correctamente!
			  			  </div>';
                   }elseif($count_reg==='1'){  /*INGRESO EDITADO*/
                   	# code...
            	     mysqli_query($conexion, "UPDATE entrada_productos SET
							 				fk_proveedor='$b',
							 				 fk_almacen ='$c',
							 				  nombre_lote='$d',
							 				 fecha_vencimiento ='$e',
							 				  tipo_pago ='$f',
							 				  tipo_comprobante='$g',
							 				  numero_comprobante='$h'
							 WHERE (fk_producto='$a') ");
				
					echo '<div class="alert alert-success" role="alert">
			  				<strong> Datos editados </strong> correctamente!
			  			  </div>';

                   }






 ?>
