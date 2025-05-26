<?php
switch ($_POST['laaction']) {
    /*°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° */
    case 'view_person_dni':
        # code...
        $dni      = $_POST['dni'];
        $tipo     = 'dni';
        $password = 'IDL9898skjdSSssa879LOOISI98465'; //AQUÍ TU PASSWORD
        if ($tipo == 'dni') {
            $ruta = "https://facturalahoy.com/api/persona/" . $dni . '/' . $password;
        } elseif ($tipo == 'ruc') {
            $ruta = "https://facturalahoy.com/api/empresa/" . $dni . '/' . $password;
        } else {
            $resp['repsuesta'] = 'error';
            echo json_encode();
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL            => $ruta,
            CURLOPT_USERAGENT      => 'Consulta Datos',
        ));
        $resp = curl_exec($curl);
        $este = json_decode($resp, true);
        curl_close($curl);

        # code...
        if ($este["nombres"]) {
            # code...
            $ApellidoPaterno = $este["ap_paterno"];
            $ApellidoMaterno = $este["ap_materno"];
            $Nombres         = $este["nombres"];

            $FechaNacimiento    = explode('/', $este["api"][0]["FechaNacimiento"]);
            $FechaNacimientoFor = $FechaNacimiento[2] . "-" . $FechaNacimiento[1] . "-" . $FechaNacimiento[0];

            $Sexo = $este["api"][0]["Sexo"];

            if ($Sexo === '2') {$optionSexual = "#sexoCliente option[value='MA']";} elseif ($Sexo === '3') {$optionSexual = "#sexoCliente option[value='FE']";}

            ?>
			<script type="text/javascript">

				$('#nomUserRsv').val("<?php echo $Nombres . " " . $ApellidoPaterno . " " . $ApellidoMaterno; ?>");
				$('#idFechaNacRes').val("<?php echo $FechaNacimientoFor; ?>");
				$("<?php echo $optionSexual; ?>").attr('selected', true);
				$('.dh_docu_identidad').removeClass('d-none');
			</script>
			<?php
}


        break;
    /*°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° */
    /*°°°°°°°°°°° */
    /*°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° */
    case 'view_person_ruc_NOACCESIBLE':
        # code...
        $ruc = $_POST['ruc'];

        $endpoint = "https://api.migoperu.pe/api/v1/ruc";
        $token    = "6c933712-f143-4b77-b957-8456f67c0528-ada1a7cc-7828-4a2a-8c6e-2ad54cb68e66";

        $data = array(
            "token" => $token,
            "ruc"   => $ruc,
        );
        $ch = curl_init($endpoint);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
            )
        );
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        $este = json_decode($json, true);
        // print_r($json);

        $este["success"];
        $este["ruc"];

        $este["estado_del_contribuyente"];
        $este["condicion_de_domicilio"];
        $este["ubigeo"];
        $este["tipo_de_via"];
        $este["nombre_de_via"];
        $este["codigo_de_zona"];
        $este["tipo_de_zona"];
        $este["numero"];
        $este["interior"];
        $este["lote"];
        $este["dpto"];
        $este["manzana"];
        $este["kilometro"];
        $este["distrito"];
        $este["provincia"];
        $este["departamento"];
        $este["direccion"];
        ?>
		<script type="text/javascript">

			$('#nomUserRsv').val("<?php echo $este["nombre_o_razon_social"]; ?>");
			$('#idFechaNacRes').val("<?php echo $FechaNacimientoFor; ?>");
			$('#direccionCliente').val("<?php echo $este["direccion"]; ?>");
			$('.dh_docu_identidad').removeClass('d-none');
		</script>
		<?php
break;
        /*°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° */
 /*°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°° */


}