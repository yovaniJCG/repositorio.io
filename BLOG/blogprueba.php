<?php 

try{

    ini_set("display_errors", 0);

	$conexion = new PDO('mysql:host=localhost; dbname=bbddblog', "root", "");
     
    /*$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/

   $conexion -> exec("SET CHARACTER SET utf8");

	$sql="SELECT * FROM contenido";

	$resultado = $conexion->prepare($sql);

	$resultado->execute();

	$fila=$resultado->fetchAll();

    $total_articulos= $resultado->rowCount();



    //aqui va ser para cuanto queremos que nos muestre por pagina.

    $articulos_por_pagina=3;
    $paginasTotal = $total_articulos/$articulos_por_pagina;
    $paginas = ceil($paginasTotal); 

    

}catch(Exection $e){
 
 echo "ERROR :" . $e->getMessage() . "<br>";
 echo "Linea Error" . $e->getLine() . "<br/>";
 die();
}

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    

    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    
    <link rel="stylesheet" type="text/css" href="blog.css?t=1">
	<title></title>
	
	</head>
    <body>


  


    <header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar px-0">

    <div class="container flex-wrap flex-md-nowrap py-0 px-3">
    <div class="navbar-nav-scroll order-3 order-md-0 d-flex justify-content-center justify-content-md-start">
    	    			
    <ul class="navbar-nav bd-navbar-nav flex-row">
    <li class="nav-item">
 <a class="nav-link text-decoration-none" href="../index.html" onclick="ga('send', 'event', 'navbar')"><span class="home">Home</span></a>
    	    					
    </li>

    <li class="nav-item">
    <a class="coloryo nav-link text-decoration-none" href="#" ><span class="home">Documets</span></a>
    </li>


    <li class="nav-item">
    <a class="coloryo nav-link text-decoration-none" href="#" ><span class="home">Tutoriales</span></a>
    </li>

    <li class="nav-item">
    <a class="coloryo nav-link text-decoration-none" href="#" ><span class="home">Contactos</span></a>
    </li>
    </ul>
    </div>
    </div>


    </header>

	

			<div class="masthead bg-light">

			<div class="conten container-fluid">
             
            <img src="Imagenes/miLogo.jpg"  class="img img-thumbnail">
             <p></p>
             <h1 class="blo">

             <font style="vertical-align: inherit;">

             EL BLOG DE INNOVASPOFT-YJ

             </h1>

             </font>

             <p class="f5">
             <font>
             <font style="vertical-align: inherit;">
             	Noticias Ofertas del mejor servicio en ventas de 
             	sitios web y demas desarrollos.
             </font>
             </font><br>
             <font style="vertical-align: inherit;">
             	Quieres llevar un buen control para tu negocio 
             	estas en el lugar indicado.
             </font><br>
             <font style="vertical-align: inherit;">
             	Incluimos los nuevos lanzamientos de desarrollos
             	adecuandose a todas tus necesidades
             </font>


             </p>
				
			</div>
            </div>
<!------------------------------------------------------------------------>

<nav class="bd-subnavbar pt-2 pb-3 pb-md-2">
	<div class="container d-flex align-items-md-center py-2">
		<nav class="nav mx-auto">
			<a class="text-dark py-1 mr-3 text-decoration-none" href="#">Otros</a>
			<a class="text-dark py-1 mr-3 text-decoration-none" href="#">Archivos</a>
			<a class="text-dark py-1 mr-3 text-decoration-none" href="#">Videos</a>
			
		</nav>
		
	</div>

</nav>


<!------------------------------------------------------------------------->

<p align="center">
<?php echo "Total registros " . $total_articulos; ?>
</p>


<!--------------------------------------------------------------------------->



<div class="posts-container mx-auto px-3 my-5">
	<div class="posts">

   <p>
	<iframe width="100%" height="315" src="https://www.youtube.com/embed/kDg4oKYY0IY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br>
    <font style="vertical-align: inherit;">
	<font style="vertical-align: inherit;"> Hola Blogueros aqui UN nuevo video</font>

	</font>
   </p>
</div>
</div>

<hr>

<!--*****************************PAGINACION********************-->


    <?php 

  if (!$_GET) {
    header("location:blogprueba.php?pagina=1");
  }

  if ($_GET['pagina']>$paginas || $_GET['pagina']<1) {
    header("location:blogprueba.php?pagina=1");
  }

  

  $iniciar = ($_GET['pagina']-1)*$articulos_por_pagina;

 

  $sql_articulos="SELECT * FROM contenido LIMIT :iniciar, :narticulos"; 

  $resultado_articulos = $conexion -> prepare($sql_articulos);

  $resultado_articulos -> bindparam(':iniciar',$iniciar, PDO::PARAM_INT);

  $resultado_articulos -> bindparam(':narticulos', $articulos_por_pagina, PDO::PARAM_INT);//lo ultimo es para que lo pase a emtero a numero

  $resultado_articulos->execute();

  $registros=$resultado_articulos->fetchAll();


   ?>

<!--------------------------------------------------------------->

 

	<?php foreach($registros as $debuelve): ?>

	<div class="posts-container mx-auto px-3 my-5">
	<div class="posts">

	

    <h1 class="posts-title fw-500"><?php  echo $debuelve['Titulo'];
 ?></h1>

    <span class="post-date">
    	<font style="vertical-align: inherit;">
    		<?php echo  $debuelve['Fecha']; ?>
    	</font>
    </span>

    
    	<p>
    	
    	<?php 
    	if ($debuelve['Imagen']!="") {
        echo "<img src='Imagenes/" . $debuelve['Imagen'] . "' width='100%' />";
        } 

       ?>
      </p>

    <p>
    <font style="vertical-align: inherit;">
    <font style="vertical-align: inherit;">
    
    <?php

    echo  $debuelve['Comentarios'];

    echo "<hr/>";
     ?>

  </font>
  </font>
 </p>

    </div>

    </div>

<?php endforeach ?>


<!---------------------Paginacion-------------------------------->

<div class="container my-5">
 
 <p id="yg"><span class="y">Y </span> <span class="g">   G</span> <span class="c">   C</span> <span class="d">D e s i n g s</span></p>
    
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item <?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?>"><a class="page-link" href="blogprueba.php?pagina=<?php echo $_GET['pagina']-1 ?>">Anterior</a></li>
    
    <?php for($i=0; $i<$paginas; $i++):?>

    <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>"><a class="page-link" href="blogprueba.php?pagina=<?php echo $i+1?>"><?php echo $i+1?></a></li>
    
    <?php endfor ?>


    <li class="page-item <?php echo $_GET['pagina']>=$paginas ? 'disabled' : '' ?>"><a class="page-link" href="blogprueba.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a></li>
  </ul>
</nav>

</div>
<!---------------------------------------------------------------->





<footer class="bd-footer p-3 p-md-5 mt-5 text-center text-muted bg-light">
<div class="ult container-fluid">
	<ul class="bd-footer-links">
		<li>
			<a href="#">
			<font style="vertical-align: inherit;">				
				<font style="vertical-align: inherit;"><span class="fase"><i class="fab fa-facebook"></i></span></font>
			</font>
			</a>
		</li>

		<li>
			<a href="#">
			<font style="vertical-align: inherit;">				
				<font style="vertical-align: inherit;"><span class="insta">Instagran</span></font>
			</font>
			</a>
		</li>
        
        <li>
			<a href="#">
			<font style="vertical-align: inherit;">				
				<font style="vertical-align: inherit;"><span class="twi">Twiter</span></font>
			</font>
			</a>
		</li>		

    
      <li>
            <a href="tel:+50299582020">
            <font style="vertical-align: inherit;">             
                <font style="vertical-align: inherit;"><span class="wha">WhatsApp</span></font>
            </font>
            </a>
        </li>       

	</ul>

	<p class="mb-0">
		<font style="vertical-align: inherit;">
			Diseñado y construido con todo el amor del mundo por el Equipo de Y G C
			
		</font><br>
		<font>
			con la ayuda de nuestros colaboradores.
		</font><br>

		<font>
			Hoduras Centro America ©2020
			   
		</font>

	</p>


</div>
</footer>


</body>
</html>