<?php
require_once "conexion.php";

class ModeloCompras
{

  // ejemplo
  public function insert_compras($data, $doc1, $doc2, $doc3)
  {
    $tins[':tipo_comprobante_compra'] = $data['tipo_comprobante_compra'];
    $tins[':serie_compra'] = $data['serie_compra'];
    $tins[':numero_compra'] = $data['numero_compra'];
    $tins[':fecha_contabilizacion_compra'] = $data['fecha_contabilizacion_compra'];
    $tins[':fecha_vencimiento_compra'] = $data['fecha_vencimiento_compra'];
    $tins[':fecha_documento_compra'] = $data['fecha_documento_compra'];
    $tins[':total_compra'] = $data['total_compra'];
    $tins[':total_deuda'] = $data['total_compra'];
    $tins[':id_proveedor'] = $data['id_proveedor'];

    $tins[':total_igv'] = $data['total_igv'];
    $tins[':total_inafecto'] = $data['total_inafecto'];
    $tins[':total_gravado'] = $data['total_gravado'];

    $tins[':idusrcobro'] = $_SESSION["id"] ? $_SESSION["id"] : null;
    $tins[':nombrusarcobro'] = $_SESSION["nombre"] ? $_SESSION["nombre"] : null;

    $tins[':doc1'] = $doc1;
    $tins[':doc2'] = $doc2;
    $tins[':doc3'] = $doc3;

    $gbd = Conexion::conectar();
    $stmt = $gbd->prepare("INSERT INTO compra (tipo_comprobante_compra,serie_compra,numero_compra,fecha_contabilizacion_compra,fecha_vencimiento_compra,fecha_documento_compra,total_compra,total_deuda,id_proveedor,total_igv,total_inafecto,total_gravado,idusrcobro,nombrusarcobro, doc1, doc2, doc3) VALUES
    (:tipo_comprobante_compra,:serie_compra,:numero_compra,:fecha_contabilizacion_compra,:fecha_vencimiento_compra,:fecha_documento_compra,:total_compra,:total_deuda,:id_proveedor,:total_igv,:total_inafecto,:total_gravado,:idusrcobro,:nombrusarcobro, :doc1, :doc2, :doc3)");
    if ($stmt->execute($tins)) {
      $rt['success'] = true;
      $rt['msg'] = "registro de compra exitoso";
      $itms[':id_compra'] = $gbd->lastInsertId();
      foreach ($data['item'] as $item) {
        $itms[':tipo_compra'] = $item['tipo_producto'];
        $itms[':unidad_compra'] = $item['tipo_medida'];
        $itms[':descripcion_compra'] = strtoupper($item['descripcion']);
        $itms[':cantidad_compra'] = $item['cantidad'];
        $itms[':valor_compra'] = $item['valor'];
        $itms[':total_compra'] = $item['total'];
        $itms[':igv_compra'] = isset($item['igv']) ? 'true' : 'false';
        $stmt2 = Conexion::conectar()->prepare("INSERT INTO compra_item (tipo_compra,id_compra,unidad_compra,descripcion_compra,cantidad_compra,valor_compra,total_compra,igv_compra)
        VALUES (:tipo_compra,:id_compra,:unidad_compra,:descripcion_compra,:cantidad_compra,:valor_compra,:total_compra,:igv_compra)");
        if ($stmt2->execute($itms)) {
          $rt['itms'][] = true;
        } else {
          $rt['itms'][] = $stmt2->errorInfo();
        }
      }
    } else {
      $rt['success'] = false;
      $rt['error'] = $stmt->errorInfo();
    }
    return $rt;
  }
  public function buscar_proveedor($term)
  {

    $stmt = Conexion::conectar()->prepare("SELECT proveedor_pk AS id, razon_social AS name, ruc, direccion_prov AS direccion FROM proveedores WHERE ruc LIKE :term OR razon_social LIKE :term");
    $stmt->bindValue(":term", "%$term%");
    if ($stmt->execute()) {
      $rt['success'] = true;
      $rt['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
      $rt['success'] = false;
      $rt['error'] = $stmt->errorInfo();
    }
    return $rt;
  }
  public function load_compras($fecha_inicio, $fecha_fin)
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM compra c LEFT JOIN proveedores p ON p.proveedor_pk=c.id_proveedor WHERE fecha_contabilizacion_compra BETWEEN :fecha_inicio AND :fecha_fin ORDER BY id_compra");
    $stmt->bindValue(":fecha_inicio", $fecha_inicio);
    $stmt->bindValue(":fecha_fin", $fecha_fin);
    if ($stmt->execute()) {
      $rt['success'] = true;
      $rt['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
      $rt['success'] = false;
      $rt['error'] = $stmt->errorInfo();
    }
    return $rt;
  }
  public function load_deuda_compra($id_compra)
  {
    function datosdeuda($id_compra, $tipo_comprobante_compra, $serie_compra, $numero_compra, $total_compra, $total_deuda, $fecha_contabilizacion_compra, $fecha_vencimiento_compra, $fecha_documento_compra, $fecha_registro, $proveedor_pk, $razon_social, $ruc)
    {
      $trsps['id_compra'] = $id_compra;
      $trsps['tipo_comprobante_compr'] = $tipo_comprobante_compra;
      $trsps['serie_compra'] = $serie_compra;
      $trsps['numero_compra'] = $numero_compra;
      $trsps['total_compra'] = $total_compra;
      $trsps['total_deuda'] = $total_deuda;
      $trsps['fecha_contabilizacion_compra'] = $fecha_contabilizacion_compra;
      $trsps['fecha_vencimiento_compra'] = $fecha_vencimiento_compra;
      $trsps['fecha_documento_compra'] = $fecha_documento_compra;
      $trsps['fecha_registro'] = $fecha_registro;
      $trsps['proveedor_pk'] = $proveedor_pk;
      $trsps['razon_social'] = $razon_social;
      $trsps['ruc'] = $ruc;

      $stmt = Conexion::conectar()->prepare("SELECT * FROM compra_pago WHERE id_compra = :id_compra ORDER BY id_compra DESC");
      $stmt->bindValue(":id_compra", $id_compra);
      if ($stmt->execute()) {
        $trsps['deuda'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      } else {
        $trsps['deudaerr'] = $stmt->errorInfo();
      }
      return $trsps;
    }
    $stmt = Conexion::conectar()->prepare("SELECT id_compra,tipo_comprobante_compra,serie_compra,numero_compra,total_compra,total_deuda,fecha_contabilizacion_compra,fecha_vencimiento_compra,fecha_documento_compra,fecha_registro,proveedor_pk,razon_social,ruc FROM compra c LEFT JOIN proveedores p ON p.proveedor_pk=c.id_proveedor WHERE id_compra = :id_compra ORDER BY id_compra DESC LIMIT 1");
    $stmt->bindValue(":id_compra", $id_compra);
    if ($stmt->execute()) {
      $rt['success'] = true;
      $rt['data'] = $stmt->fetchAll(PDO::FETCH_FUNC, 'datosdeuda');
    } else {
      $rt['success'] = false;
      $rt['error'] = $stmt->errorInfo();
    }
    return $rt;
  }
  public function load_detalle_compra($id_compra)
  {
    function itemscompra($id_compra, $razon_social, $ruc, $direccion, $serie_compra, $numero_compra, $fecha_compra, $total_compra, $total_igv, $total_inafecto, $total_gravado)
    {
      //razon_social,ruc,direccion,serie_compra,numero_compra,fecha_compra,total_compra,total_igv,total_inafecto,total_gravado,tr_detalle_compra,razon_moali,ruc_moali,direccion_moali
      $trsps['razon_social'] = $razon_social;
      $trsps['ruc'] = $ruc;
      $trsps['direccion'] = $direccion;
      $trsps['serie_compra'] = $serie_compra;
      $trsps['numero_compra'] = $numero_compra;
      $trsps['fecha_compra'] = $fecha_compra;
      $trsps['total_compra'] = number_format($total_compra, 3, ',', '');

      $trsps['total_igv'] = number_format($total_igv, 3, ',', '');
      $trsps['total_inafecto'] = number_format($total_inafecto, 3, ',', '');
      $trsps['total_gravado'] = number_format($total_gravado, 3, ',', '');

      $trsps['razon_moali'] = "INVERSIONES Y SERVICIOS HERMOZA LUZ";
      $trsps['ruc_moali'] = "20487040852";
      $trsps['direccion_moali'] = "DIRECCION HERMOZA LUZ";

      //razon_moali,ruc_moali,direccion_moali

      $stmt = Conexion::conectar()->prepare("SELECT tipo_compra,unidad_compra,descripcion_compra,FORMAT(cantidad_compra,3) AS cantidad_compra,FORMAT(valor_compra,3) AS valor_compra,FORMAT(total_compra,3) AS total_compra,FORMAT(igv_compra,3) AS igv_compra FROM compra_item WHERE id_compra = :id_compra ORDER BY id_compra DESC");
      $stmt->bindValue(":id_compra", $id_compra);
      if ($stmt->execute()) {
        $trsps['tr_detalle_compra'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      } else {
        $trsps['detaerr'] = $stmt->errorInfo();
      }
      return $trsps;
    }
    $stmt = Conexion::conectar()->prepare("SELECT id_compra,razon_social,ruc,direccion_prov AS direccion,serie_compra,numero_compra,fecha_contabilizacion_compra AS fecha_compra,total_compra,total_igv,total_inafecto,total_gravado FROM compra c LEFT JOIN proveedores p ON p.proveedor_pk=c.id_proveedor WHERE id_compra = :id_compra ORDER BY id_compra DESC LIMIT 1");
    $stmt->bindValue(":id_compra", $id_compra);
    if ($stmt->execute()) {
      $rt['success'] = true;
      $rt['data'] = $stmt->fetchAll(PDO::FETCH_FUNC, 'itemscompra');
    } else {
      $rt['success'] = false;
      $rt['error'] = $stmt->errorInfo();
    }
    return $rt;
  }
  public function insert_pago($data, $doc1)
  {
    $tins[':id_compra'] = $data['id_compra'];
    $tins[':metodo_pago'] = $data['metodo_pago'];
    $tins[':referencia_pago'] = $data['referencia_pago'];
    $tins[':descripcion_pago'] = $data['descripcion_pago'];
    $tins[':proveedor_nombre'] = $data['proveedor_nombre'];
    $tins[':proveedor_documento'] = $data['proveedor_documento'];
    $tins[':monto_pago'] = $data['monto_pago'];
    $tins[':fecha_pago'] = $data['fecha_pago'];

    $tins[':idusrcobro'] = $_SESSION["id"] ? $_SESSION["id"] : null;
    $tins[':nombrusarcobro'] = $_SESSION["nombre"] ? $_SESSION["nombre"] : null;
    $tins[':doc'] = $doc1;


    $gbd = Conexion::conectar();
    $stmt = $gbd->prepare("INSERT INTO compra_pago (id_compra,metodo_pago,referencia_pago,descripcion_pago,proveedor_nombre,proveedor_documento,monto_pago,fecha_pago,idusrcobro,nombrusarcobro, doc)
    VALUES (:id_compra,:metodo_pago,:referencia_pago,:descripcion_pago,:proveedor_nombre,:proveedor_documento,:monto_pago,:fecha_pago,:idusrcobro,:nombrusarcobro, :doc)");
    if ($stmt->execute($tins)) {
      $rt['success'] = true;
      $rt['msg'] = "Pago registrado de forma exitosa";
      $itms[':monto_pago'] = $data['monto_pago'];
      $itms[':id_compra'] = $data['id_compra'];
      $stmt2 = Conexion::conectar()->prepare("UPDATE compra SET total_deuda=total_deuda-:monto_pago WHERE id_compra=:id_compra");
      if ($stmt2->execute($itms)) {
        $rt['udeuda'] = true;
      } else {
        $rt['udeuda'] = false;
        $rt['udeudae'] = $stmt2->errorInfo();
      }
    } else {
      $rt['success'] = false;
      $rt['error'] = $stmt->errorInfo();
    }
    return $rt;
  }

  public static function mdlMostrar($tabla, $item, $valor)
  {
    try {
      if ($item != null) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :id");
        $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
      } else {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
      }
    } catch (Exception $e) {
      return ['success' => false, 'error' => $e->getMessage()];
    }
  }
}
switch ($_POST["ajaxservice"]) {
  case 'loadData':
    $respuesta = ModeloCompras::mdlMostrar("compra", null, null);
    echo json_encode($respuesta);
    break;
}
