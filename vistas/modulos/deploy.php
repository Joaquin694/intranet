<div class="content-wrapper">
  <section class="content-header"> 
    <h1>
      Administrar categorías
    </h1>
    <ol class="breadcrumb">
     <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
     <li class="active">Administrar categorías</li>


    </ol>



  </section>



  <section class="content">



    <div class="box">



      <div class="box-header with-border">

  

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">

          

         <i class="fa fa-chevron-right" aria-hidden="true"></i> Agregar categoría



        </button>



      </div>



      <div class="box-body">

       <?php 

$endpoint = "https://api.migoperu.pe/api/v1/ruc";
$token = "6c933712-f143-4b77-b957-8456f67c0528-ada1a7cc-7828-4a2a-8c6e-2ad54cb68e66";

$ruc = '20154935267';
$data = array(
"token" => $token,
"ruc" => $ruc
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
$este= json_decode($json,true);
// print_r($json);

echo $este["success"]."<br>";
echo $este["ruc"]."<br>";
echo $este["nombre_o_razon_social"]."<br>";
echo $este["estado_del_contribuyente"]."<br>";
echo $este["condicion_de_domicilio"]."<br>";
echo $este["ubigeo"]."<br>";
echo $este["tipo_de_via"]."<br>";
echo $este["nombre_de_via"]."<br>";
echo $este["codigo_de_zona"]."<br>";
echo $este["tipo_de_zona"]."<br>";
echo $este["numero"]."<br>";
echo $este["interior"]."<br>";
echo $este["lote"]."<br>";
echo $este["dpto"]."<br>";
echo $este["manzana"]."<br>";
echo $este["kilometro"]."<br>";
echo $este["distrito"]."<br>";
echo $este["provincia"]."<br>";
echo $este["departamento"]."<br>";
echo $este["direccion"]."<br>";


        ?> 

       

      </div>



    </div>



  </section>



</div>









