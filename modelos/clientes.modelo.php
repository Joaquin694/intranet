<?php



require_once "conexion.php";



class ModeloClientes{
	/*=============================================
	CREAR CLIENTE
	=============================================*/
	static public function mdlIngresarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare(
			"INSERT INTO $tabla(nombre, documento, email, telefono, direccion, fecha_nacimiento,marca,tipo_cliente,sexo)
			VALUES (:nombre, :documento, :email, :telefono, :direccion, :fecha_nacimiento, :marca, :tipo_cliente,:sexo)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_cliente", $datos["tipo_cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);


		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();
		$stmt = null;
	}



	/*=============================================

	MOSTRAR CLIENTES

	=============================================*/



	static public function mdlMostrarClientes($tabla, $item, $valor){



		if($item != null){
					$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
					$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
					$stmt -> execute();
					return $stmt -> fetch();
				}else{
					$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
					$stmt -> execute();
					return $stmt -> fetchAll();
				}
				$stmt -> close();
				$stmt = null;
			}




	/*=============================================

	MOSTRAR TABLA REGISTRO BPM

	=============================================*/
	static public function ctrMostrarRegistroBpmPorAno($tabla, $item, $valor){
					
				if($tabla=='BPM'){
					$stmt = Conexion::conectar()->prepare("SELECT a.*,b.id,b.estado_tributatio FROM bpm  as a 
					LEFT JOIN facturacion_comprobante_cabecera as b on a.pk_bpm=b.idBpm 
					WHERE `estado`= '1'  ORDER BY pk_bpm DESC");	
				}else{

					$stmt = Conexion::conectar()->prepare("SELECT a.*,b.id,b.estado_tributatio FROM bpm  as a 
					LEFT JOIN facturacion_comprobante_cabecera as b on a.pk_bpm=b.idBpm 
					WHERE `estado`= '1' and  RIGHT(fecha_registro_documento_rbpm2,4)='$tabla'  ORDER BY pk_bpm DESC");
				}
			
				$stmt -> execute();
				return $stmt -> fetchAll();
				$stmt -> close();

				$stmt = null;
	}




	static public function mdlMostrarRegistroBpm($tabla, $item, $valor){



		if($item != null){



			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item  ");



			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);



			$stmt -> execute();



			return $stmt -> fetch();



		}else{


		

			$stmt = Conexion::conectar()->prepare("SELECT a.*,b.id,b.estado_tributatio FROM $tabla  as a 
												   LEFT JOIN facturacion_comprobante_cabecera as b on a.pk_bpm=b.idBpm 
												   WHERE `estado`= '1' ORDER BY pk_bpm DESC");



			$stmt -> execute();



			return $stmt -> fetchAll();



		}



		$stmt -> close();



		$stmt = null;



	}



/*=============================================
	MOSTRAR TABLA REGISTRO BPM incompetas
	=============================================*/

	static public function mdlMostrarRegistroBpmIncompletas(){
			$stmt = Conexion::conectar()->prepare("SELECT b.* FROM `bpm` as a RIGHT JOIN productos_anexos__bpm AS b ON a.pk_bpm=b.codBpm WHERE a.pk_bpm is null ORDER BY id desc");
			$stmt -> execute();
			return $stmt -> fetchAll();

			$stmt -> close();
			$stmt = null;

	}



	/*=============================================

	EDITAR CLIENTE

	=============================================*/



	static public function mdlEditarCliente($tabla, $datos){



		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, documento = :documento, email = :email, telefono = :telefono, direccion = :direccion, marca=:marca,tipo_cliente=:tipo_cliente WHERE id = :id");



		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);

		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);

		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);

		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);

		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
	
		$stmt->bindParam(":tipo_cliente", $datos["tipo_cliente"], PDO::PARAM_STR);

		



		if($stmt->execute()){



			return "ok";



		}else{



			return "error";

		

		}



		$stmt->close();

		$stmt = null;



	}



	/*=============================================

	ELIMINAR CLIENTE

	=============================================*/



	static public function mdlEliminarCliente($tabla, $datos){



		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");



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

	ACTUALIZAR CLIENTE

	=============================================*/



	static public function mdlActualizarCliente($tabla, $item1, $valor1, $valor){



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