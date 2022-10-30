<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{ 
	?>
<!DOCTYPE HTML>
<html>
<head>
<title>CHC | Mis Reservas</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style2.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="admin/css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="css/fontawesome/css/brands.css" rel="stylesheet">
  <link href="css/fontawesome/css/solid.css" rel="stylesheet">
<!-- jQuery -->
<script src="admin/js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<!-- tables -->
<link rel="stylesheet" type="text/css" href="admin/css/table-style.css" />
<link rel="stylesheet" type="text/css" href="admin/css/basictable.css" />
<script type="text/javascript" src="admin/js/jquery.basictable.min.js"></script>

<style>
	.alert-mine{
		background-color:#B22514;
		border-color:#ffffff;
	}
</style>
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
                <?php 
                    include('includes/header2.php');
                    $email=$_SESSION['login'];
                    $sql="select * from usuario where email=?";
                    $query=$dbh->prepare($sql);
                    $query->execute([$email]);
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount()>0)
                    {
                        foreach($results as $result)
                        {
                            $idcli = htmlentities($result->id);
                            $nombrecli = htmlentities($result->nombrecom);
                        }
                    }
                ?>
				     <div class="clearfix"> </div>	
				</div>

<div class="agile-grids">	
				<!-- tables -->
				
				<div class="agile-tables">
					<div class="w3l-table-info" style="margin:20px;">
					  <h2><?= $nombrecli;?></h2>
					  <h5><?= $email;?></h5>
					  <br>

                    
		<div class="row">
		<div class="col-md-6">
		<a href="package-list.php">
			<div class="badge badge-success" style="background-color:#02A9D9">
				<h4 class="text-white">Ir a Paquetes</h4>
			</div>
			</a>
		</div>

<?php 
$busqueda=$_GET['busqueda'];

$sql = "SELECT * from paquete p, reserva r where p.idpaq=r.idpaq and r.idcli=? and (r.fechareserva like '%$busqueda%' or p.nombre like '%$busqueda%' or r.fechasol like '%$busqueda%')";
$query = $dbh -> prepare($sql);
$query->execute([$idcli]);
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
	?>
	
		<div class="col-md-6">
			<div class="text-right">
					<form action="buscar_mis_reservas.php" method="get" class="form_search">
						<input type="text" name="busqueda" placeholder="<?= $busqueda;?>" id="busqueda">
						<input class="bg-primary" type="submit" value = "Buscar" class="btn_search">
					</form>
			</div>
		</div>
	</div>
					    <table id="table">
						<thead>
						  <tr>
						  <th>#</th>
							<th>Fecha de Reserva</th>
							<th>Paquete</th>
							<th>Cantidad Solicitada</th>
							<th>Monto</th>
							<th>Fecha de Salida</th>
                            <th>Estado</th>
                            <th>Acción</th>
						  </tr>
						</thead>
						<tbody>
	<?php 
foreach($results as $result)
{		
	$estado=intval(htmlentities($result->estado));
	if($estado==1)
	{
		$valor="Confirmado";
	}
	else {
		$valor="En espera";
	}

    $cantidad=intval(htmlentities($result->cantper));
    $precio=intval(htmlentities($result->precio));
    $total=$cantidad*$precio;
    		?>		
						  <tr>
							<td><?php echo htmlentities($cnt);?></td>
							<td><?php echo htmlentities($result->fechareserva);?></td>
							<td><?php echo htmlentities($result->nombre);?></td>
							<td><?php echo htmlentities($result->cantper);?></td>
							<td><?php echo $total;?></td>
                            <td><?php echo htmlentities($result->fechasol);?></td>
                            <td><?php echo $valor;?></td>

							<td>
							<form action="comprobante.php" method="POST">
								<input type="hidden" value="<?= htmlentities($result->idres);?>" name="rid">
								<!--<div class="display-4 text-center">
									<a href="comprobante.php"><div class="badge badge-info" style="width:10rem; background-color:#C73324;">
										<h5 class="text-white">Ver Reserva</h5>
									</div></a>
								</div>-->
										
										<input type="submit"  name="submit" value="Ver Reserva" class="form-control" style="background-color: #DB4138; color:white;">
									
							</form>

							</td>
						  </tr>
						 <?php $cnt=$cnt+1;} ?>
						</tbody>
					  </table>
					</div>
				  </table>
				<?php }
				
				
				else{
					echo "<br>";
					echo "Aun no contiene registros de reservas";
				}
				?>

				
			</div>
<?php
include ('includes/new-user.php');?>
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

<div class="fixed-bottom mb-4">
<div class="btn btn-danger mx-4 py-2">
	<h4 class="text-right"><a href="index.php" style="color:white;"><i class="fas fa-arrow-circle-left"></i> Volver</a></h4>
</div>	
</div>

<!--inner block end here-->
<!--copy rights start here-->
<?php include('includes/footer.php');?>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>
<?php } ?>