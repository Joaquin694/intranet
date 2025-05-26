<?php



require_once "conexion.php";



class ModeloProveedores{



	/*=============================================

	CREAR PROVEEDOR

	=============================================*/



	static public function mdlIngresarProveedor($tabla, $datos){



		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, documento, email, telefono, direccion, fecha_nacimiento) VALUES (:nombre, :documento, :email, :telefono, :direccion, :fecha_nacimiento)");



		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);

		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_INT);

		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);

		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);

		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);

		$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);



		if($stmt->execute()){



			return "ok";



		}else{



			return "error";

		

		}



		$stmt->close();

		$stmt = null;



	}



	/*=============================================

	MOSTRAR PROVEEDORES

	=============================================*/



	static public function mdlMostrarProveedores($tabla, $item, $valor){



		if($item != null){



			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla AS A 

					INNER JOIN personas AS B ON A.fk_persona=B.id

					INNER JOIN tipos_documentos AS C ON B.fk_tipo_documento=C.id  

					WHERE $item = :$item");



			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);



			$stmt -> execute();



			return $stmt -> fetch();



		}else{



			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla AS A 

					INNER JOIN personas AS B ON A.fk_persona=B.id

					INNER JOIN tipos_documentos AS C ON B.fk_tipo_documento=C.id");



			$stmt -> execute();



			return $stmt -> fetchAll();



		}



		$stmt -> close();



		$stmt = null;



	}



	/*=============================================

	EDITAR PROVEEDOR

	=============================================*/



	static public function mdlEditarProveedor($tabla, $datos){



		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  

			razon_social = :razon_social,ruc = :ruc,direccion_prov = :direccion_prov 

			WHERE proveedor_pk = :id");



			$stmt->bindParam(":id", $datos["proveedor_pk"], PDO::PARAM_INT);	

			$stmt->bindParam(":razon_social", $datos["razon_social"], PDO::PARAM_STR);

			$stmt->bindParam(":ruc", $datos["ruc"], PDO::PARAM_STR);

			$stmt->bindParam(":direccion_prov", $datos["direccion_prov"], PDO::PARAM_STR);



		$stmto = Conexion::conectar()->prepare("UPDATE personas SET nombres	 = :nombres	,

		fk_tipo_documento = :fk_tipo_documento,num_documento = :num_documento ,

		direccion = :direccion_prov , telefono = :telefono,email = :email WHERE id = :id");		

			



		if($stmt->execute()){





			return "ok";



		}else{



			return "error";

		

		}



		$stmt->close();

		$stmt = null;

		



	}



	/*=============================================

	ELIMINAR PROVEEDOR

	=============================================*/



	static public function mdlEliminarProveedor($tabla, $datos){



		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE proveedor_pk = :id");



		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);



		if($stmt -> execute()){



			return "ok";

		

		}else{



			return "error";	



		}



		$stmt -> close();



		$stmt = null;



	}



	/*=============================================

	ACTUALIZAR PROVEEDOR

	=============================================*/



	static public function mdlActualizarProveedor($tabla, $item1, $valor1, $valor){



		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");



		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);

		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);



		if($stmt -> execute()){



			return "ok";

		

		}else{



			return "error";	



		}



		$stmt -> close();



		$stmt = null;



	}



}