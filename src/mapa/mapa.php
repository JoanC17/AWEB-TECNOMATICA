<?php
    session_start();

    if(isset($_SESSION['correo'])){
        header("location: Login_registro");
    }


?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubicacion</title>
	<link rel="stylesheet" type="text/css" href="mapa.css">
</head>
<body>
	
	<div id="map"></div>
	<h1>AQUI NOS ENCUENTRAS</h1>
<!-- Botón de Regresar -->
<a href="../menu.html"><button id="boton-regresar">Regresar</button></a>


<script src="scrip_mapa.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap"></script>
</body>
</html>