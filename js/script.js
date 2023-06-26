


function imagen_cv() {
  var img_foto = document.getElementById("fotos");
  var foto_seleccionada= document.getElementById("foto").files[0];
  var reader = new FileReader();

  reader.addEventListener("load", function () {
    // convierte la imagen a una cadena en base64
    img_foto.src = reader.result;
  }, false);

  if (foto_seleccionada) {
    reader.readAsDataURL(foto_seleccionada);
  }
}


function imagen_cv2() {
  var img_foto = document.getElementById("fotos2");
  var foto_seleccionada= document.getElementById("foto2").files[0];
  var reader = new FileReader();

  reader.addEventListener("load", function () {
    // convierte la imagen a una cadena en base64
    img_foto.src = reader.result;
  }, false);

  if (foto_seleccionada) {
    reader.readAsDataURL(foto_seleccionada);
  }
}


function imagen_cv3() {
  var img_foto = document.getElementById("fotos3");
  var foto_seleccionada= document.getElementById("foto3").files[0];
  var reader = new FileReader();

  reader.addEventListener("load", function () {
    // convierte la imagen a una cadena en base64
    img_foto.src = reader.result;
  }, false);

  if (foto_seleccionada) {
    reader.readAsDataURL(foto_seleccionada);
  }
}


 document.getElementById("boton_enviar_texto").addEventListener("click",function(){
	 
	var dato= document.getElementById("texto").value;
	 var datos=$("#campos1").serialize();
	 
	 $.ajax({
		 url:"ingresar_datos.php",
		 type:"POST",
		 data:datos,
		 success:function(r){
			 
			 alert(r);
		 }
	 });
 });

document.getElementById("boton_enviar_imagen").addEventListener("click",function(){
    var dato=$("#campos").serialize();
});

 
function ver(i){
 
    
var dato= $("#formulario").serialize();
   // var valor={ 'id':document.getElementById//("valor").value};
var valor={ 'id':i};
    
    $.ajax({
        url:"eliminar_mensaje.php",
        type:"POST",
        data:valor,
        success:function(r){
            alert(r);
            window.location.href="index.php";
 
        }
        
    });

}



function anuncios(){
    document.getElementById("mensajes").style.display="none";
document.getElementById("anuncios").style.display="block";
    

}

function mensajes(){
    
document.getElementById("mensajes").style.display="block";
document.getElementById("anuncios").style.display="none";
    
}
 
 
    
