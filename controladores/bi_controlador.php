<?php 
date_default_timezone_set('America/Lima');
session_start();
switch ($_POST['accion']) {
	case 'generar_comprobant__bpm':
		# code...
		$idBpm=$_POST['idBpm'];
		$nomElemnt=$_POST['nomElemnt'];
		include '../modelos/facturador.modelo.php'; 
				$viewListBpm = new ModeloFacturaBpm;
                $datBPMi=$viewListBpm -> mdlMostrarFacturaBpm($idBpm);
                $datBPM = json_decode($datBPMi,true);

                $datBPMitens=$viewListBpm -> mdlMostrarItemParaFacturaBpm($idBpm);
                $datBPMii = json_decode($datBPMitens,true); 

		include '../vistas/modulos/facturador.php'; 
	break;
	// -------------------------------------------	
	case 'load_sales_fulll':
		require_once "../modelos/bi_modelo.php";
           
		$instancia= new ModeloPanelBI();
		$data_mart=$instancia->load_sales_fulll($_POST['aniote']);
	break;
	// -------------------------------------------	
	case '7':
		# code...
	echo "7";
	break;
	// -------------------------------------------	
	default:
		# code...
		echo "FOUNDsssssssssssssssssssssssssssssssssssssssssssss";
		break;
}