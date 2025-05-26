<?php



require_once "../controladores/productos.controlador.php";

require_once "../modelos/productos.modelo.php";



require_once "../controladores/categorias.controlador.php";

require_once "../modelos/categorias.modelo.php";



class TablaProductos{



  /*=============================================

  MOSTRAR LA TABLA DE PRODUCTO

  =============================================*/ 



  public function mostrarTabla(){



  	$item = null;

    $valor = null;

    $orden = "id";



  	$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);



  	echo '{

			"data": [';



			for($i = 0; $i < count($productos)-1; $i++){



				$item = "id";

    			$valor = $productos[$i]["id_categoria"];

    			$idcodig=$productos[$i]["codigo"];

    			$codigoinves="<div style='color: black;font-size: 10px'>HERLU '{$idcodig}</div>";



    			$barcode="<a href='https://barcode.tec-it.com/barcode.ashx?data=HERLU {$idcodig}&code=Code128&dpi=75&dataseparator=' target='_blank' download><img src='https://barcode.tec-it.com/barcode.ashx?data=HERLU {$idcodig}&code=Code128&dpi=75&dataseparator='> </a>";



    			$barcodeo="sera";



				$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);



				 echo '[

			      "'.$codigoinves.'",

			      "'.$productos[$i]["imagen"].'",

			      "'.$productos[$i]["fk_dm_productos"].'",

			      "'.$productos[$i]["descripcion"].'",

			      "'.$categorias["categoria"].'",

			      "'.$productos[$i]["stock"].'",

			      "S/ '.number_format($productos[$i]["precio_compra"],2).'",

			      "S/ '.number_format($productos[$i]["precio_venta"],2).'",

			      "'.$productos[$i]["fecha"].'",

			      "'.$productos[$i]["id"].'"

			    ],';



			}



			$item = "id";

			$valor = $productos[count($productos)-1]["id_categoria"];



			$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);



			$codigitow=$idcodig-1;



			$barcode="<a href='https://barcode.tec-it.com/barcode.ashx?data=HERLU {$codigitow}&code=Code128&dpi=75&dataseparator=' target='_blank' download><img src='https://barcode.tec-it.com/barcode.ashx?data=HERLU {$codigitow}&code=Code128&dpi=75&dataseparator='> </a>";



		   echo'[

			      "'.$codigoinves.'",

			      "'.$productos[count($productos)-1]["imagen"].'",

			      "'.$productos[$i]["fk_dm_productos"].'",

			      "'.$productos[count($productos)-1]["descripcion"].'",

			      "'.$categorias["categoria"].'",

			      "'.$productos[count($productos)-1]["stock"].'",

			      "S/ '.number_format($productos[count($productos)-1]["precio_compra"],2).'",

			      "S/ '.number_format($productos[count($productos)-1]["precio_venta"],2).'",

			      "'.$productos[count($productos)-1]["fecha"].'",

			      "'.$productos[count($productos)-1]["id"].'"

			    ]

			]

		}';





  }





}



/*=============================================

ACTIVAR TABLA DE PRODUCTOS

=============================================*/ 

$activar = new TablaProductos();

$activar -> mostrarTabla();











