<?php
session_start();
error_reporting(0);
include('../../includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('../../location:index.php');
}
else{ 
	$email=$_SESSION['alogin'];
?>
<!DOCTYPE HTML>
<html>
<head>
<title>CHC | Admin Gestión de Reservas</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="../../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="../../css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="../../css/morris.css" type="text/css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Graph CSS -->
<link href="../../css/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="../../css/fontawesome/css/brands.css" rel="stylesheet">
  <link href="../../css/fontawesome/css/solid.css" rel="stylesheet">
  <link rel="stylesheet" href="../../librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" href="../../librerias/alertifyjs/css/themes/default.css">
<!-- jQuery -->
<script src="../../js/jquery-2.1.4.min.js"></script>
<script src="../../librerias/alertifyjs/alertify.js"></script>
<!-- //jQuery -->
<!-- tables -->
<link rel="stylesheet" type="text/css" href="../../css/table-style.css" />
<link rel="stylesheet" type="text/css" href="../../css/basictable.css" />
<script type="text/javascript" src="../../js/jquery.basictable.min.js"></script>
<script src="../../js/funciones.js"></script>
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
<link rel="stylesheet" href="../../css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head> 
<body>
<?php
if(isset($_GET['success']))
{
	if($_GET['success']==1){
		echo "<script>alertify.success('Copia de seguridad realizada con éxito')</script>";
	}
	else if($_GET['success']==2)
	{
		echo "<script>alertify.success('Se restauró la base de datos de manera exitosa')</script>";
	}
	else {
		echo "<script>alertify.error('Ocurrio un error inesperado al crear la copia de seguridad')</script>";
	}	
}

?>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<?php 
				$sw=1;
				include('../../includes/header.php');?>
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
			<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a><i class="fa fa-angle-right"></i>Copias de Seguridad</li>
            </ol>	
			

<!--div reserva-->
      <!-- /. NAV SIDE  -->
	  <div class="container">
	  <div class="col-md-12">
	  <div class="row">
<div class="panel">

<div class="border m-4">
<div class="row justify-content-center">
	<label class="h4">Copia de Seguridad</label><br>
</div>

<div class="row justify-content-center">
	<a href="./Backup.php">
	<div class="form-control btn-info" style="width:300px;height:110px;">
	<div class="icon text-center text-white">
		<i class="fa fa-save h1"></i>
	</div>
	<div class="four-text text-white">
	 	<span class="h4">Crear Copia de Seguridad</span>
	</div>
	</div></a>
</div>
</div>

<div class="border my-2 m-4">
	
	<form action="./Restore.php" method="POST">
	<div class="row justify-content-center">
		<label class="h4">Restaurar Base de Datos</label><br>
	</div>
	<div class="row justify-content-center">
		<select name="restorePoint">
			<option value="" disabled="" selected="">Selecciona un punto de restauración</option>
			<?php
				include_once './Connet.php';
				$ruta=BACKUP_PATH;
				if(is_dir($ruta)){
				    if($aux=opendir($ruta)){
				        while(($archivo = readdir($aux)) !== false){
				            if($archivo!="."&&$archivo!=".."){
				                $nombrearchivo=str_replace(".sql", "", $archivo);
				                $nombrearchivo=str_replace("-", ":", $nombrearchivo);
				                $ruta_completa=$ruta.$archivo;
				                if(is_dir($ruta_completa)){
				                }else{
				                    echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
				                }
				            }
				        }
				        closedir($aux);
				    }
				}else{
				    echo $ruta." No es ruta válida";
				}
			?>
		</select>
		</div>
		<div class="row justify-content-center py-2">
			<input class="btn form-control btn-success" type="submit" value="Restaurar" style="width:310px;">
		</div>
	</form>
	</div></div>
</div></div>
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

</div></div>

<!--copy rights start here-->
<?php 
include('../../includes/modalEstadoRes.php');
include('../../includes/footer.php');
?>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
		<!--/sidebar-menu-->
						<?php include('../../includes/sidebarmenu2.php');?>
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
<script src="../../js/jquery.nicescroll.js"></script>
<script src="../../js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="../../js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->

  

</body>
</html>
<?php 

} ?>
