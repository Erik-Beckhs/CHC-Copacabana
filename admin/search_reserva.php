<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
	?>
<!DOCTYPE HTML>
<html>
<head>
<title>CHC | Admin administracion de usuarios</title>
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

   <?php 
   $dato=$_REQUEST['busqueda'];
   if(empty($dato))
   {
       header("Location:panel_reservas.php");
   }
   ?>

   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<?php include('includes/header.php');?>
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a><i class="fa fa-angle-right"></i>Reservas</li>
            </ol>
<div class="agile-grids">	
				<!-- tables -->
				
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Reservas sin confirmar</h2>
   					<div class="row px-2">
   					<a href="manage-users.php"><button class="btn btn-info"><i class="fas fa-arrow-circle-left"></i> Volver</button></a>
					</div>
					<form action="search_reserva.php" method="get" class="form_search">
						<input type="text" name="busqueda" placeholder=<?php echo $dato;?> id="busqueda">
						<input type="submit" value = "Buscar" class="btn_search ">
					</form>

					<table id="table">
						<thead>
						  <tr>
						  <th>Id Reserva</th>
							<th >Pasajero</th>
							<th>Telefono</th>
							<th>Correo</th>
							<th>Paquete</th>
							<th>Monto</th>
							<th>Estado</th>
							<th>Acción</th>
						  </tr>
						</thead>
						<tbody>
						<?php 
$sql ="select * from paquete p, usuario u, reserva r where r.estado = ? and r.idpaq=p.idpaq and r.idcli=u.id and (idres like '%$dato%' or nombrecom like '%$dato%' or telefono like '%$dato%' or email like '%$dato%' or nombre like '%$dato%')";
$query = $dbh -> prepare($sql);
$query->execute([0]);
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{				
	
						if((htmlentities($result->estado))==0)
						{
							$est="sin confirmar";
						}
						else {
							$est="confirmado";
						}
						$total=intval(htmlentities($result->precio))*intval(htmlentities($result->cantper));
						$idres=htmlentities($result->idres);
	?>		
							
						  <tr>
							<td><?php echo htmlentities($result->idres);?></td>
							<td><?php echo htmlentities($result->nombrecom);?></td>
							<td><?php echo htmlentities($result->telefono);?></td>
							<td><?php echo htmlentities($result->email);?></td>
							<td><?php echo htmlentities($result->nombre);?></td>
							<td><?php echo $total;?></td>
							<td><?php echo $est;?></td>
							<td><a href="#" data-toggle="modal" data-target="#myModal6" ><button class="btn btn-primary btn-sm" name="btnConfirmaRes"><i class="fas fa-user-check"></i> Confirmar</button></a>
							<a href="#" data-toggle="modal" data-target="#myModal7" ><button class="btn btn-primary btn-sm" name="btnEliminaRes"><i class="fas fa-user-check"></i> Eliminar</button></a>
						</td>
						  </tr>
						 <?php } }?>
						</tbody>
					  </table>
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

<!--copy rights start here-->
<?php 
include('includes/modalEstadoRes.php');
include('includes/footer.php');
?>
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