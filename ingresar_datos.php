<?php

//$nombre=$_POST["nombre"];
$mensaje=$_POST["texto"];


include 'conexion.php';

$consulta1="INSERT INTO anuncio_texto (mensaje) VALUES ('$mensaje')";

  


 $consulta="UPDATE anuncio_texto SET mensaje='$mensaje' WHERE id=1" ;


$resultado=mysqli_query($conexion,$consulta);
if($resultado){
echo "Mensaje enviado con exito";
}else{
echo " Error, no se pudo actualizar";
}
mysqli_close($conexion);



?>
