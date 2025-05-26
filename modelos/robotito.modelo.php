<?php 
/*
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!     !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! ESCOJE BATA BASE !!!!!!!!!!!!!!!!!!!!!!!!!
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!     !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/
session_set_cookie_params(60*60*24*30);
session_start();

// // unset($_SESSION["mod_conexion"]);

// session_destroy();

$quebasedt=$_POST['quebasedt'];


	if ($quebasedt=='moali') {
		# code...
		echo $_SESSION["mod_conexion"]="moaliwhm_moali";	
		    $aestabase=$_SESSION["mod_conexion"];
	}elseif ($quebasedt=='prueba') {
		# code...
		echo $_SESSION["mod_conexion"]="moaliwhm_moali_pruebas";
		    $aestabase=$_SESSION["mod_conexion"];
	}
	





 ?>