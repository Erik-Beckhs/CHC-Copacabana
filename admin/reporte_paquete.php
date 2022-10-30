<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_GET['ru']))
{
	$f=$_GET['ru'];
}
else {
	$tit='';
	$f=0;
}
	?>
<!DOCTYPE HTML>
<html>
<head>
<title>CHC | Reportes</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="css/fontawesome/css/brands.css" rel="stylesheet">
  <link href="css/fontawesome/css/solid.css" rel="stylesheet">
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<!-- tables -->
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
<style>
	.nav-link:hover{
			background-color: #2D7796;
			border-radius:10px; 
	}
</style>
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

			<!--boton emergente descargar-->
			<div class="text-right fixed-bottom mr-5 mb-4">
	<a href="reportes.php?ru=<?= $f;?>&r=3" target="_blank"><button class="btn btn-primary btn-lg" name="btnReporte" style="width:200px;"><i class="fas fa-print"></i> Imprimir</button></a>
	</div>

<!--heder end here-->
<?php
require_once 'includes/header_reporte.php';
?>

<?php 
$sql = "SELECT * from paquete order by idpaq desc limit 10";
if($f==1)
{
	$tit='Circuito';
	$sql = "SELECT * from paquete where tipopaq = 1 order by idpaq desc";
}
else if ($f==2)
{
	$tit='Estancia';
	$sql = "SELECT * from paquete where tipopaq = 2 order by idpaq desc";
}
else if ($f==3)
{
	$tit='Premium';
	$sql = "SELECT * from paquete where tipopaq = 3 order by idpaq desc";
}
?>
	
				<div class="agile-tables border">
					<div class="w3l-table-info">

					<div class="row border">
						<div class="col-md-4">
					  <h2>Paquetes <?=$tit;?></h2>
					  
					  </div>

					<div class="col-md-8">
					  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
					  <div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link text-white" href="reporte_paquete.php?ru=1">Circuito</a>
						</li>
						<li class="nav-item mx-5">
							<a class="nav-link text-white" href="reporte_paquete.php?ru=2">Estancia</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="reporte_paquete.php?ru=3">Premium</a>
						</li>
						<li class="nav-item mx-5">
							<a class="nav-link text-white" href="reporte_paquete.php">Todos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="reporte_paquetes.php"><i class="fas fa-chart-pie"></i> Gráficos</a>
						</li>
						</ul>
					</div>
</nav>
</div>

				</div>
					  

					    <table id="table">
						<thead>
						  <tr>
						  <th>#</th>
						  <th>Nombre</th>
							<th>Precio</th>
							<th>Agencia</th>
							<th>Capacidad</th>
							<th>Tipo </th>
						  </tr>
						</thead>
						<tbody>

<?php
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
							<td><?php echo htmlentities($cnt);?></td>
							<td><?php echo htmlentities($result->nombre);?></td>
							<td><?php echo htmlentities($result->precio);?></td>
							<?php
							$idag=htmlentities($result->idagencia);
							$sqli="select * from institucion where idinst=?";
							$queryi=$dbh->prepare($sqli);
							$queryi->execute([$idag]);
							$resultsi=$queryi->fetchAll(PDO::FETCH_OBJ);
							if($queryi->rowCount()>0)
							{
								foreach($resultsi as $resulti)
								{
									$agencia=htmlentities($resulti->nombre);
								}
							}
							?>
							<td><?php echo $agencia;?></td>
							<?php
							$t=htmlentities($result->tipopaq);
							if($t==1)
							{
								$tipo="Circuito";
							}
							else if($t==2)
							{
								$tipo="Estancia";
							}
							else if($t==3)
							{
								$tipo="Premium";
							}
							?>
							<td><?php echo htmlentities($result->cantidadp);?></td>
							<td><?php echo $tipo;?></td>
							
						  </tr>
						 <?php $cnt=$cnt+1;} }?>
						</tbody>
					  </table>
					</div>
				  </table>

				
			</div>
			<div class="border rounded">
			<?php
				include('reportes_graficos/grafico_paquete.php');
			?>
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
						<?php include('includes/sidebarmenu.php');?>
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