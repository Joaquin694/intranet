<?php

require_once "../modelos/plan-mantenimiento.modelo.php";
require_once "../modelos/conexion.php";

switch ($_POST["ajaxservice"]) {
   case 'loadData':
      $respuesta = ModeloPlanMantenimiento::mdlMostrarPlanMantenimiento("vista_plan_mantenimiento ", null, null);
      echo json_encode($respuesta);
      break;
   case 'loadEdit':
      $respuesta = ModeloPlanMantenimiento::mdlMostrarPlanMantenimiento("plan_mantenimiento", "id", $_POST["idaa"]);
      echo json_encode($respuesta);
      break;
   case 'eliminar':
      $respuesta = ModeloPlanMantenimiento::mdlEliminarPlanMantenimiento("plan_mantenimiento", "id", $_POST["idEliminar"]);
      echo json_encode($respuesta);
      break;
   case 'loadInfoPlan':
      $respuesta = ModeloPlanMantenimiento::mdlMostrarInfoPlan("form_info_matenimiento", "id_plan", $_POST["idaa"]);
      echo json_encode($respuesta);
      break;
}
