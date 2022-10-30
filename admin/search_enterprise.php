<?php
session_start();
error_reporting(0);
include('includes/config.php');

$iid=$_GET['tipo'];
if($iid==1){
	$inst="Hoteles";
}
else if($iid==2){
	$inst="Agencias de Turismo";
}

if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
	?>
<!DOCTYPE HTML>
<html>
<head>
<title>CHC | Admin Instituciones</title>
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
<script src="js/funciones.js"></script>
<!-- //jQuery -->
<!-- tables -->
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
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

<link rel="stylesheet" href="librerias/alertifyjs/css/alertify.min.css" />
<link rel="stylesheet" href="librerias/alertifyjs/css/themes/default.min.css" />

<script src="librerias/alertifyjs/alertify.min.js"></script>
<!-- //lined-icons -->
</head> 
<body>
<?php 
   $dato=$_REQUEST['busqueda'];
   if(empty($dato))
   {
       header("Location:manage_enterprise.php");
   }
   ?>

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
                <li class="breadcrumb-item"><a href="index.html">Inicio</a><i class="fa fa-angle-right"></i>Gestión de Instituciones</li>
            </ol>
<div class="agile-grids">	
				<!-- tables -->
				
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2><strong><?= $inst ;?></strong></h2>
<div>
<a href="create-enterprise.php?ie=<?= $iid;?>"><button class="btn btn-success"><i class="fas fa-plus-circle"></i> Crear Nuevo</button></a>
<a href="manage-enterprise.php?iid=<?=$iid; ?>"><button class="btn btn-info"><i class="fas fa-ban"></i> ELiminar Filtros</button></a>
</div>

					  <form action="search_enterprise.php" method="get" class="form_search">
						<input type="text" name="busqueda" placeholder=<?php echo $dato;?> id="busqueda">
						<input type="hidden" name="tipo" value=<?= $iid;?>>
						<input type="submit" value = "Buscar" class="btn_search">
					</form>
</div>

					    <table id="table">
						<thead>
						  <tr>
						  <th>#</th>
							<th >Nombre</th>
							<th>Direccion</th>
							<th>Telefono</th>
							<th>Encargado</th>
							<th>Accion</th>
						  </tr>
						</thead>
						<tbody>
<?php 
if($iid==1)
{
	//$sql = "SELECT i.nombre, i.direccion, i.telefono, u.nombrecom from institucion i, encargado e, usuario u, hotel h where e.id=i.idencargado and e.id=u.id and i.idinst=h.idinst";
	$sql = "select * from institucion i, usuario u where u.id=i.idencargado and i.idinst in (select idinst from hotel) and (i.nombre like '%$dato%' or i.direccion like '%$dato%' or i.telefono like '%$dato%' or u.nombrecom like '%$dato%')";
}
else if ($iid==2){
	$sql = "select * from institucion i, usuario u where u.id=i.idencargado and i.idinst in (select idinst from agencia) and (i.nombre like '%$dato%' or i.direccion like '%$dato%' or i.telefono like '%$dato%' or u.nombrecom like '%$dato%')";
}
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
							<td><?php echo htmlentities($result->direccion);?></td>
							<td><?php echo htmlentities($result->telefono);?></td>
							<td><?php echo htmlentities($result->nombrecom);?></td>

							<td>
							<div class="text-center h3">
								<a href="update-enterprise.php?ie=<?=$iid;?>&iden=<?= $idinst;?>" title="Modificar"><i class="fa fa-edit text-info"></i></a>
								<a href="#" title="Eliminar" onclick="preguntarSiNoI('<?php echo $idinst; ?>')"><i class="fas fa-trash-alt text-danger"></i></a>
							</div>
							</td>
						  </tr>
						 <?php $cnt=$cnt+1;} }?>
						</tbody>
					  </table>
					</div>
				  </table>

				
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