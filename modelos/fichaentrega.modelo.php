<?php
require_once "conexion.php";

class ModeloFichaBpm
{


    /*=============================================
    --- RENDER COMPROBANTE PDF - TABLA PRODUCTOS
    =============================================*/
    public function viewFichaEntrega($idd)
    {
        //         $stmt = Conexion::conectar()->query("SELECT *,CASE
        //     WHEN SUBSTRING(documento_origen_de_comprobante , 1,2)='MP' THEN

        //     (SELECT TOP 1 CONCAT('<br>(',z.bpm_tipo_molido_pab,')') FROM productos_anexos__bpm as z  WHERE CONCAT(z.nombre_producto,' ',z.capacidad_producto)=B.descripcion AND z.codBpm=A.idBpm AND z.cantidad_producto=B.cantidad)
        //     WHEN SUBSTRING(documento_origen_de_comprobante , 1,2)='vd' THEN ''
        //     ELSE ''
        // END as 'tipo_molido'
        //  FROM `facturacion_comprobante_cabecera` AS A INNER JOIN facturacion_comprobante_cuerpo as B ON A.id=B.fk_comprobante_cabecera WHERE A.id='$pk_comprobante_venta'");
        
        $stmt = Conexion::conectar()->query("SELECT B.capacidad_producto, A.correlativo, A.fecha_creacion, A.fecha_contable, B.cantidad_producto, B.nombre_producto, B.bpm_tipo_molido_pab, B.bpm_tipo_tostado_pab, A.nombre_cliente, A.direccion,A.serie,A.documento_origen_de_comprobante FROM `facturacion_comprobante_cabecera` AS A INNER JOIN productos_anexos__bpm as B ON A.idBpm=B.codBpm WHERE A.id=$idd");

        $listPags["items"] = array();
        foreach ($stmt as $row) {
            $retorn = array(
                "cantidad"                              => $row["cantidad_producto"],
                "nombre"                              => $row["nombre_producto"],
                "Tproceso1"                   => $row["bpm_tipo_molido_pab"],
                "Tproceso2"                     => $row["bpm_tipo_tostado_pab"],
                "cliente"                   => $row["nombre_cliente"],
                "direccion"                     => $row["direccion"],
                 "documento_origen_de_comprobante"                     => $row["documento_origen_de_comprobante"],
                "serie"                     => $row["serie"],
                "correlativo"                     => $row["correlativo"],
                "fcreacion"                     => $row["fecha_creacion"],
                "fcontable"                     => $row["fecha_contable"],
                "pcapacidadp"                     => $row["capacidad_producto"],
            );
            array_push($listPags["items"], $retorn);
        }

        return json_encode($listPags["items"]);
    }


    /*=============================================
    --- RENDER COMPROBANTE PDF- TABLA SERVICIOS
    =============================================*/
    public function viewFichaEntregaService($idd)
    {
        //         $stmt = Conexion::conectar()->query("SELECT *,CASE
        //     WHEN SUBSTRING(documento_origen_de_comprobante , 1,2)='MP' THEN

        //     (SELECT TOP 1 CONCAT('<br>(',z.bpm_tipo_molido_pab,')') FROM productos_anexos__bpm as z  WHERE CONCAT(z.nombre_producto,' ',z.capacidad_producto)=B.descripcion AND z.codBpm=A.idBpm AND z.cantidad_producto=B.cantidad)
        //     WHEN SUBSTRING(documento_origen_de_comprobante , 1,2)='vd' THEN ''
        //     ELSE ''
        // END as 'tipo_molido'
        //  FROM `facturacion_comprobante_cabecera` AS A INNER JOIN facturacion_comprobante_cuerpo as B ON A.id=B.fk_comprobante_cabecera WHERE A.id='$pk_comprobante_venta'");

        $stmt = Conexion::conectar()->query("SELECT B.cantidad, B.servicio FROM `facturacion_comprobante_cabecera` AS A INNER JOIN servicios_anexos_bpm as B ON B.fk_bpm=A.idBpm WHERE A.id=$idd");

        $listPags["items"] = array();
        foreach ($stmt as $row) {
            $retorn = array(
                "cantidad"                              => $row["cantidad"],
                "servicio"                              => $row["servicio"],
               
            );
            array_push($listPags["items"], $retorn);
        }

        return json_encode($listPags["items"]);
    }



    /*=============================================
    --- CABEZERA DE LA FICHA
    =============================================*/
    public function viewFichaEntregaCabezera($idbpm)
    {
        //         $stmt = Conexion::conectar()->query("SELECT *,CASE
        //     WHEN SUBSTRING(documento_origen_de_comprobante , 1,2)='MP' THEN

        //     (SELECT TOP 1 CONCAT('<br>(',z.bpm_tipo_molido_pab,')') FROM productos_anexos__bpm as z  WHERE CONCAT(z.nombre_producto,' ',z.capacidad_producto)=B.descripcion AND z.codBpm=A.idBpm AND z.cantidad_producto=B.cantidad)
        //     WHEN SUBSTRING(documento_origen_de_comprobante , 1,2)='vd' THEN ''
        //     ELSE ''
        // END as 'tipo_molido'
        //  FROM `facturacion_comprobante_cabecera` AS A INNER JOIN facturacion_comprobante_cuerpo as B ON A.id=B.fk_comprobante_cabecera WHERE A.id='$pk_comprobante_venta'");

        $stmt = Conexion::conectar()->query("SELECT correlativo, fecha_atencion, nombre_cliente, lugar_procedencia FROM bpm WHERE pk_bpm='$idbpm'");

        $listPags["items"] = array();
        foreach ($stmt as $row) {
            $retorn = array(
                "correlativo"                              => $row["correlativo"],
                "fecha_atencion"                              => $row["fecha_atencion"],
                "nomcliente"                              => $row["nombre_cliente"],
                "direccion"                              => $row["lugar_procedencia"],
               
            );
            array_push($listPags["items"], $retorn);
        }

        return json_encode($listPags["items"]);
    }


}
