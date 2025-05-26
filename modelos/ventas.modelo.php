<?php
require_once "conexion.php";

class ModeloVentas {

    
    /*=============================================
        LISTA PRODUCTOS MAS VENDIDOS
    =============================================*/
    static public function mdlListaProSerMasVendidos($fecha_ini, $fecha_fin,$pro_o_serv) {
        if($pro_o_serv=='PRODUCTOS'){
            $stmt = Conexion::conectar()->prepare("SELECT 
                                                    A.codigo, 
                                                    A.descripcion,
                                                    SUM(A.cantidad) AS total_cantidad,
                                                    SUM(A.precio_venta_total) AS total_venta
                                                FROM facturacion_comprobante_cuerpo AS A
                                                WHERE LEFT(A.CODIGO, 5) = 'MOALI' AND DATE(A.fecha_creacion) BETWEEN :fecha_ini AND :fecha_fin 
                                                GROUP BY A.codigo, A.descripcion
                                                ORDER BY total_cantidad DESC");
        }elseif ($pro_o_serv=='SERVICIOS') {
            $stmt = Conexion::conectar()->prepare("SELECT 
                                                    A.codigo, 
                                                    A.descripcion,
                                                    SUM(A.cantidad) AS total_cantidad,
                                                    SUM(A.precio_venta_total) AS total_venta
                                                FROM facturacion_comprobante_cuerpo AS A
                                                WHERE LEFT(A.CODIGO, 8) = 'SERVICIO' AND DATE(A.fecha_creacion) BETWEEN :fecha_ini AND :fecha_fin 
                                                GROUP BY A.codigo, A.descripcion
                                                ORDER BY total_cantidad DESC");
        }
        
    
        $stmt->bindParam(':fecha_ini', $fecha_ini, PDO::PARAM_STR);
        $stmt->bindParam(':fecha_fin', $fecha_fin, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $stmt = null; // Esto es correcto para asegurarse de que la conexión está cerrada.
        return $result;
    }
    

    /*=============================================
        total ventas por dia para GRAFIQUITO
    =============================================*/
    static public function mdlTotalVentasGrafico($fecha_ini, $fecha_fin) {
        $tabla='facturacion_comprobante_cuerpo';
        $stmt = Conexion::conectar()->prepare("SELECT DATE(fecha_creacion) AS fecha_venta, SUM(precio_venta_total) AS total_por_dia
                                                FROM facturacion_comprobante_cuerpo AS A
                                                INNER JOIN productos AS B ON A.pk_lote = B.id
                                                WHERE  DATE(A.fecha_creacion) BETWEEN :fecha_ini AND :fecha_fin GROUP BY DATE(fecha_creacion)");

        // $stmt->bindParam(':MOALI'    , 'MOALI'   , PDO::PARAM_STR);
        $stmt->bindParam(':fecha_ini', $fecha_ini, PDO::PARAM_STR);
        $stmt->bindParam(':fecha_fin', $fecha_fin, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }



    /*=============================================
        total compras
    =============================================*/
        static public function mdlMostrarTotalCompras($tabla, $fecha_ini, $fecha_fin) {
            $stmt = Conexion::conectar()->prepare("SELECT COUNT(id_compra) TOTAL_COMP,SUM(total_compra) TOTAL_MONEY_GASTO FROM  $tabla WHERE DATE(fecha_registro) BETWEEN :fecha_ini AND :fecha_fin");

            $stmt->bindParam(':fecha_ini', $fecha_ini, PDO::PARAM_STR);
            $stmt->bindParam(':fecha_fin', $fecha_fin, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
            $stmt = null;
        }

    /*=============================================
        Productos y servicios -> vendidos
    =============================================*/
    static public function mdlMostrarServiProductosVendidos($tabla, $fecha_ini, $fecha_fin) {
        $stmt = Conexion::conectar()->prepare("SELECT 
                                                    SUM(CANTIDAD) AS suma_total_cantidad,
                                                    SUM(CASE WHEN LEFT(CODIGO, 8)  = 'SERVICIO' THEN CANTIDAD ELSE 0 END) AS count_servicio,
                                                    SUM(CASE WHEN LEFT(CODIGO, 8) != 'SERVICIO' THEN CANTIDAD ELSE 0 END) AS count_productos,

                                                    SUM(CASE WHEN LEFT(CODIGO, 8)  = 'SERVICIO' THEN precio_venta_total ELSE 0 END) AS sum_precing_servicio,
                                                    SUM(CASE WHEN LEFT(CODIGO, 8) != 'SERVICIO' THEN precio_venta_total ELSE 0 END) AS sum_precing_productos
                                               FROM $tabla WHERE DATE(fecha_creacion) BETWEEN :fecha_ini AND :fecha_fin");

        $stmt->bindParam(':fecha_ini', $fecha_ini, PDO::PARAM_STR);
        $stmt->bindParam(':fecha_fin', $fecha_fin, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }
    
    /*=============================================
       Categorias vendidas
    =============================================*/
    static public function mdlMostrarCategoriaVendidas($fecha_ini, $fecha_fin) {
        $tabla='facturacion_comprobante_cuerpo';
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(DISTINCT B.id_categoria) AS catcatvendidas
                                                FROM facturacion_comprobante_cuerpo AS A
                                                INNER JOIN productos AS B ON A.pk_lote = B.id
                                                WHERE LEFT(A.CODIGO, 5) = 'MOALI'
                                                AND DATE(A.fecha_creacion) BETWEEN :fecha_ini AND :fecha_fin ");

        // $stmt->bindParam(':MOALI'    , 'MOALI'   , PDO::PARAM_STR);
        $stmt->bindParam(':fecha_ini', $fecha_ini, PDO::PARAM_STR);
        $stmt->bindParam(':fecha_fin', $fecha_fin, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    MOSTRAR VENTAS
    =============================================*/

    static public function mdlMostrarVentas($tabla, $item, $valor) {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id ASC");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");
            $stmt -> execute();
            return $stmt -> fetchAll();
        }
        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
    REGISTRO DE VENTA
    =============================================*/

    static public function mdlIngresarVenta($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, id_cliente, id_vendedor, productos, impuesto, neto, total, metodo_pago) VALUES (:codigo, :id_cliente, :id_vendedor, :productos, :impuesto, :neto, :total, :metodo_pago)");
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
        $stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
        $stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
        $stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
        $stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
        $stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
        $stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    EDITAR VENTA
    =============================================*/

    static public function mdlEditarVenta($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_cliente = :id_cliente, id_vendedor = :id_vendedor, productos = :productos, impuesto = :impuesto, neto = :neto, total= :total, metodo_pago = :metodo_pago WHERE codigo = :codigo");
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
        $stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
        $stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
        $stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
        $stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
        $stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
        $stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    ELIMINAR VENTA
    =============================================*/

    static public function mdlEliminarVenta($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
        if ($stmt -> execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
    RANGO FECHAS
    =============================================*/   

    static public function mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal) {
        if ($fechaInicial == $fechaFinal) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%'");
            $stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal'");
            $stmt -> execute();
            return $stmt -> fetchAll();
        }
        $stmt -> close();
        $stmt = null;   
    }

    /*=============================================
    SUMAR EL TOTAL DE VENTAS
    =============================================*/   

    static public function mdlSumaTotalVentas($tabla,$fecha_ini,$fecha_fin) {
        $stmt = Conexion::conectar()->prepare("SELECT SUM(precio_venta_total) as total,count(DISTINCT fk_comprobante_cabecera) as cantidad FROM $tabla
                                                WHERE DATE(fecha_creacion) BETWEEN :fecha_ini AND :fecha_fin");
        
        $stmt->bindParam(':fecha_ini', $fecha_ini, PDO::PARAM_STR);
        $stmt->bindParam(':fecha_fin', $fecha_fin, PDO::PARAM_STR);

        $stmt -> execute(); 
        return $stmt -> fetch();
        $stmt -> close();
        $stmt = null;
    }

}
?>
