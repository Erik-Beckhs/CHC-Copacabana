<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
$pid=intval($_GET['pid']);

if(isset($_POST['submit']))
{
$nombre=$_POST['nombre'];
$tipo=$_POST['tipo'];	
$detalle=$_POST['detalle'];
$precio=$_POST['precio'];	
$capacidad=$_POST['capacidad'];
$img=$_FILES["packageimage"]["name"];
$sql="update paquete set nombre='$nombre',tipopaq=$tipo,detalle='$detalle',precio=$precio,cantidadp=$capacidad where idpaq=$pid";
$query = $dbh->prepare($sql);
$query->execute();
$msg="Paquete modificado exitosamente";
}

	?>
<!DOCTYPE HTML>
<html>
<head>
<title>CHC | Admin Modificar Paquete</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="css/fontawesome/css/brands.css" rel="stylesheet">
  <link href="css/fontawesome/css/solid.css" rel="stylesheet">
<script src="js/jquery-2.1.4.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

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
                <li class="breadcrumb-item"><a href="index.html">Inicio</a><i class="fa fa-angle-right"></i>Actualizar paquete turístico </li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 
<!---->
  <div class="grid-form1">
  	       <h3>Actualizar Paquete</h3>

			<div class="tab-pane active" id="horizontal-form">
						
<?php 
$pid=$_GET['pid'];
$sql = "SELECT * from paquete where idpaq=$pid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	
$idp=htmlentities($result->idpaq);
$nombre=htmlentities($result->nombre);
$detalle=htmlentities($result->detalle);
$precio=htmlentities($result->precio);
$img=htmlentities($result->imgpaq);
$cant=htmlentities($result->cantidadp);
$tipo=htmlentities($result->tipopaq);
?>

							<form method="post" enctype="multipart/form-data">
								
							<div class="row">
							<div class="col-md-7">
								<div class="row mx-5">
								<div class="col-sm-3">
									<label for="nombre" class="control-label">Nombre de Paquete</label>
								</div>
								<div class="col-sm-7">
										<input type="text" class="form-control" name="nombre"  required="" value="<?= $nombre;?>">
								</div>
								</div>
								<div class="row mt-3 mx-5">
								<div class="col-sm-3">
									<label for="tipo" class="control-label">Tipo</label>
								</div>
								<div class="col-sm-7">
									<select name="tipo" class="form-select">
										<option value="1">Circuito</option>
										<option value="2">Programa de Estancia</option>
										<option value="3">Premium</option>
									</select>
								</div>
								</div>

								<div class="row mt-3 mx-5">
								<div class="col-sm-3">
									<label for="fdetalle" class="control-label">Detalle</label>
								</div>
								<div class="col-sm-7">
									<textarea class="form-control" name="detalle" rows='3' required><?= $detalle?>
									</textarea>
								</div>
								</div>

								<div class="row mt-3 mx-5">
								<div class="col-sm-3">
									<label for="focusedinput" class="control-label">Precio</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="precio" id="precio" value="<?php echo $precio;?>" required>
								</div>
								</div>

								<div class="row mt-3 mx-5">
								<div class="col-sm-3">
									<label for="focusedinput" class="control-label">Capacidad</label>
								</div>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="capacidad" id="capacidad" value="<?php echo $cant;?>" required>
								</div>
								</div>
							</div>
							<div class="col-md-5">
								<img name="packageimage" src="packageimages/<?php echo $img;?>" width="300">
								<br>
								<a href="change-imageP.php?idp=<?= $idp;?>">Cambiar Imagen</a>
							</div>
														
		
							<?php }} ?>
						</div>

					<div class="row">
			<div class="text-center">
				<button type="submit" name="submit" class="btn-primary btn">Modificar</button>
			</div>

<div class="fixed-bottom mb-4">
<div class="btn btn-info text-right">
	<h4 class="text-right"><a href="manage-packages.php" style="color:white;"><i class="fas fa-arrow-circle-left"></i> Volver</a></h4>
</div>	
</div>
		</div>	
						
		</div>	
						
					</div>
					
					</form>

     
      

      
      <div class="panel-footer">
		
	 </div>
    </form>
  </div>
 	</div>
 	<!--//grid-->

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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>
<?php } ?>