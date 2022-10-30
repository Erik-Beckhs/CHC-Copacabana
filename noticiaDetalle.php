<?php 
session_start();
include('includes/config2.php');
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
 $_SESSION['token'] = bin2hex(random_bytes(32));
}

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Noticias | CHC</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
   <?php include('includes/headerNoticia.php');?>

    <!-- Page Content -->
    <div class="container" style="min-height:500px;">


     
      <div class="row" style="margin-top: 10%">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Blog Post -->
<?php
$pid=intval($_GET['nid']);
 $query=mysqli_query($con,"select * from noticia where id='$pid'");
while ($row=mysqli_fetch_array($query)) {
?>

          <div class="card mb-4">
      
            <div class="card-body">
              <h2 class="card-title"><?php echo htmlentities($row['titulo']);?></h2>
              <p><b>Fecha de Publicación : </b> <?php echo obtenerFechaEnLetra(htmlentities($row['fecha']));?></p>
                <hr />

 <img class="img-fluid rounded mx-auto" src="images/noticias/<?php echo htmlentities($row['image']);?>" alt="<?php echo htmlentities($row['titulo']);?>" width="500" style="display:block;">
  
              <p class="card-text text-justify"><?php 
                $pt=$row['detalle'];
              echo  (substr($pt,0));?></p>
             
            </div>

          </div>
<?php } ?>
       

      

     

        </div>

        <!-- Sidebar Widgets Column -->
      <?php include('includes/sidebarNoticia.php');?>
      </div>
      <!-- /.row -->
<!---Comment Section --->

 <div class="row" style="margin-top: -8%">
   <div class="col-md-8">

  <!---Comment Display Section --->

        </div>
      </div>
    </div>
    <div style="height:80px;">
    </div>
      <?php include('includes/footerNoticia.php');?>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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

