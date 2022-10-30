<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>
<!DOCTYPE HTML>
<html>
<head>
<title>CHC | Busqueda de Atractivos</title>
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
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<style>
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
      <div class="row">
<?php 
if($_GET['searchtitle']!=''){
  $st=$_SESSION['searchtitle']=$_GET['searchtitle'];
  }

 if (isset($_GET['pagina'])) {
        $pagina = $_GET['pagina'];
    } else {
        $pagina = 1;
    }
    $no_registros_pagina = 6;

    $total_p="select * from atractivo a, categoria c where a.idcat=c.idcat and a.nombre like '%$st%' and a.activo=1";
    $result=$dbh->prepare($total_p);
    $result->execute();
    $total=$result->rowCount();
    $total_paginas = ceil($total / $no_registros_pagina);

    $iniciar=($_GET['pagina']-1)*$no_registros_pagina;

$sql2="select * from atractivo a, categoria c where a.idcat=c.idcat and a.nombre like '%$st%' and a.activo=1 order by a.id desc LIMIT $iniciar, $no_registros_pagina";

$query=$dbh->prepare($sql2);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() == 0)
{
  echo "No se encontraron registros";
}
else {
  foreach($results as $result)
{	
  $atr=htmlentities($result->ID);
  $sqlv="select idatr, avg(valoracion) val from calificaa where idatr='$atr' group by idatr";
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
        <div class="col-sm-6">
    <div class="card">
    <h4><span class="valoracion text-right text-white pr-2 py-1">
              <?= number_format($val,1);?>
    </span></h4>

    <img class="card-img-top" src="admin/attractiveimages/<?php echo htmlentities($result->img);?>" alt="<?php echo htmlentities($result->nombre);?>" width="500" height="300">
      <div class="card-body">
        <h5 class="card-title"><?php echo htmlentities($result->nombre);?></h5>
        <p><b>Categoria : </b> <a href="category.php?catid=<?php echo htmlentities($result->idcat)?>"><?php echo htmlentities($result->nombrecat);?></a> </p>
          <a href="attractive-details.php?atid=<?php echo htmlentities($result->ID)?>" class="btn btn-primary">Más Información &rarr;</a>
        </div>
        <div class="card-footer text-muted">
          Dificultad <?php echo htmlentities($result->dificultad);?>
        </div>
    </div>
  </div>

<?php }} ?>
</div>
   
      <!-- Pagination -->
  <div class="row justify-content-center">
<nav aria-label="page navigation example">
<ul class="pagination ml-5 mb-3">
      <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled':'' ?>"><a class="page-link" href="buscar_atractivo.php?pagina=<?= $_GET['pagina']-1;?>&searchtitle=<?= $st;?>">Anterior</a></li>
      <?php for($i=0;$i<$total_paginas;$i++):?>
      <li class="page-item 
      <?php echo $_GET['pagina']==$i+1 ? 'active': '' ?> ">
      <a href="buscar_atractivo.php?pagina=<?= $i+1; ?>&searchtitle=<?= $st;?>" class="page-link">
      <?= $i+1;?></a>
      </li>
      <?php endfor ?>
      <li class="page-item <?php echo $_GET['pagina']>=$total_paginas? 'disabled':'' ?>"><a href="buscar_atractivo.php?pagina=<?= $_GET['pagina']+1;?>&searchtitle=<?= $st;?>" class="page-link">Siguiente</a></li>
</ul>
</nav>
</div>

    </div>

    <!-- Sidebar Widgets Column -->
  <?php include('includes/sidebar.php');?>
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