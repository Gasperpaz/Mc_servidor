
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>MC Radio servidor</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<?php

include 'conexion.php';

$consulta="SELECT mensaje FROM anuncio_texto";

$resultado=mysqli_query($conexion,$consulta);

$fila=mysqli_fetch_row($resultado);

mysqli_close($conexion);


?>



	
	<div class=""><!-- conenedor  -->
	   
	<nav class="navbar navbar-expand navbar-dark  bg-dark  ">
	  <div class="container-fluid">
		<a class="navbar-brand " href="#"></a>
		<button id="boton" onclick="boton_menu()" class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse  " id="navbarNavAltMarkup">
		  
		  <div class="navbar-nav m-auto " id="menunav">
			
			<a class="nav-link  " aria-current="page" data-bs-toggle="collapse" onclick="anuncios()" ><h4>| ANUNCIOS |</h4></a>
			<a class="nav-link" data-bs-toggle="collapse"  onclick="mensajes()"  ><h4>| MENSAJES |</h4></a>
			

		  </div>
		</div>
	  </div>
	</nav>
	
	
		<div id="anuncios" >
	
	
	  
	  <form id="campos1" class="form-inline text-center btn btn-info w-100"   role="form">
		<div class="form-group">
		  <label class="sr-only" for="texto"  >Ingresar el texto</label>
		  <textarea  name="texto"  class="form-control" rows="5"
			id="texto"><?php echo "$fila[0]" ?></textarea>
			
		</div>
		
		<button type="submit" class="btn btn-warning btn-block" id="boton_enviar_texto" >Cargar texto</button>
	  </form>
	  <div class="col-12 btn btn-danger" >
	  </div>
	  





<?php

include 'conexion.php';

$consulta="SELECT * FROM anuncios";

$resultado=mysqli_query($conexion,$consulta);
$cont=0;

while($fila=mysqli_fetch_array($resultado)){

$anuncio_id[]=$fila['id'];
$anuncio_nombre[]=$fila['nombre'];
$anuncio_img[]=$fila['imagen'];

$foto[$cont]=$fila[0];



$cont++;
};


$img= base64_encode($anuncio_img[0]);
$img2=base64_encode($anuncio_img[1]);
$img3=base64_encode($anuncio_img[2]);

mysqli_close($conexion);

 
?>
	  <form id="campos" method="post" action="actualizar_imagen.php" enctype="multipart/form-data" class="form-inline text-center btn btn-success w-100" role="form" >

<input name="id"  value="<?php echo $anuncio_id[0] ?>"  style="display:none">

		<div class="form-group">
		  <input name="imagen" class="form-control" type="file" accept="image/*"
			onchange="imagen_cv()" id="foto">
		</div>
        <div class="form-group">
		<img src="data:image/jpeg; base64,<?php echo $img ?>" id="fotos"  width="300px" height="300" alt="foto del
		  anuncio"> 

        </div>
		<button  class="btn btn-warning btn-block" id="boton_enviar_imagen" >Cargar imagen</button>
	  </form>

 <div class="col-12 btn btn-danger" >
	  </div>


 <form id="campos" method="post" action="actualizar_imagen.php" enctype="multipart/form-data" class="form-inline text-center btn btn-success w-100" role="form">


<input name="id"  value="<?php echo $anuncio_id[1] ?>"  style="display:none">

		<div class="form-group">
		  <input name="imagen" class="form-control" type="file" accept="image/*"
			onchange="imagen_cv2()" id="foto2">
		</div>
        <div class="form-group">
		<img src="data:image/jpeg; base64,<?php echo $img2 ?>" id="fotos2"  width="300px" height="300" alt="foto del
		  anuncio"> 

        </div>
		<button  class="btn btn-warning btn-block" id="boton_enviar_imagen2" >Cargar imagen</button>
	  </form>

 <div class="col-12 btn btn-danger" >
	  </div>

 <form id="campos" method="post" action="actualizar_imagen.php" enctype="multipart/form-data" class="form-inline text-center btn btn-success w-100" role="form">


<input name="id"  value="<?php echo $anuncio_id[2] ?>"  style="display:none">

		<div class="form-group">
		  <input name="imagen" class="form-control" type="file" accept="image/*"
			onchange="imagen_cv3()" id="foto3">
		</div>
        <div class="form-group">
		<img src="data:image/jpeg; base64,<?php echo $img3 ?>" id="fotos3"  width="300px" height="300" alt="foto del
		  anuncio"> 

        </div>
		<button  class="btn btn-warning btn-block" id="boton_enviar_imagen3" >Cargar imagen</button>
	  </form>
	  
	  </div>
	
	</div><!-- conenedor  -->
	
<!-- Lista de los mensajes recibidos -->
	 
	 <div id="mensajes" style="display:none">
	   <h1 id="titulo"   class="text-center ">MENSAJES</h1>

<table class="table text-center table-bordered  
 table-success table-striped " id="tabla">
		 <thead>
		   <tr>
			 <th scope="col">#</th>
			 <th scope="col">NOMBRE</th>
			 <th scope="col">MENSAJE</th>
			 <th scope="col">FECHA</th>
		   </tr>
		 </thead>
		 
	   	 <tbody   >
		   <tr>
		 
	  
<?php

include 'conexion.php';

$consulta="SELECT * FROM mensajes";

$resultado=mysqli_query($conexion,$consulta);
$cont=0;

while($fila=mysqli_fetch_array($resultado)){?>

			 <th  scope="row" class="col ">
			 
			       <img src="eliminar.png" alt="eliminar" width="50px" height="50px" onclick="ver(<?php echo $fila['id'];?> )">
			 
			
			 </th>
			 <td   class="col"><?php echo $fila['nombre'];?></td>
			 <td class="col"><?php echo $fila['mensaje'];?></td>
			 <td class="col"><?php echo $fila['fecha']; ?></td>
		
		   </tr>
		   
		 </tbody>
		 
		 	 <?php };


mysqli_close($conexion);

 
?>
	   </table>
	   

	  
	   
	   
	 </div>

	
	

	

    <!--


src="data:image/jpeg; base64,

<div class="navbar navbar-inverse navbar-fixed-top  " role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">My Website</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script  src="js/script.js" type="text/JavaScript"></script>
    
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
