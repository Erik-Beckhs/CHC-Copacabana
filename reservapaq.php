<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset ($_GET['ipa']))
{
  $ipa=$_GET['ipa'];
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

<div class="text-info py-2">
<h2>Reserva de Paquete</h2></div>

  <div class="row" style="margin-top: 4%">

    <!-- Blog Entries Column -->
    <div class="col-md-8">
      <!-- Blog Post -->
      
<?php 

$sql2="select * from paquete where idpaq=?";

$query=$dbh->prepare($sql2);
$query->execute([$ipa]);
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
              <p class="card-text"><small class="text-muted">Telefono(s):<?php echo htmlentities($result->telefono);?> </small></p>
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
        <div class="card-footer text-muted italic">
          Fecha: <?php echo htmlentities($result->fechaini);?>
        </div>
      </div>
<?php }} ?>
   
      <!-- Pagination -->

<div class="row">
    xd
</div>
            </div>
      
<div class="col">
  <?php include('includes/sidebarhotel.php');?>
  </div>

    </div>


    <!-- Sidebar Widgets Column -->




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