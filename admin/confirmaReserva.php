<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
	$email=$_SESSION['alogin'];
	$rid=$_GET['rid'];

	$sql="select r.fechareserva, u.nombrecom, u.telefono, p.nombre, r.fechasol, p.precio, r.cantper, p.tipopaq from reserva r, paquete p, usuario u where r.idpaq=p.idpaq and r.idus=u.id and r.idres=$rid";
	$query=$dbh->prepare($sql);
	$query->execute();

	$results=$query->fetchAll(PDO::FETCH_OBJ);
	if($query->rowCount()>0){
		foreach($results as $result){
			$fechares=htmlentities($result->fechareserva);
			$nombrecom=htmlentities($result->nombrecom);
			$tel=htmlentities($result->telefono);
			$nom=htmlentities($result->nombre);
			$fs=htmlentities($result->fechasol);
			$pre=htmlentities($result->precio);
			$cantp=htmlentities($result->cantper);
			$tp=htmlentities($result->tipopaq);
			$total=$pre*$cantp;
		}
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>CHC | Admin Gestión de Reservas</title>
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
  <link href="librerias/alertifyjs/css/alertify.css" rel="stylesheet">
  <link href="librerias/alertifyjs/css/themes/default.css" rel="stylesheet">
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<script src="librerias/alertifyjs/alertify.js"></script>
<!-- //jQuery -->
<!-- tables -->
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script src="js/funciones.js"></script>
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
                <li class="breadcrumb-item"><a href="index.html">Inicio</a><i class="fa fa-angle-right"></i>Gestión de Reservas</li>
            </ol>	

<!--div reserva-->
      <!-- /. NAV SIDE  -->
	  <div class="container">
	  <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Reserva<small>	<?php echo  $curdate; ?> </small>
                        </h1>
                    </div>
					
					
					<div class="col-md-8 col-sm-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
						Confirmación de reserva
                        </div>
                        <div class="panel-body">
							
							<div class="table-responsive">
                                <table class="table">
                                    <tr>
                                            <td class="text-center bg-primary text-white">DESCRIPCIÓN</td>
                                            <td class="text-center bg-primary text-white">INFORMACIÓN</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Fecha de Reserva: </td>
                                            <td><?php echo $fechares; ?> </td>
                                            
                                        </tr>
										<tr>
                                            <td>Nombre: </td>
                                            <td><?php echo $nombrecom; ?> </td>
                                            
                                        </tr>
										<tr>
                                            <td>Telefono Cliente: </td>
                                            <td><?php echo $tel; ?></td>
                                            
                                        </tr>
										<tr>
                                            <td>Paquete: </th>
                                            <td><?php echo $nom;  ?></td>
                                            
                                        </tr>
										<tr>
                                            <td>Fecha de Salida Deseada: </td>
                                            <td><?php echo $fs; ?></td>
                                            
                                        </tr>
										<tr>
                                            <td>Precio Unitario: </td>
                                            <td><?php echo $pre; ?></td>
                                            
                                        </tr>
										<tr>
                                            <td>Cantidad de Personas: </th>
                                            <td><?php echo $cantp; ?></th>
                                            
                                        </tr>
										<tr>
                                            <td>Total: </td>
                                            <td><?php echo $total; ?></td>
                                            
                                        </tr>
                        
                                    
                                </table>
                            </div>
                        
					
							
                        </div>
                        <div class="panel-footer">
                            <form method="post">
										<div class="form-group">
														<label>Seleccione la Acción</label>
														<select name="conf"class="form-control">
															<option value="confirma" selected>Confirmar</option>
															<option value="elimina">Eliminar</option>
														</select>
										 </div>
							<input type="submit" name="realiza" value="Realizar" class="btn btn-success">
							<input type="button" name="realiza" value="Volver" class="btn btn-danger" onClick="history.go(-1)">
							</form>
                        </div>
                    </div>
					</div>
					
                        <div class="panel-footer">
                            
                        </div>
                    </div>
					</div>
                </div>
	  </div>
<!-- end div reserva-->
</div>

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
<?php 

} 
if(isset($_POST['realiza']))
{
	$valor=$_POST['conf'];
	if($valor=='confirma'){
		$sql="update reserva set estado=1 where idres=$rid";
		$query=$dbh->prepare($sql);
		if($query->execute())
		{
			echo "<script>alertify.success('Se cambió el estado de la reserva')</script>";
			echo "<script type='text/javascript'> window.location='panel_reservas.php'</script>";
		}
		else{
			echo "<script>alertify.error('Fallo al ejecutar')</script>";
		}
	}
	else if($valor=="elimina"){
		$sql="delete from reserva where idres=$rid";
		$query=$dbh->prepare($sql);
		if($query->execute())
		{
			echo "<script>alertify.success('Se eliminó la reserva')</script>";
			echo "<script type='text/javascript'> window.location='panel_reservas.php'</script>";
		}
		else{
			echo "<script>alertify.error('Fallo al ejecutar')</script>";
		}
	}
}
?>