<!DOCTYPE html>
<html>
<head>
  <title>Mapa de Camiones</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

  <style>
    /* Asegurar que el iframe sea completamente responsive */
    body, html {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    #visor {
        width: 100%;
        height: 100%;
        border: none; /* Quitar el borde del iframe */
    }
  </style>
</head>
<body>
<div class="content-wrapper">
<section class="content">
<div class="row">

<!-- contwenido -->
<iframe id="visor" src="https://gps.ubicacionglobal.com/tracking.php"></iframe>
<!-- fin contenido -->
</div>
</section >
</div >
</body>
</html>
