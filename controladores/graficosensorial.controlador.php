<?php
session_start();
require_once "../modelos/graficosensorial.modelo.php";
switch ($_POST['cod']) {
    case 'ortsigerwen':
        // COLOCANDO IMAGEN ARANIA
       // $nombre_imagen = $_POST['nombre_imagen'];
       $nombre_imagen = 'grafico1.png';
        $img           = $_POST['image']; //data 'data:image/png;base64,~;
        $img           = str_replace('data:image/png;base64,', '', $img);
        $img           = str_replace(' ', '+', $img);
        $data          = base64_decode($img);
        $file          = "../vistas/img/sabores/" . $nombre_imagen;
        $success       = file_put_contents($file, $data);
       
            $arraynivel1 = $_POST['arraynivel1'];
            $arraynivel2      = $_POST['arraynivel2'];
            $arraynivel3          = $_POST['arraynivel3'];
            $opcion="registrar";
            $codid=2;
            $arraynivel1 = json_decode($arraynivel1, true);
            $arraynivel2 = json_decode($arraynivel2, true);
            $arraynivel3 = json_decode($arraynivel3, true);             
            if ($opcion=="registrar") {
              # code...
            $llave_de_acceso = new ModeloGrafic;
            $user_db         = json_decode($llave_de_acceso->new_grafic($arraynivel1, $arraynivel2, $arraynivel3, $codid), true);

            echo "<div class='alert alert-".$user_db["contenido"]."'> ".$user_db["mensaje"]."</div>";

//EDITAR USUARIO
            }
        break;
// .-----------------------------------------------------------------------------------------------------------------------------
    case 'selectnivel1':
        if (1==1) {

            $level1="nivel1";
            $level2="nivel2";
            $level3="nivel3";
            $llave_de_acceso = new ModeloSelectLevel;
            $user_db         = json_decode($llave_de_acceso->select_registrados($level1), true);

           // $llave_de_acceso = new ModeloSelectLevel;
            $user_db1         = json_decode($llave_de_acceso->select_registrados($level2), true);

            //$llave_de_acceso = new ModeloSelectLevel;
            $user_db2         = json_decode($llave_de_acceso->select_registrados($level3), true);

            $llave_de_acceso2 = new ModeloColspan;
            $user_db3         = json_decode($llave_de_acceso2->select_colspan($_POST['level']), true);

           // $llave_de_acceso2 = new ModeloColspan;
            $user_db4         = json_decode($llave_de_acceso2->select_colspann1($_POST['level']), true);
   
      echo json_encode($user_db4); //IMPRIME FORMATO PARA colspan table

            isset($user_db[0]["id_n1"]) ? $verifica = 'ok' : $verifica = 'bad';
            isset($user_db1[0]["id_n2"]) ? $verifica2 = 'ok' : $verifica2 = 'bad';
            isset($user_db2[0]["id_n3"]) ? $verifica3 = 'ok' : $verifica3 = 'bad';
            if ($verifica == 'ok' || $verifica2 == 'ok' || $verifica3=='ok') {
             ?>

             <tr> 
                <?php
                $count_register = 0;
                foreach ($user_db as $row) {  
                    $count_register = $count_register+1;                  
                    $clsp=0;
                    
                    foreach ($user_db4 as $row2) {
                            if($row['id_n1']==$row2['padre']){$clsp=$row2['Ncolspan'];}
                    }
                    $namebusdiv = str_replace(" ", '', $row["Nombre"]); 
                    $namebusdiv = str_replace("/", '', $namebusdiv);
                        ?>                  
         
                      <td colspan="<?php echo $clsp?>"><input type="checkbox" id="i1<?php echo $row["id_n1"]; ?>" name="i1<?php echo $row["id_n1"]; ?>" value="<?php echo $row['Nombre']; ?>" onclick="contrucGrafic('i1<?php echo $row['id_n1']; ?>','<?php echo $row['Nombre']; ?>','n1','<?php echo $row['id_n1']; ?>','<?php echo $row['id_n1']; ?>')"> <label for="n1<?php echo $row["id_n1"]; ?>"><?php echo $row["Nombre"]; ?></label>										
                      <div id="nb1<?php echo $namebusdiv; ?>"></div></td>
                            <?php }
                            $llave_de_acceso2 = new ModeloGrafic;
                            $check_db         = json_decode($llave_de_acceso2->activa_check('1',$_POST['pk_bpm']), true);
                            foreach ($check_db as $row) {

?>
 <script type="text/javascript">
                   document.getElementById('i1<?php echo $row['id_niv']?>').checked = true;
                 
                </script>
<?php
                            }
                            ?>    
               
             </tr>
             <tr>
             <?php
                $count_register = 0;
                foreach ($user_db1 as $row) {
                    $clspp=0;
                    foreach ($user_db3 as $row1) {

                        if($row1['padre']==$row['id_n2']){$clspp=$row1['Ncolspan'];}
                       
                    }
                    $namebusdiv = str_replace(" ", '', $row["Nombre"]); 
                    $namebusdiv = str_replace("/", '', $namebusdiv);
                ?>                  
         
         <td colspan="<?php echo $clspp?>" ><input type="checkbox" id="i2<?php echo $row["id_n2"]; ?>" name="i2<?php echo $row["id_n2"]; ?>" value="<?php echo $row['Nombre']; ?>" onclick="contrucGrafic('i2<?php echo $row['id_n2']; ?>','<?php echo $row['Nombre']; ?>','n2','<?php echo $row['Padre']; ?>','<?php echo $row['id_n2']; ?>')"> <label for="n2<?php echo $row["id_n2"]; ?>"><?php echo $row["Nombre"]; ?></label>										
                </br>   
                <a class="viewspinerloading btnParaPrelog"  title="crear sabor" data-toggle="modal" data-target="#staticBackdrop" style="height: 100px;color: #3378a0;" data-padre='<?php echo $row["id_n2"];?>'  onclick="cargaIdPadre()"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>                             
                			
                <div id="nb1<?php echo $namebusdiv; ?>"></div> </td>
                            <?php } //$llave_de_acceso2 = new ModeloGrafic;
                            $check_db         = json_decode($llave_de_acceso2->activa_check('2',$_POST['pk_bpm']), true);
                            foreach ($check_db as $row) { ?>
                            <script type="text/javascript">
                   document.getElementById('i2<?php echo $row['id_niv']?>').checked = true;
                 
                </script>
<?php
                            }
                            ?>   
                </tr>

                <tr>
                <?php
                $count_register = 0;
                foreach ($user_db1 as $row1) {
                    $salt=0;
                foreach ($user_db2 as $row) {        
                        if($row1['id_n2']==$row['Padre']){
                            $salt=1;
                            $namebusdiv = str_replace(" ", '', $row["Nombre"]);
                            $namebusdiv = str_replace("/", '', $namebusdiv);
         ?>                  
         
         <td><input type="checkbox" id="i3<?php echo $row["id_n3"]; ?>" name="i3<?php echo $row["id_n3"]; ?>" value="<?php echo $row['Nombre']; ?>" onclick="contrucGrafic('i3<?php echo $row['id_n3']; ?>','<?php echo $row['Nombre']; ?>','n3','<?php echo $row['Padre']; ?>','<?php echo $row['id_n3']; ?>')"> <label for="n3<?php echo $row["id_n3"]; ?>"><?php echo $row["Nombre"]; ?></label>										
         <div id="nb1<?php echo $namebusdiv; ?>"></div></td> 
                            <?php }
                        
                        }
                        if($salt==0){
?>
<td></td> 
<?php

                        }                   
                        
                        }
                        //$llave_de_acceso2 = new ModeloGrafic;
                        $check_db         = json_decode($llave_de_acceso2->activa_check('3',$_POST['pk_bpm']), true);
                        foreach ($check_db as $row) { ?>
                        <script type="text/javascript">
                   document.getElementById('i3<?php echo $row['id_niv']?>').checked = true;
                 
                </script>
<?php
                            }
                            ?>   

                </tr>
                       
                    <?php
                
            } else {
                echo "<tr>  <td colspan='10'><div class='alert alert-warning text-center'> NO hay datos  </div></td></tr>";

            }

        } else {
            // Contraseñas no coinciden
            echo "<div class='alert alert-danger'> ERROR !!!!!!!!! </div>";
        }
        break;

// .-----------------------------------------------------------------------------------------------------------------------------
    case 'oteinwen':
    if ($_POST['cod']) {
        
       $llave_de_acceso = new ModeloRegistroNieto;
       $user_db         = json_decode($llave_de_acceso->registro_Nieto($_POST['nombre'], $_POST['color'], $_POST['padre']), true);

       echo "<div class='alert alert-".$user_db["contenido"]."'> ".$user_db["mensaje"]."</div>";


    }
       
    break;

    // .-----------------------------------------------------------------------------------------------------------------------------
    case 'cargaGrafBD':
    if ($_POST['cod']) {
     

       $llave_de_acceso = new ModeloGraficoS;
       $user_db         = json_decode($llave_de_acceso->Grafic_Sen($_POST['customSwitch1'],$_POST['pk_bpm']), true);

       //print_r($user_db);
       header('Content-type: application/json');
      // $ss=json_encode($user_db);
      echo json_encode($user_db); //IMPRIME FORMATO PARA grafico

    }
       
    break;

    // .-----------------------------------------------------------------------------------------------------------------------------
    case 'modifigraf':
        if ($_POST['cod']) {
            $codid=$_POST['pk_bpm'];
           $llave_de_acceso = new ModeloGrafic;
           $user_db         = json_decode($llave_de_acceso->guarda_datos_grafic($_POST['estado'],$_POST['idniv1'],$_POST['lev'],$_POST['padre'],$codid), true);
    
           //print_r($user_db);
         //  header('Content-type: application/json');
          echo json_encode($user_db); //IMPRIME FORMATO PARA grafico
    
        }
           
        break;

// ------------------------------------------------------------------------------------------------------------------------------
    default:
        # code...
        echo "<div class='alert alert-danger'> Sin argumentos, verifique!! </div>";
        break;
// ------------------------------------------------------------------------------------------------------------------------------
}