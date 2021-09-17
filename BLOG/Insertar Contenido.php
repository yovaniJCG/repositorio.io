<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

ini_set("display_errors", 0);



$conexion = mysqli_connect("localhost", "root", "", "bbddblog");

/*Comprobar conexion*/

if (!$conexion) {
	
echo "Conexion a la Base de datos Fallida" . mysqli_error();

exit();

}

/*comprobar si hay error al subir imagen*/

if ($_FILES["imagen"]["error"]) {
	
	switch ($_FILES["imagen"]["error"]) {
	case 1: //error de exeso de tamaño del archivo
	echo "ERROR Archivo demaciado grande";
	break;

	case 2:
	echo "El tamaño del archivo exede los dos megas";
	break;

	case 3: //Corrupcion al subir el archivo.
	echo "EL evio del archivo se interrumpio";
	break;

	case 4:
	echo "No se ha enviado ningun archivo";
	break;
	}

}else{

  //si no ha habido ni un erro entonces que aga el prosedimeinto de subir las imagenes
   if ((isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error']==UPLOAD_ERR_OK))){
  	
  	$destino_ruta = "imagenes/";

  	move_uploaded_file($_FILES['imagen']['tmp_name'], $destino_ruta . $_FILES['imagen']['name']);

  	echo "El archivo" . $_FILES['imagen']['name'] . "Se ha copiado en el directorio de imagenes <br><br>";

  }else{

  	echo "El archivo no se a podido copiar al directorio de imagen";
  }

}

/********************VALIDAR FORMULARIO*****************************/


$validar = (isset($_POST['campo_titulo']) && !empty($_POST['campo_titulo']) && isset($_POST['area_comentarios']) && !empty($_POST['area_comentarios']));


/*********************END VALIDAR************************************/

if($validar) {
	
 $titulo =  htmlspecialchars($_POST['campo_titulo']);

 $fecha = date("d-m-y H:i:s");

 $Comentario = htmlspecialchars($_POST['area_comentarios']);
 
 $imagen = $_FILES['imagen']['name'];

 $consulta="INSERT INTO contenido(Titulo, Fecha, Comentarios, Imagen) VALUES('" . $titulo . "', '" . $fecha ."', '" . $Comentario . "', '" . $imagen ."')";

 $resultado = mysqli_query($conexion, $consulta);

 mysqli_close($conexion);

 echo "Se ha agregado con exito... <br><br><br>";

}else{
	header("location:Formulario.php");

	echo "Deves llenar todos los campos";
}

?>

<a href="blogprueba.php"> Ir al BLOG </a><br>
<a href="Formulario.php"> Añadir una nueva entrada</a>

</body>
</html>