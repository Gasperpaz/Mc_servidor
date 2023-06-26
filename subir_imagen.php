<?php

$nombre_imagen=$_FILES["imagen"]["name"];
$tipo_imagen=$_FILES["imagen"]["type"];
$tamaño_imagen=$_FILES["imagen"]["size"];

$destino_imagen=$_SERVER["DOCUMENT_ROOT"]."/php/";

move_uploaded_file($_FILES["imagen"]["tmp_name"],$destino_imagen.$nombre_imagen);

$abrir_destino=fopen($destino_imagen.$nombre_imagen,"r");

$leer_imagen=fread($abrir_destino,$tamaño_imagen);

$leer_imagen=addslashes($leer_imagen);
fclose($abrir_destino);


include 'conexion.php';

$consulta="INSERT INTO anuncios (nombre,imagen)values('$nombre_imagen','$leer_imagen')";

$resultado=mysqli_query($conexion,$consulta);

mysqli_close($conexion);




?>
