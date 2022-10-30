<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(!isset($_GET['pagina'])){
  $_GET['pagina']=1;
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
  .valoracion{
    position:absolute;
    font-size:1em;
    top:5px;
    right:5px;
    width:60px;
    height:40px;
    background-color:orange;
    z-index:10;
    border-radius:5px;
  }
  img{
    width:100%;
    position:relative;
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

  <div class="row" style="margin-top: 4%">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <!-- Blog Post -->
<?php 

 if($_GET['searchtitle']!=''){
  $st=$_SESSION['searchtitle']=$_GET['searchtitle'];
  }

    $no_registros_pagina = 5;
    //$offset = ($pageno-1) * $no_of_records_per_page;

    $total_hoteles="select * from institucion i, hotel h where i.idinst=h.idinst and i.bioseguridad=1 and (i.nombre like '%$st%' or i.direccion like '%$st%' or i.telefono like '%$st%' or h.tarifa like '%$st%')
    order by i.idinst desc";
    $result=$dbh->prepare($total_hoteles);
    $result->execute();
    $total_registros=$result->rowCount();

    $total_paginas = ceil($total_registros / $no_registros_pagina);

    $iniciar=($_GET['pagina']-1)*$no_registros_pagina;

$sql2="select * from institucion i, hotel h where i.idinst=h.idinst and i.bioseguridad=1 and (i.nombre like '%$st%' or i.direccion like '%$st%' or i.telefono like '%$st%' or h.tarifa like '%$st%')
order by i.idinst desc limit $iniciar, $no_registros_pagina";

$query=$dbh->prepare($sql2);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{
  $inst=htmlentities($result->idinst);
$sqlv="select idinst, avg(valoracion) val from calificai where idinst='$inst' group by idinst";
$queryv=$dbh->prepare($sqlv);
$queryv->execute();
$r=$queryv->fetchAll(PDO::FETCH_OBJ);
if($queryv->rowCount()>0)
{
  foreach($r as $re)
  {
    $val=htmlentities($re->val);
  }
}
else{
  $val=0;
}
?>
      <div class="card mb-3" style="max-width: 750px;">
        <div class="row no-gutters">
          <div class="col-md-4">
         
          <h4><span class="valoracion text-right text-white pr-2 py-1">
            <?= number_format($val,2);?>
          </span></h4>

            <img src="admin/instimages/<?php echo htmlentities($result->imgInst);?>" alt="<?php echo htmlentities($result->nombre);?>" class="card-img" width="500" height="250">

          </div>

          <div class="col-md-4">
            <div class="card-body">

           <div class = "badge badge-success text-wrap">
            <span class=" h6 card-title text-white"><i class="fas fa-h-square"></i><?php echo " ".htmlentities($result->nombre);?></div>

            </span>

            <p class="text-warning text-center">
            <?php
              $star=htmlentities($result->idcat);
              $starwhite=5-$star;
              for($i=0; $i<$star; $i++)
              {
                ?>
                  <i class="fas fa-star"></i>
                <?php
              }
              for($j=0; $j<$starwhite; $j++)
              {

            ?>
            <i class="fa fa-star text-white"></i>
            <?php
            }
            ?>
            </p>


            <p class="text-info text-center"><span class="h6 text-dark"> Desde:</span><b><span class="h5"><?php echo htmlentities($result->tarifa);?></b></span><span class="h6 text-dark"> Bs</span></p>

              <p class="text-center text-dark h6">Telefono(s): <span class="text-info"> <?php echo htmlentities($result->telefono);?></span></p>
              <div class="py-4 text-center">
              <a href="hotel-details.php?hid=<?php echo htmlentities($result->idinst)?>" class="btn btn-primary"> Ver Más  &rarr;</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-body">
            
              <h6 class="card-title badge badge-info text-wrap" style="width: 13rem;"><p class="text-white text-center"><i class="fa fa-utensils"></i> Servicios:</p></h6>
              <p class="card-text">
              <ul>
              <?php 
               $sql="select * from instserv ise, servicio s where ise.idservicio=s.idserv and ise.idinst=? limit 8";
               $query=$dbh->prepare($sql);
                $query->execute([htmlentities($result->idinst)]);
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
        <div class="card-footer text-muted italic bg-info">
          <span class="text-white"> Dirección: <?php echo htmlentities($result->direccion);?></span>
        </div>
      </div>
<?php }} ?>
   
      <!-- Pagination -->

<ul class="pagination justify-content-center mb-4">
    <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled': '' ?>"><a href="buscar_hotel.php?searchtitle=<?=$st; ?>&pagina=<?= $_GET['pagina']-1;?>"  class="page-link">Anterior</a></li>
    <?php for($i=0;$i<$total_paginas;$i++): ?>
    <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active':'' ?>">
        <a href="buscar_hotel.php?searchtitle=<?=$st; ?>&pagina=<?=$i+1;?>" class="page-link"><?= $i+1;?></a>
    </li>
    <?php endfor ?>
    <li class="page-item <?php echo $_GET['pagina']>=$total_paginas? 'disabled':'' ?>"><a href="buscar_hotel.php?searchtitle=<?=$st; ?>&pagina=<?= $_GET['pagina']+1;?>" class="page-link">Siguiente</a></li>
</ul>

    </div>

    <div class="fixed-bottom mb-4">
<div class="btn btn-danger mx-4 py-2">
	<h3 class="text-right"><a href="index.php" style="color:white;"><i class="fas fa-arrow-circle-left"></i> Volver</a></h3>
</div>	
</div>	

    <!-- Sidebar Widgets Column -->
  <?php include('includes/sidebarhotel.php');?>
  </div>
  <!-- /.row -->

</div>

<!-- /.container -->


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>			
<!-- //write us -->
</body>
</html>