<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<style type="text/css">
		.hh{
			text-align: center;
		}

		.color{
			background: pink;
			width: 100%;
			height: 450px;
			background-image: url('programing.jpg');
			background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;

            text-align: right;
            padding-top: 250px;

		}

		.hi{
			font-size: 24px;
			color: #BFC9CA ;
		}

		.img{
			text-align: right;
		}

		body{
			background: #D6EAF8 ;
			padding: 0;
			margin: 0;
		}

	
 .img{
    
	background-size:cover;
	height:400px;
	width: 100%;
	position: absolute;
	left:0;
	top:0;

	}
	</style>

</head>
<body>

	
		<header>

			<div class="header-content">
             
             <img src="programing.jpg" class="img">

				
			</div>

	  </header><br><br><br>
      

       <hr>
	  <h2 class="hh">BLOG</h2>
       

    
	

	

	<?php  
     
     ini_set("display_errors", 0);

     $conexion = mysqli_connect("localhost", "root", "", "bbddblog");

     /*Comprobar conexion*/

     if (!$conexion) {
	
     echo "Conexion a la Base de datos Fallida" . mysqli_error();

     exit();

    }

    $sql="SELECT * FROM contenido ORDER BY Fecha DESC";//asi tomaria de la fecha mas antigua a la mas reciente si queremos que nos muestre de la mas reciente a la mas antigua solo ponemos DESC despues de Fecha.

    if ($resultado=mysqli_query($conexion, $sql)) {

    while ($registros=mysqli_fetch_assoc($resultado)) {

    	echo "<h3>" . $registros['Titulo'] . "</h3><br>";

    	 echo "<h4>" . $registros['Fecha'] . "</h4><br>";

    	echo "<div style='width:400px'>" . $registros['Comentarios'] . "</div></br></br>";

    	if ($registros['Imagen']!="") {
    		echo "<img src='Imagenes/" . $registros['Imagen'] . "' width='300px' />";
    	}


        echo "<hr/>";
    	

    		
    	}
    }

	?>


   <section class="bg-primary">

   	<div class="container">
   		
   	<div class="row">

   	<div class="col-lg-8 col-lg-offset-2 text-center">

   	
   		
   	</div>	
   		
   	</div>	

   	</div>
   	
   </section>


</body>
</html>