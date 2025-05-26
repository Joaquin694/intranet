<?php
require_once "conexion.php";
class wikito
{
   

	/*=============================================
		--- ENVIAR COMPROBANTES A SUNAT CON WIKI
	=============================================*/
	public function wiki_send_bolefact(){
                $stmta = Conexion::conectar()->query("SELECT * FROM `facturacion_comprobante_cabecera` where estado_envio <> 'ok'and fecha_creacion >= DATE_SUB(CURDATE(), INTERVAL 2 DAY)");

                    
                // Comprueba si la consulta devuelve algún resultado
            
                    while($row = $stmta->fetch(PDO::FETCH_ASSOC)) {
                        // Imprime cada fila
                               echo  $idi=$row['id'];
                               echo  "<br>";
                                                            $curl = curl_init();

                                                            curl_setopt_array($curl, array(
                                                            CURLOPT_URL => '<?php echo URLMAIN; ?>/controladores/enpointBoleFac.controlador.php',
                                                            CURLOPT_RETURNTRANSFER => true,
                                                            CURLOPT_SSL_VERIFYPEER=>false,
                                                            CURLOPT_ENCODING => '',
                                                            CURLOPT_MAXREDIRS => 10,
                                                            CURLOPT_TIMEOUT => 0,
                                                            CURLOPT_FOLLOWLOCATION => true,
                                                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                            CURLOPT_CUSTOMREQUEST => 'POST',
                                                            CURLOPT_POSTFIELDS => "id={$idi}&cod=subirEndPoint&auth=8BuOLSODJDC9E", // Aquí hemos hecho dinámica la parte ID
                                                            CURLOPT_HTTPHEADER => array(
                                                                'Content-Type: application/x-www-form-urlencoded',
                                                                'Cookie: PHPSESSID=e8a37563fd13df3c94e916879bf678fd'
                                                            ),
                                                            ));

                                                            $response = curl_exec($curl);
                                                                                        
                                                            curl_close($curl);  
                                                            echo $response;
                    }

    }

    
}





















