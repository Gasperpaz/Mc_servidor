
<?php

$id=$_POST["id"];


include 'conexion.php';

//$consulta1="INSERT INTO //anuncio_texto (mensaje) VALUES //('$mensaje')";

  


 $consulta="DELETE FROM mensajes WHERE id='$id'" ;


$resultado=mysqli_query($conexion,$consulta);
if($resultado){
echo " Mensaje eliminado";
}else{
    
    echo "error al eliminar mensaje";
}
     

mysqli_close($conexion);



?>
