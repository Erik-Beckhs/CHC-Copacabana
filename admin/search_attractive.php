<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_GET['estado']))
{
	$est=$_GET['estado'];
}
else
{
	$est=1;
}
if(!isset($_GET['pagina']))
{
	$_GET['pagina']=1;
}
$dato=$_GET['busqueda'];
   if(empty($dato))
   {
       header("Location:manage-attractives.php");
   }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>CHC | Admin Gestión de atractivos</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style3.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="css/fontawesome/css/brands.css" rel="stylesheet">
  <link href="css/fontawesome/css/solid.css" rel="stylesheet">

<link rel="stylesheet" href="alertifyjs/css/alertify.css">
<link rel="stylesheet" href="alertifyjs/css/themes/default.css">

<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<script src="alertifyjs/alertify.js"></script>

<script src="js/funciones.js"></script>
<!-- //jQuery -->
<!-- tables -->
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
	.nav-link:hover{
			background-color: #2D7796;
			border-radius:10px; 
	}
</style>
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<!-- //tables -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />

<!-- //lined-icons -->
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<?php include('includes/header.php');?>
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a><i class="fa fa-angle-right"></i>Gestión de Atractivos</li>
            </ol>
<div class="agile-grids">	
<div class="agile-tables border">
				<!-- tables -->
				<div class="row ml-auto">
				<div class="col-md-12">
					  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
					  <div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav">
						<li class="nav-item" style="width:440px;">
							<a class="nav-link text-white text-center" href="manage-attractives.php?estado=1">Activos</a>
						</li>
						<li class="nav-item mx-1" style="width:440px;">
							<a class="nav-link text-white text-center" href="manage-attractives.php?estado=0">Inactivos</a>
						</li>
						</ul>
					</div>
</nav>
</div></div>
<div class="row">	
<?php
$regpp=8;
$sq="select * from atractivo where nombre like '%$dato%' or ubicacion like '%$dato%' or dificultad like '%$dato%'";
$quer=$dbh->prepare($sq);
$quer->execute();
$total=$quer->rowCount();
$total_paginas=ceil($total/$regpp);

$start=($_GET['pagina']-1)*$regpp;

$sql = "SELECT * from atractivo where nombre like '%$dato%' or ubicacion like '%$dato%' or dificultad like '%$dato%' limit $start, $regpp";

?>				

<div class="col">
<div class="justify-content-right">
					  <form action="search_attractive.php" method="get" class="form_search">
						<input class="form-control" type="text" name="busqueda" placeholder=<?= $dato; ?> id="busqueda">
						<input type="submit" value = "Buscar" class="form-control bg-primary text-white">
					</form>
					</div>
</div>


					    <table id="table">
						<thead>
						  <tr>
						  <th>#</th>
							<th >Nombre</th>
							<th>Ubicacion</th>
							<th>Dificultad</th>
							<th>Categoria</th>
							<th>Cambiar Estado</th>
							<th>Opciones</th>
						  </tr>
						</thead>
						<tbody>
<?php 
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$start+1;

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
							<td><?php echo htmlentities($cnt);?></td>
							<td><?php echo htmlentities($result->nombre);?></td>
							<td><?php echo htmlentities($result->ubicacion);?></td>
							<td><?php echo htmlentities($result->dificultad);?></td>

							<?php $cat=htmlentities($result->idcat);
							$activo=htmlentities($result->activo);
							$sqlc="select nombrecat from categoria where idcat=$cat";
							$queryc=$dbh->prepare($sqlc);
							$queryc->execute();
							$ress=$queryc->fetchAll(PDO::FETCH_OBJ);
							if($queryc->rowCount() > 0)
							{
							foreach($ress as $ress2)
							{
								$c=htmlentities($ress2->nombrecat);
							}
							}
							else
							{
								$c="Sin Categoria";
							}
														?>													
							<td><?= $c; ?></td>
							<td>
							<?php $id=htmlentities($result->ID);?>
							<form action="includes/controlador_atr.php" method="POST">
								<input type="hidden" value=<?= $id;?> name="id">
								<input type="hidden" value=<?= $est; ?> name="estado">
								<input type="submit" class="button rounded h5 text-white <?= $activo==1? 'bg-danger' : 'bg-success' ?>" name="cambiar_estado" value=<?=
								$activo==1? Inactivar : Activar?>>
							</form>
							</td>
							<td>
							<div class="h4 text-center">	
								<a href="update?uid=<?= htmlentities($result->ID);?>" title="Modificar"><i class="fa fa-edit text-info"></i></a>
								<a href="#" title="Eliminar" onclick="preguntarSiNoA('<?php echo $id; ?>')"><i class="fas fa-trash-alt text-danger"></i></a>
								
							</div>
							</td>
						  </tr>
						 <?php $cnt=$cnt+1;} }?>
						</tbody>
					  </table>
					</div>
				  </table>
<div class="row justify-content-center">	
<nav aria-label="page navigation example">
<ul class="pagination ml-5 mb-3">
<li class="page-item <?php echo $_GET['pagina']<=1? 'disabled':'' ?>"><a class="page-link" href="search-attractive.php?pagina=<?= $_GET['pagina']-1;?>&busqueda=<?= $dato;?>">Anterior</a></li>
      <?php for($i=0;$i<$total_paginas;$i++):?>
      <li class="page-item 
      <?php echo $_GET['pagina']==$i+1 ? 'active': '' ?> ">
      <a href="search_attractive.php?pagina=<?= $i+1; ?>&busqueda=<?= $dato;?>" class="page-link">
      <?= $i+1;?></a>
      </li>
      <?php endfor ?>
      <li class="page-item <?php echo $_GET['pagina']>=$total_paginas? 'disabled':'' ?>"><a href="search_attractive.php?pagina=<?= $_GET['pagina']+1;?>&busqueda=<?= $dato;?>" class="page-link">Siguiente</a></li>
</ul>
</nav>
</div>
			</div>
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include('includes/footer.php');?>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
		<!--/sidebar-menu-->
						<?php include('includes/sidebarmenu.php');
						include('includes/modal.php');
						
						?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>
<?php } ?>