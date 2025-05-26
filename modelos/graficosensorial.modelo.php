<?php
require_once "conexion.php";

class ModeloGrafic
{


    public function guarda_datos_grafic($estadon1, $niv1, $lev, $padre, $codid)
    {
        if($lev==1){
        $stmt2 = Conexion::conectar()->query("SELECT * FROM `registro_grafic_sensorial_n1` where id_usu=$codid and id_nivel1=$niv1");

        foreach ($stmt2 as $row) {
            $retorn = array(
            //SE EXTRAE EL ID DE LA PERSONA
                $id_us = $row["id_usu"],

            );

        }
        if ($id_us) {
            
            $nivel2 = Conexion::conectar()->query("UPDATE `registro_grafic_sensorial_n1` set estado=$estadon1 where id_usu=$codid and id_nivel1=$niv1");

        }else{
            
            $nivel1 = Conexion::conectar()->query("INSERT INTO `registro_grafic_sensorial_n1` (id_usu, id_nivel1, estado) VALUES ($codid, $niv1, '$estadon1')");

        }
    }else if($lev==2){
        $stmt2 = Conexion::conectar()->query("SELECT * FROM `registro_grafic_sensorial_n2` where id_usu=$codid and id_nivel2=$niv1");

        foreach ($stmt2 as $row) {
            $retorn = array(
            //SE EXTRAE EL ID DE LA PERSONA
                $id_us = $row["id_usu"],

            );

        }
        if ($id_us) {
            
            $nivel2 = Conexion::conectar()->query("UPDATE `registro_grafic_sensorial_n2` set estado=$estadon1 where id_usu=$codid and id_nivel2=$niv1");

        }else{
            $nivel1 = Conexion::conectar()->query("INSERT INTO `registro_grafic_sensorial_n2` (id_usu, id_nivel2, padre, estado) VALUES ($codid, $niv1, $padre, '$estadon1')");

        }

    }else if($lev==3){
        $stmt2 = Conexion::conectar()->query("SELECT * FROM `registro_grafic_sensorial_n3` where id_usu=$codid and id_nivel3=$niv1");

        foreach ($stmt2 as $row) {
            $retorn = array(
            //SE EXTRAE EL ID DE LA PERSONA
                $id_us = $row["id_usu"],

            );

        }
        if ($id_us) {
            
            $nivel2 = Conexion::conectar()->query("UPDATE `registro_grafic_sensorial_n3` set estado=$estadon1 where id_usu=$codid and id_nivel3=$niv1");

        }else{
            $nivel1 = Conexion::conectar()->query("INSERT INTO `registro_grafic_sensorial_n3` (id_usu, id_nivel3, padre, estado) VALUES ($codid, $niv1, $padre, '$estadon1')");

        }


    }

       
    }
    // -----------------------------
    public function new_grafic($arraynivel1, $arraynivel2, $arraynivel3, $codid)
    {
        //$listPags["items"] = array();
        foreach ($arraynivel1 as $row) {
            $niv1=$row["id"];
            $estadon1= $row["estado"]; 
            $nivel1 = Conexion::conectar()->query("INSERT INTO `registro_grafic_sensorial_n1` (id_usu, id_nivel1, estado) VALUES ($codid, $niv1, '$estadon1')");

            }
        foreach ($arraynivel2 as $row) {
            $niv2=$row["id"];
            $estadon2= $row["estado"]; 
            $padre1= $row["padre"]; 
            $nivel2 = Conexion::conectar()->query("INSERT INTO `registro_grafic_sensorial_n2` (id_usu, id_nivel2, padre, estado) VALUES ($codid, $niv2, $padre1, '$estadon2')");

            }
            foreach ($arraynivel3 as $row) {
                $niv3=$row["id"];
            $estadon3= $row["estado"]; 
            $padre2= $row["padre"]; 
            $nivel3 = Conexion::conectar()->query("INSERT INTO `registro_grafic_sensorial_n3` (id_usu, id_nivel3, padre, estado) VALUES ($codid, $niv3, $padre2, '$estadon3')");

                }
            
            $mensaje = "Registro guardado correctamente!!";
            $respuesta = array("respuesta" => '1',
               "mensaje" => $mensaje,
               "contenido" => "success");
   
            return json_encode($respuesta);

}




     public function activa_check($nivel,$pk_bpm)
    {

        if($nivel == '1'){
$selctCheck = Conexion::conectar()->query("SELECT rgsn1.id_nivel1 FROM registro_grafic_sensorial_n1 rgsn1 inner join grafico_sensorial_nivel1 gsn1 ON rgsn1.id_nivel1=gsn1.id_nivel1 where id_usu=$pk_bpm and rgsn1.estado=1");

$listPags["items"] = array();

foreach ($selctCheck as $row) {
$retorn = array(

"id_niv"             => $row["id_nivel1"],

);

array_push($listPags["items"], $retorn);

       }
       return json_encode($listPags["items"]);
    }else if($nivel == '2'){
        
        $selctCheck = Conexion::conectar()->query("SELECT rgsn2.id_nivel2 FROM registro_grafic_sensorial_n2 rgsn2 inner join grafico_sensorial_nivel2 gsn2 ON rgsn2.id_nivel2=gsn2.id_nivel2 where rgsn2.id_usu=$pk_bpm and rgsn2.estado=1");
        
        $listPags["items"] = array();
        
        foreach ($selctCheck as $row) {
        $retorn = array(
        
        "id_niv"             => $row["id_nivel2"],
        
        );
        
        array_push($listPags["items"], $retorn);
        
               }
               return json_encode($listPags["items"]);

    }else if($nivel == '3'){
       
        $selctCheck = Conexion::conectar()->query("SELECT rgsn3.id_nivel3 FROM registro_grafic_sensorial_n3 rgsn3 inner join grafico_sensorial_nivel3 gsn3 ON rgsn3.id_nivel3=gsn3.id_nivel3 where id_usu=$pk_bpm and rgsn3.estado=1");
        
        $listPags["items"] = array();
        
        foreach ($selctCheck as $row) {
        $retorn = array(
        
        "id_niv"             => $row["id_nivel3"],
        
        );
        
        array_push($listPags["items"], $retorn);
        
               }
               return json_encode($listPags["items"]);


    }
        
    }


}

class ModeloSelectLevel
{
    // -----------------------------
    public function select_registrados($nivel)
    {

//SELECCIONAMOS LOS DATOS DE LAS PERSONAS
        $selctUsers = Conexion::conectar()->query("SELECT * FROM grafico_sensorial_$nivel");

        $listPags["items"] = array();

        foreach ($selctUsers as $row) {

//$userData['AllUsers'][] = $row;
if($nivel == 'nivel1'){

    $retorn = array(

        "id_n1"             => $row["id_nivel1"],

        "Nombre"                 => $row["nombre"],

        "Estado"     => $row["estado"],

        "color"        => $row["color"],

    );

    array_push($listPags["items"], $retorn);

}else if($nivel == 'nivel2'){
    $retorn = array(

        "id_n2"             => $row["id_nivel2"],

        "Nombre"            => $row["nombre"],

        "Estado"            => $row["estado"],

        "color"             => $row["color"],
        "Padre"             => $row["padre"],

    );

    array_push($listPags["items"], $retorn);

}else {
    $retorn = array(

        "id_n3"             => $row["id_nivel3"],

        "Nombre"            => $row["nombre"],

        "Estado"            => $row["estado"],

        "color"             => $row["color"],
        "Padre"             => $row["padre"],

    );

    array_push($listPags["items"], $retorn);

}
            
        }

        //mysql_close($selctUsers);
//$selctUsers->close();

        return json_encode($listPags["items"]);

    }
}


class ModeloColspan
{
    // -----------------------------
    public function select_colspan($nivel)
    {

//SELECCIONAMOS LOS DATOS DE LAS PERSONAS
        $selctUsers = Conexion::conectar()->query("select padre, count(id_nivel3) as colsp from grafico_sensorial_nivel3 group by padre");

        $listPags["items"] = array();

        foreach ($selctUsers as $row) {

//$userData['AllUsers'][] = $row;

    $retorn = array(

        "padre"             => $row["padre"],

        "Ncolspan"                 => $row["colsp"],

    );
    
    array_push($listPags["items"], $retorn);
            
        }
    
        //mysql_close($selctUsers);
//$selctUsers->close();
        return json_encode($listPags["items"]);

    }

    // -----------------------------
    public function select_colspann1($nivel)
    {
        
//SELECCIONAMOS LOS DATOS DE LAS PERSONAS
        $selctUsers = Conexion::conectar()->query("select g2.padre as padre, count(g2.padre) as coslp1 from grafico_sensorial_nivel2 g2 left join grafico_sensorial_nivel3 g3 on g3.padre=g2.id_nivel2 group by g2.padre");

        $listPags["items"] = array();

        foreach ($selctUsers as $row) {

//$userData['AllUsers'][] = $row;

    $retorn = array(

        "padre"             => $row["padre"],

        "Ncolspan"                 => $row["coslp1"],

    );
    
    array_push($listPags["items"], $retorn);
            
        }
    
        //mysql_close($selctUsers);
//$selctUsers->close();
        return json_encode($listPags["items"]);

    }
}

class ModeloGraficoS
{
    // -----------------------------
    public function Grafic_Sen($nivel,$pk_bpm)
    {
        //$selctGrafic = Conexion::conectar()->query("SELECT id_nivel1, nombre FROM grafico_sensorial_nivel1");
        $selctGrafic = Conexion::conectar()->query("SELECT rgsn1.id_nivel1, gsn1.nombre, gsn1.color FROM registro_grafic_sensorial_n1 rgsn1 inner join grafico_sensorial_nivel1 gsn1 ON rgsn1.id_nivel1=gsn1.id_nivel1 where id_usu=$pk_bpm and rgsn1.estado=1");
        $listPags["items"] = array();
        foreach ($selctGrafic as $row) {
            
            $hij='no';
    //$selctGrafic1 = Conexion::conectar()->query("SELECT id_nivel2, padre, nombre FROM grafico_sensorial_nivel2");
    $selctGrafic1 = Conexion::conectar()->query("SELECT rgsn2.id_nivel2, rgsn2.padre, gsn2.nombre, gsn2.color FROM registro_grafic_sensorial_n2 rgsn2 inner join grafico_sensorial_nivel2 gsn2 ON rgsn2.id_nivel2=gsn2.id_nivel2 where rgsn2.id_usu=$pk_bpm and rgsn2.estado=1");
    $list['itm2'] = array();
    foreach ($selctGrafic1 as $row1) {
     
 $hj='no';
   // $selctGrafic3 = Conexion::conectar()->query("SELECT id_nivel3, padre, nombre FROM grafico_sensorial_nivel3");
   $selctGrafic3 = Conexion::conectar()->query("SELECT rgsn3.id_nivel3, rgsn3.padre, gsn3.nombre, gsn3.color FROM registro_grafic_sensorial_n3 rgsn3 inner join grafico_sensorial_nivel3 gsn3 ON rgsn3.id_nivel3=gsn3.id_nivel3 where id_usu=$pk_bpm and rgsn3.estado=1");
   $list['itm3'] = array();
    foreach ($selctGrafic3 as $row3) {
        
        if($row3["padre"] == $row1["id_nivel2"]){
       // if($row3["padre"] == $row1["padre"]){

        $retorn3 = array(
            'fill' => $row3["color"],
            'name' => $row3["nombre"],  
            
    
        );
        array_push($list['itm3'], $retorn3);
       $hj='si';
   }

    }  
    if($row1["padre"] == $row["id_nivel1"]){
if ($hj=="si"){
    $nombre = str_replace("/", "\n", $row1["nombre"]);
    $nombre = str_replace(" ", "\n", $nombre);
    $retorn1 = array(
        'fill' => $row1["color"],
        'name' => $nombre,
        "children" => $list['itm3'],    
    
    ); 
    array_push($list["itm2"], $retorn1);

        }else{
            $nombre = str_replace("/", "\n", $row1["nombre"]);
            $nombre = str_replace(" ", "\n", $nombre);

            $retorn1 = array(
                'fill' => $row1["color"],
            'name' => $nombre,
            
                
        );
        array_push($list['itm2'], $retorn1);                     
        }
        $hij='si';
    }

    }  
if ($hij=="si"){
    $nombre = str_replace("/", "\n", $row["nombre"]);
    $retorn = array(
        'fill' => $row["color"],
        'name' => $nombre,
        "children" => $list['itm2'],     
    
    ); 
    array_push($listPags["items"], $retorn);
        }else{
            $nombre = str_replace("/", "\n", $row["nombre"]);

            $retorn = array(
                'fill' => $row["color"],
                'name' => $nombre,   
                                     
            
            ); 
            array_push($listPags["items"], $retorn);
        }
        }
        $lisp["it"] = array();
        $ret = array(

            "name"                 => "sabores", 
            'fill' => 'transparent',
            "children"                 => $listPags["items"],
        );
        array_push($lisp["it"], $ret);
      
        //mysql_close($selctUsers);
//$selctUsers->close();
      // return json_encode($listPags["items"]);
       return json_encode($lisp["it"]);

    }
}


class ModeloRegistroNieto
{
    // -----------------------------
    public function registro_Nieto($nombre, $color, $padre)
    {
   // $selctGrafic3 = Conexion::conectar()->query("SELECT id_nivel3, padre, nombre FROM grafico_sensorial_nivel3");
   $insNivel3 = Conexion::conectar()->query("INSERT INTO `grafico_sensorial_nivel3` (padre, nombre, color, estado, selecionado) VALUES ($padre, '$nombre', '$color', 1,1)");
  
    if($insNivel3){
        $mensaje = "Registro Grabado Correctamente";
        $respuesta = array("respuesta" => '1',
            "mensaje" => $mensaje,
            "contenido" => "success");

        return json_encode($respuesta);

    }else{
        $mensaje = "No se pudo grabar su registro !!";
        $respuesta = array("respuesta" => '0',
            "mensaje" => $mensaje,
            "contenido" => "danger");

        return json_encode($respuesta);

    }

    }  
    
}
