<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_GET['pid']))
{
  $pid=$_GET['pid'];
}

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

  .resplandor{   
      border:10px solid #31708f;
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
 <?php include('includes/header2.php');?>

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

    $total="select * from paquete";
    if($pid!=0)
    {
      $total="select * from paquete where tipopaq=$pid";
    }

    $result=$dbh->prepare($total);
    $result->execute();
    $total_registros=$result->rowCount();

    $total_paginas = ceil($total_registros / $regpp);

    $start=($pagina-1)*$regpp;

$sql2="select * from paquete order by idpaq desc limit $start, $regpp";
if($pid!=0)
{
  $sql2="select * from paquete where tipopaq=$pid order by idpaq desc limit $start, $regpp";
}
$query=$dbh->prepare($sql2);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{	
  $idpaq=htmlentities($result->idpaq);
  $swp=0;
  $sqlpromo="select * from promocion where idpaquete=$idpaq";
  $querypromo=$dbh->prepare($sqlpromo);
  $querypromo->execute();
  $results=$querypromo->fetchAll(PDO::FETCH_OBJ);
  if($querypromo->rowCount() > 0)
  {
   $swp=1;
  }
  
?>
      <div class="card mb-3" style="max-width: 750px;">
      
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="admin/packageimages/<?php echo htmlentities($result->imgpaq);?>" alt="<?php echo htmlentities($result->nombre);?>" class="card-img" width="500" height="250">
          </div>
          <div class="col-md-4">
            <div class="card-body">
            <h5 class="card-title <?= $swp==1?'text-success':'text-info';?>"><i class="fab fa-servicestack"></i><?php echo " ".htmlentities($result->nombre);?></h5>
            
              <h5><p class="card-text text-success text-center"> A tan solo:<b><?php echo htmlentities($result->precio);?></b></a><span class="<?= $swp==1?'text-success':'text-info';?>"> Bs</span></p></h5>
              <p class="card-text px-4"><small class="text-success h6 "><i class="fab fa-whatsapp-square"></i> 591-67346516</small></p>
              <div class="py-4 text-center">
              <a href="package-details.php?paqid=<?php echo $idpaq;?>" class="btn <?= $swp==1?'btn-success':'btn-info';?>">Ver Más &rarr;</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-body">
            <h6 class="card-title badge <?= $swp==1?'badge-success':'badge-info';?> text-wrap" style="width: 13rem;"><p class="text-white text-center"><i class="fas fa-hiking"></i> Incluye:</p></h6>
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
        <div class="card-footer text-white italic <?= $swp==1?'bg-success':'bg-info';?>">
        <div class="row">
          <div class="col-sm-5"><span class="h4 text-white">Agencia: </span><?= $agencia;?></div>
          <div class="col-sm-2"></div>
          <div class="col-sm-4"><span class='h4'><?= $swp==1?'EN PROMOCIÓN':'';?></span></div>      
        </div>
        </div>
      </div>
<?php }
?>
  <nav aria-label="page navigation example">
  <ul class="pagination justify-content-center mb-4">
  <?php if(isset($pid)) {
    ?>
      <li class="page-item <?php echo $pagina<=1? 'disabled':'' ?>"><a class="page-link" href="package-list.php?pagina=<?= $pagina-1;?>&pid=<?= $pid; ?>">Anterior</a></li>
      <?php for($i=0;$i<$total_paginas;$i++):?>
      <li class="page-item 
      <?php echo $pagina==$i+1 ? 'active': '' ?> ">
      <a href="package-list.php?pagina=<?= $i+1; ?>&pid=<?= $pid; ?>" class="page-link">
      <?= $i+1;?></a>
      </li>
      <?php endfor ?>
      <li class="page-item <?php echo $pagina>=$total_paginas? 'disabled':'' ?>"><a href="package-list.php?pagina=<?= $pagina+1;?>&pid=<?= $pid; ?>" class="page-link">Siguiente</a></li>
    <?php }
    else {
      ?>
      <li class="page-item <?php echo $pagina<=1? 'disabled':'' ?>"><a class="page-link" href="package-list.php?pagina=<?= $pagina-1;?>">Anterior</a></li>
      <?php for($i=0;$i<$total_paginas;$i++):?>
      <li class="page-item 
      <?php echo $pagina==$i+1 ? 'active': '' ?> ">
      <a href="package-list.php?pagina=<?= $i+1; ?>" class="page-link">
      <?= $i+1;?></a>
      </li>
      <?php endfor ?>
      <li class="page-item <?php echo $pagina>=$total_paginas? 'disabled':'' ?>"><a href="package-list.php?pagina=<?= $pagina+1;?>" class="page-link">Siguiente</a></li>
      <?php }    
          ?>
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
<?php include('includes/registro.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/ingresar.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>			
<!-- //write us -->
</body>
</html>