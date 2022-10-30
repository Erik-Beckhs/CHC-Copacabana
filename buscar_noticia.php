<?php 
session_start();
include('includes/config2.php');
$busqueda=$_POST['busquedaN'];
    ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CHC | Noticias</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  </head>

  <body>

    <!-- Navigation -->
   <?php include('includes/headerNoticia.php');?>

    <!-- Page Content -->
    <div class="container" style="margin:100px auto; min-height:490px;">

      <div class="row" style="margin-top: 4%">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Blog Post -->
<?php 
     if (isset($_GET['pagina'])) {
            $pagina = $_GET['pagina'];
        } else {
            $pagina = 1;
        }
        $no_registros = 5;
        $total = ($pagina-1) * $no_registros;

        $total_p = "SELECT COUNT(*) FROM noticia where activo=1 and titulo like '%$busqueda%'";
        $result = mysqli_query($con,$total_p);
        $total_filas = mysqli_fetch_array($result)[0];
        $total_paginas = ceil($total_filas / $no_registros);


$query=mysqli_query($con,"select * from noticia where activo=1 and titulo like '%$busqueda%' order by fecha desc  LIMIT $total, $no_registros");
while ($row=mysqli_fetch_array($query)) {
?>

  <div class="card" style="box-shadow: 0px 0px 5px 1px black;">
  <div class="card-header bg-info text-white">
  <h4 class="card-title"><?php echo htmlentities($row['titulo']);?></h4>
  </div>
  <div class="card-body">
  <div class="row">
  <div class="col-md-3">
  <img class="card-img-top" src="images/noticias/<?php echo htmlentities($row['image']);?>" alt="<?php echo htmlentities($row['titulo']);?>" style="width:200px; height:200px;">
  </div>
  <div class="col-md-9">
    <h5 class="card-title"><span class="text-info h6">Fecha de Publicación: <?php echo obtenerFechaEnLetra(htmlentities($row['fecha']));?></span></h5>
    <p class="card-text text-justify"><?php echo substr(htmlentities($row['detalle']), 0, 400)."...";?></p>
    <a href="noticiaDetalle.php?nid=<?php echo htmlentities($row['id'])?>" class="btn btn-dark float-right">Ver Noticia</a>
    </div>
    </div>
  </div>
</div>

<?php } ?>
       

      <?php
      if ($total_filas!=0):
      ?>

          <!-- Pagination -->
          <div class="row float-right">
          
          <nav aria-label="page navigation example text-center">
<ul class="pagination ml-5 mb-3 my-2">
      <li class="page-item <?php echo $pagina<=1? 'disabled':'' ?>"><a class="page-link" href="noticia.php?pagina=<?= $pagina-1;?>">Anterior</a></li>
      <?php for($i=0;$i<$total_paginas;$i++):?>
      <li class="page-item 
      <?php echo $pagina==$i+1 ? 'active': '' ?> ">
      <a href="noticia.php?pagina=<?= $i+1; ?>" class="page-link">
      <?= $i+1;?></a>
      </li>
      <?php endfor ?>
      <li class="page-item <?php echo $pagina>=$total_paginas? 'disabled':'' ?>"><a href="noticia.php?pagina=<?= $pagina+1;?>" class="page-link">Siguiente</a></li>
</ul>
</nav>
</div>
<?php 
else:
  echo "No existen registros que coinciden con la palabra <strong>".$busqueda."</strong>";

endif ?>
</div>
        <!-- Sidebar Widgets Column -->
      <?php include('includes/sidebarNoticia.php');?>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

      <?php include('includes/modalNoticia.php');?>
      <?php include('includes/footerNoticia.php');?>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 
</head>
  </body>

</html>
<?php
function obtenerFechaEnLetra($fecha){
    $dia= conocerDiaSemanaFecha($fecha);
    $num = date("j", strtotime($fecha));
    $anno = date("Y", strtotime($fecha));
    $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
    return $dia.', '.$num.' de '.$mes.' del '.$anno;
}
 
function conocerDiaSemanaFecha($fecha) {
    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    $dia = $dias[date('w', strtotime($fecha))];
    return $dia;
}
?>