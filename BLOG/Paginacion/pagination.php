
<?php   

include_once"conexion.php"; 

$sql="SELECT * FROM contenido";

$resultado = $mbd->prepare($sql);

$resultado->execute();

$fila=$resultado->fetchAll();

$totalArticulos = $resultado->rowCount();//esto cuenta cuantos registros hay en la BBDD.



//aqui va ser para cuanto queremos que nos muestre por pagina.

$articulos_por_pagina=3;
$paginasTotal = $totalArticulos/$articulos_por_pagina;
$paginas = ceil($paginasTotal);




?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
</head>
<body>

<div class="container my-5">
	
	<h1 class="mb-5">Pagination</h1>

  <?php 

  if (!$_GET) {
    header("location:pagination.php?pagina=1");
  }

  if ($_GET['pagina']>$paginas || $_GET['pagina']<1) {
    header("location:pagination.php?pagina=1");
  }

  

  $iniciar = ($_GET['pagina']-1)*$articulos_por_pagina;

 

  $sql_articulos="SELECT * FROM contenido LIMIT :iniciar, :narticulos";

  $resultado_articulos = $mbd -> prepare($sql_articulos);

  $resultado_articulos -> bindparam(':iniciar',$iniciar, PDO::PARAM_INT);

  $resultado_articulos -> bindparam(':narticulos', $articulos_por_pagina, PDO::PARAM_INT);//lo ultimo es para que lo pase a emtero a numero

  $resultado_articulos -> execute();

  $registros=$resultado_articulos->fetchAll();


   ?>
  <?php foreach ($registros as $debuelve):?>
	
<h1>
     <?php echo $debuelve["Titulo"]; 


     ?>

</h1>


 <p><?php echo $debuelve['Fecha']; ?></p>


 <p>
      
      <?php 
      if ($debuelve['Imagen']!="") {
        echo "<img src='../Imagenes/" . $debuelve['Imagen'] . "' width='80%' />";
        } 

       ?>
      </p>

  <?php endforeach ?>



    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item <?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?>"><a class="page-link" href="pagination.php?pagina=<?php echo $_GET['pagina']-1 ?>">Anterior</a></li>
    
    <?php for($i=0; $i<$paginas; $i++):?>

    <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>"><a class="page-link" href="pagination.php?pagina=<?php echo $i+1?>"><?php echo $i+1?></a></li>
    
    <?php endfor ?>


    <li class="page-item <?php echo $_GET['pagina']>=$paginas ? 'disabled' : '' ?>"><a class="page-link" href="pagination.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a></li>
  </ul>
</nav>

</div>	


</body>
</html>