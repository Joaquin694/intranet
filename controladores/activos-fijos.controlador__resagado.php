<?php
class ControladorActivosFijos{

   /*=============================================
    CREAR ACTIVO FIJO
    =============================================*/
   public function ctrCrearActivosFijos($request){

      if($this->validate($request, ["descripcion", "categoria", "ubicacion", "valorCompra",
      "fechaAdquisicion", "vidaUtil", "tasaDepreciacion", "valorResidual", "estado", "usuario",
       "proveedor", "codigoInterno", "fechaInicioUso", "metodoDepreciacion", "garantia", "estadoOperativo",
       "observaciones"]) && $this->validateFile($request, ["documentosPropiedad", "fotosActivo"])){

         /*=============================================
         GUARDAMOS LA IMAGEN EN EL DIRECTORIO
         =============================================*/
          
        $ruta = $_SERVER['DOCUMENT_ROOT']. "/desarrollo_hermoza_luz_sistema/vistas/img/activos_fijos/";

        $extension = pathinfo($_FILES['fotosActivo']['name'],PATHINFO_EXTENSION);

        $aleatorio = mt_rand(100, 999);

        $nombre = $aleatorio. '.'. $extension;

        $nombreDb = "vistas/img/activos_fijos/". $nombre;
      

        $ruta_carga = $ruta. $nombre;

        if(!file_exists($ruta)){

            mkdir($ruta, 0777);
         }  
         if (move_uploaded_file($_FILES['fotosActivo']['tmp_name'], $ruta_carga)) {

            echo "se cargo correctamente";
         }else{

            echo "no se cargo correctamente";
         }
         /*=============================================
         GUARDAMOS EL DOCUMENTO EN EL DIRECTORIO
         =============================================*/

         $rutaDoc = $_SERVER['DOCUMENT_ROOT']. "/desarrollo_hermoza_luz_sistema/controladores/PDF/activos_fijos/";

         $extensionDoc = pathinfo($_FILES['documentosPropiedad']['name'],PATHINFO_EXTENSION);

         $aleatorioDoc = mt_rand(100, 999);

         $nombreDoc = $aleatorioDoc. '.'. $extensionDoc;

         $nombreDocDb = "controladores/PDF/". $nombreDoc;

         $ruta_cargaDoc = $rutaDoc. $nombreDoc;

         if(!file_exists($rutaDoc)){

            mkdir($rutaDoc, 0777);
         }
         if(move_uploaded_file($_FILES['documentosPropiedad']['tmp_name'], $ruta_cargaDoc)){
            echo "se cargo correctamente";
         }else{
            echo "no se cargo correctamente";
         }

         
         $tabla = "activo_fijo";
         $datos = array("descripcion" =>$request["descripcion"],
                        "categoria" =>$request["categoria"],
                        "ubicacion" =>$request["ubicacion"],
                        "valorCompra" =>$request["valorCompra"],
                        "fecha_adquisicion" =>$request["fechaAdquisicion"],
                        "vida_util" =>$request["vidaUtil"],
                        "tasa_depreciacion" =>$request["tasaDepreciacion"],
                        "valor_residual" =>$request["valorResidual"],
                        "estado" =>$request["estado"],
                        "usuario" =>$request["usuario"],
                        "proveedor" =>$request["proveedor"],
                        "codigo_interno" =>$request["codigoInterno"],
                        "fecha_inicio_uso" =>$request["fechaInicioUso"],
                        "metodo_depreciacion" =>$request["metodoDepreciacion"],
                        "garantia" =>$request["garantia"],
                        "estado_operativo" =>$request["estadoOperativo"],
                        "observaciones" =>$request["observaciones"],
                        "documentos_propiedad" =>$nombreDocDb,
                        "foto_activo" =>$nombreDb
                     );
            
         $respuesta = ModeloActivosFijos::mdlIngresarActivoFijo($tabla, $datos);

         if($respuesta == "ok"){

         }
         echo '<script>
                    swal({
                        type: "success",
                        title: "El activo fijo ha sido registrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        }).then((result) => {
                            if (result.value) {
                                window.location = "activos-fijos";
                            }
                        })
                </script>';
                     
      }else{
         echo "La solicitud no es valida";
      }
   }

   /*=============================================
   VALIDAR INPUTS TIPO TEXT, DATE, NUMBER
   =============================================*/
   public function validate($resquest, $input){
      $validation = true;
      foreach ($input as $key) {
         if(!isset($resquest[$key]) || empty($resquest[$key])){
            $validation = false;
            break;
         }
      }
      return $validation;
   }
   /*=============================================
   VALIDAR INPUTS TIPO FILE
   =============================================*/
   public function validateFile($resquest, $fileds){
      $validationDoc = true;
      foreach($fileds as $key){
         if(!isset($_FILES[$key]) || $_FILES[$key]['error'] !== 0){
            $validationDoc = false;
            break;
         }
      }
      return $validationDoc;
   }

}

