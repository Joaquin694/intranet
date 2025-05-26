<?php



class ControladorPlantilla{



	static public function ctrPlantilla(){



		include "vistas/plantilla.php";



	}	

	// Aquí añades tu función
	function guardarDatosEnArchivo($contenido, $nombreArchivo = "archivo.txt") {
		// Ruta y nombre del archivo donde se guardará el contenido
		$archivo = $nombreArchivo;

		// Guardar el contenido en el archivo
		$resultado = file_put_contents($archivo, $contenido);

		// Verificar si se guardó correctamente
		if ($resultado === false) {
			return "Error al guardar los datos en el archivo.";
		} else {
			return "Datos guardados exitosamente en '{$archivo}'.";
		}
	}




}