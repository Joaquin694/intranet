<?php

require_once "../modelos/config.php";

$accion = $_POST['accionar'];
if ($accion === 'editar') {

	# code...

	$idProveedor = $_POST['idProveedor'];

	$idfkpersona = $_POST['fk_persona'];

	$editarrazonsocial = $_POST['editarrazonsocial'];

	$editarruc = $_POST['editarruc'];

	$editarnuevaDireccion = $_POST['editarnuevaDireccion'];



	$ideditarProveedor = $_POST['editarProveedor']; //Nombre pers cotacto

	$editartipodocuident = $_POST['editartipodocuident'];

	$editarnumidentidad = $_POST['editarnumidentidad'];

	$editarnuevoTelefono = $_POST['editarnuevoTelefono'];

	$editarnuevoEmail = $_POST['editarnuevoEmail'];

	$modalPago = $_POST['UpmodalidadPago'];

	$monto = $_POST['Upmonto'];

	$rubro = $_POST['Uprubro'];

	$categoria = $_POST['categoria'];

	$list = validateFileData($_FILES,["Upcv"]);
	$doc1 = $_POST['UpcvDb'];
	if (!empty($list)) {
		if (in_array('Upcv', $list)) { 
			eliminarDoc($_FILE, $doc1);
			$doc1 = guardarDoc($_FILES, ['Upcv']); 
		}
	}

	if(empty($categoria)||$categoria=="proveedor"){
		$monto = 0;
		$modalPago = '';
		$rubro = '';
		eliminarDoc($_FILE, $doc1);
		$doc1 = "";

	}


	/*============================================ EDITAR PROVEEDOR ==============================================*/

	mysqli_query($conexion, "UPDATE proveedores SET fk_persona='$idfkpersona',razon_social='$editarrazonsocial',ruc='$editarruc',
	direccion_prov='$editarnuevaDireccion',cv='$doc1',modalidad_pago='$modalPago',monto='$monto',rubro='$rubro' , categoria='$categoria'
	WHERE (proveedor_pk='$idProveedor') ");



	/*============================================ EDITAR PERSONA ==============================================*/

	mysqli_query($conexion, "UPDATE personas SET 

		nombres='$ideditarProveedor',

		fk_tipo_documento='$editartipodocuident',

		num_documento='$editarnumidentidad',

		direccion	='$editarnuevaDireccion' ,

		telefono='$editarnuevoTelefono' ,

		email='$editarnuevoEmail' 

		 

		WHERE (id='$idfkpersona') ");



	echo '<div class="alert alert-success" role="alert">

  				<strong>Proveedor ' . $ideditarProveedor . ' </strong> editado correctamente!

  			  </div>';
} elseif ($accion === 'guardar') {

	#DAT PERSONA					

	$nombre = $_POST['nombre'];

	$dni = $_POST['nuevaCategoria'];

	$numIdentidad = $_POST['numidentidad'];

	$telefono = $_POST['nuevoTelefono'];

	$email = $_POST['nuevoEmail'];

	$nomProveedor = $_POST['razonsocial'];

	$numIdentidadProveedor = $_POST['ruc'];

	$newDireccion = $_POST['nuevaDireccion'];

	$modalidadPago = $_POST['modalidadPago'];

	$monto = $_POST['monto'];

	$rubro = $_POST['rubro'];

	$categoria = $_POST['categoria'];



	$list = validateFileData($_FILES, ['cv']);
	$cv = '';

	if (!empty($list)) {
		if (in_array('cv', $list)) { // Check if 'cv' is in the array
			$cv = guardarDoc($_FILES, ['cv']); // Execute guardarDoc and overwrite $cv
		}
	}
	if(empty($categoria)||$categoria=="proveedor"){
		$monto = 0;
		$modalidadPago = '';
		$rubro = '';
	}
	# NEW PERSONA

	mysqli_query($conexion, "INSERT INTO `personas` 

			(`id`,

			 `nombres`,

			 `fk_tipo_documento`,

			 `num_documento`,

			 `direccion`,

			 `telefono`,

			 `email`,

			 `fecha`) VALUES 

			 (NULL,

			 '$nombre',

			 '$dni',

			 '$numIdentidad',

			 '$newDireccion',

			 '$telefono',

			 '$email',

			  CURRENT_TIMESTAMP)");

	#CONSULT ULT PERS POR DNI Y TOMAMOS ID PERSONA		

	$query = "SELECT * FROM personas WHERE num_documento='$numIdentidad' ";

	$result = $conexion->query($query);

	# code...

	while ($rowt = mysqli_fetch_row($result)) {

		$idfkpersona = $rowt[0];
	}
	// __________________________________________________________________________		

	#DAT PROVEEDOR	
	$editarrazonsocial = $_POST['razonsocial'];
	$editarruc = $_POST['ruc'];
	$editarnuevaDireccion = $_POST['nuevaDireccion'];


	"INSERT INTO `proveedores` (`proveedor_pk`, `fk_persona`, `razon_social`, `ruc`, `direccion_prov`, `cv`, `modalidad_pago`, `monto`, `rubro`, `categoria`) VALUES 
	(NULL, '$idfkpersona', '$editarrazonsocial', '$editarruc', '$editarnuevaDireccion', '$cv', '$modalidadPago', '$monto', '$rubro', '$categoria')";

	# NEW PROVEEDOR
	mysqli_query($conexion, "INSERT INTO `proveedores` (`proveedor_pk`, `fk_persona`, `razon_social`, `ruc`, `direccion_prov`, `cv`, `modalidad_pago`, `monto`, `rubro`, `categoria`) VALUES 
	(NULL, '$idfkpersona', '$editarrazonsocial', '$editarruc', '$editarnuevaDireccion', '$cv', '$modalidadPago', '$monto', '$rubro', '$categoria')");

	// __________________________________________________________________________

	#ALERT

	echo '<div class="alert alert-success" role="alert">

  				<strong>Proveedor ' . $_POST['nombre'] . ' </strong> registrado correctamente!!

  			  </div>';
} else {

	echo '<div class="alert alert-warning" role="alert">

  				<strong>Acceso </strong> restringido!

  			  </div>';
}



function guardarDoc($request, $fileds)
{
	foreach ($fileds as $key) {
		$ruta = $_SERVER['DOCUMENT_ROOT'] . "/vistas/img/proveedores/";

		$extension = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);

		$aleatorio = date('YmdHis');


		$nombre = $aleatorio . '.' . $extension;

		$nombreDb = "vistas/img/proveedores/" . $nombre;

		$ruta_carga = $ruta . $nombre;

		if (!file_exists($ruta)) {

			mkdir($ruta, 0777);
		}
		if (move_uploaded_file($_FILES[$key]['tmp_name'], $ruta_carga)) {
		}

		return $nombreDb;
	}
}



function validateFileData($resquest, $fileds)
{
	$listNotEmpty = [];
	foreach ($fileds as $key) {
		if (isset($_FILES[$key]) && $_FILES[$key]['error'] === 0) {
			$listNotEmpty[] = $key;
		}
	}

	return $listNotEmpty;
}
function eliminarDoc($requests, $fileds){
	$rutaExterna = $_SERVER['DOCUMENT_ROOT']."/";
	$rutaCompleta = $rutaExterna . $fileds;
	if(file_exists($rutaCompleta)){
	   if(unlink($rutaCompleta)){
		  return true;
	   }else{
		  return false;
	   }
	}else{
	   return false;
	}
	return false;
 }
