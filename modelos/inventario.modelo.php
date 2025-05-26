<?php
require_once "conexion.php";

class ModeloLogistica
{
    /*=============================================
    RENDER COMPROBANTE PDF
    =============================================*/
    public function rportExistenciasAlmacen()
    {
        $stmt = Conexion::conectar()->query("SELECT * FROM `vista_para_cuadrar_inventario` WHERE stock>'0'");

        // Verificando si la consulta fue exitosa y si $stmt es iterable
        if ($stmt === false || !(is_array($stmt) || $stmt instanceof Traversable)) {
            // En caso de error o si $stmt no es iterable, retornar un array vacío o manejar el error como prefieras
            return [];
        }

        $list = array();
        foreach ($stmt as $row) {
            $retorn = array(
                $row["serie"],
                $row['idproducto'],
                $row['codigo'],
                $row['descripcion'],
                $row['stock'],
                $row['precio_compra'],
                $row['precio_venta'],
                $row['fecha_ingreso'],
                $row['idDm'],
                $row['nombre_producto'],
                $row['descripccion'],
                $row['fecha_registro_dm'],
                $row['bar_code']
            );
            array_push($list, $retorn);
        }
        return $list;
    }
}