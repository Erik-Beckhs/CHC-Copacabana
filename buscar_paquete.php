<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Camara Hotelera de Copacabana</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/modern-business.css" rel="stylesheet">

<link href="css/style2.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />

<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="css/fontawesome/css/brands.css" rel="stylesheet">
  <link href="css/fontawesome/css/solid.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<style>
  .card-body{
    height:100%;
  }
  .list{
    font-size: 12px;
    padding-left:10px;
  }
  .italic{
    font-style: italic;
  }

</style>

<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
</head>
<body>
 <!-- Navigation -->
 <?php include('includes/header2.php');
 if($_GET['searchtitle']!=''){
  $st=$_SESSION['searchtitle']=$_GET['searchtitle'];
  }
 ?>

<!-- Page Content -->
<div class="container">

<div class="my-2">
		<div class="badge badge-info text-wrap my-2" style="width: 17rem; ">

		<h3 class="text-white text-uppercase">
		Paquetes
		</h3>

		</div>


  <div class="row" style="margin-top: 4%">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <!-- Blog Post -->
      
<?php 
if (isset($_GET['pagina'])) {
        $pagina = $_GET['pagina'];
    } 
else {
        $pagina = 1;
}
    $regpp = 6;
    //$offset = ($pageno-1) * $no_of_records_per_page;

    $total="select * from paquete p, institucion i where p.idagencia = i.idinst and (p.nombre like '%$st%' or p.precio like '%$st%' or i.nombre like '%$st%')";

    $result=$dbh->prepare($total);
    $result->execute();
    $total_registros=$result->rowCount();

    $total_paginas = ceil($total_registros / $regpp);

    $start=($pagina-1)*$regpp;

$sql2="select p.imgpaq imgpaq, p.nombre nombre, p.precio precio, p.idpaq idpaq, p.detalle detalle, p.idagencia idagencia from paquete p, institucion i where p.idagencia = i.idinst and (p.nombre like '%$st%' or p.precio like '%$st%' or i.nombre like '%$st%') limit $start, $regpp";
$query=$dbh->prepare($sql2);
$query->execute();

$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{	
?>
      <div class="card mb-3" style="max-width: 750px;">
      
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="admin/packageimages/<?php echo htmlentities($result->imgpaq);?>" alt="<?php echo htmlentities($result->nombre);?>" class="card-img" width="500" height="250">
          </div>
          <div class="col-md-4">
            <div class="card-body">
            <h4 class="card-title text-info"><i class="fas fa-h-square"></i><?php echo " ".htmlentities($result->nombre);?></h4>
            
              <h5><p class="card-text text-success text-center"> A tan solo:<b><?php echo htmlentities($result->precio);?></b></a><span class="text-info"> Bs</span></p></h5>
              <p class="card-text px-4"><small class="text-success h6 "><i class="fab fa-whatsapp-square"></i> 591-67346516</small></p>
              <div class="py-4 text-center">
              <a href="package-details.php?paqid=<?php echo htmlentities($result->idpaq)?>" class="btn btn-primary"> Ver Más  &rarr;</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-body">
            <h6 class="card-title badge badge-info text-wrap" style="width: 13rem;"><p class="text-white text-center"><i class="fas fa-hiking"></i> Incluye:</p></h6>
              <p class="card-text">
              <ul>
              <?php 
               $sql="select * from servicio s, paqserv ps where s.idserv=ps.idserv and ps.idpaq=? limit 8";
               $query=$dbh->prepare($sql);
                $query->execute([htmlentities($result->idpaq)]);
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                if($query->rowCount() > 0)
                {
                foreach($results as $result2)
                {	
              ?><div class="display"></div><li class="text-capitalize list"><i class="fa fa-check fa-sm"></i>
              <?= htmlentities($result2->detalle);?></li>
              <?php
              }}
              ?>
              </ul>
              </p>
              
            </div>
          </div>
        </div>
        <?php
        $sqli="select * from institucion where idinst=?";
               $queryi=$dbh->prepare($sqli);
                $queryi->execute([htmlentities($result->idagencia)]);
                $resultsi=$queryi->fetchAll(PDO::FETCH_OBJ);
                if($queryi->rowCount() > 0)
                {
                foreach($resultsi as $resul)
                {	
                $agencia=htmlentities($resul->nombre);
                }
              }
                ?>
        <div class="card-footer text-muted italic bg-info">
              <span class="h5 text-white">Agencia: <?= $agencia;?></span>
        </div>
      </div>
<?php }
?>
  <nav aria-label="page navigation example">
  <ul class="pagination justify-content-center mb-4">
      <li class="page-item <?php echo $pagina<=1? 'disabled':'' ?>"><a class="page-link" href="buscar_paquete.php?pagina=<?= $pagina-1;?>&searchtitle=<?= $st;?>">Anterior</a></li>
      <?php for($i=0;$i<$total_paginas;$i++):?>
      <li class="page-item 
      <?php echo $pagina==$i+1 ? 'active': '' ?> ">
      <a href="buscar_paquete.php?pagina=<?= $i+1; ?>&searchtitle=<?= $st;?>" class="page-link">
      <?= $i+1;?></a>
      </li>
      <?php endfor ?>
      <li class="page-item <?php echo $pagina>=$total_paginas? 'disabled':'' ?>"><a href="buscar_paquete.php?pagina=<?= $pagina+1;?>&searchtitle=<?= $st;?>" class="page-link">Siguiente</a></li>
  </ul>
  </nav>
<?php
} 
else {
  echo "No se encontraron registros";
}

?>


    </div>
   
      <!-- Pagination -->

    <!-- Sidebar Widgets Column -->
  <?php include('includes/sidebarpaq.php');?>
  </div>
  <!-- /.row -->

</div>
</div>

<!-- /.container -->


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/ingresar.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/registro.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>			
<!-- //write us -->
</body>
</html>