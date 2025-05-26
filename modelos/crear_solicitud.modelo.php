<?php
require_once "conexion.php";
class CrearSolicitud
{
    public function default()
    {
        $stmt = Conexion::conectar()->query("SELECT * FROM `vista_para_cuadrar_inventario` WHERE stock>'0'");
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
                $row['bar_code']);
            array_push($list, $retorn);
        }
        return $list;
    }

    public function producto() {
        $query = Conexion::conectar()->query("SELECT * FROM `productos`");
        $data_option="<option></option>";
        foreach ($query as $row) {

            $data_option_dat='<option value="'.$row["id"].' ">'.$row["descripcion"].'</option>';

            $data_option = $data_option.$data_option_dat;
        }
        echo $data_option;

    }

    public function almacenes() {
        $query = Conexion::conectar()->query("SELECT * FROM `almacenes`");
        $data_option="<option></option>";
        foreach ($query as $row) {

            $data_option_dat='<option value="'.$row["id"].' ">'.$row["almacen"].'</option>';

            $data_option = $data_option.$data_option_dat;
        }
        echo $data_option;

    }


}
