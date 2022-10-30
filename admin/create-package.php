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
$sql="select i.idinst from institucion i, usuario u where i.idencargado=u.id and u.email='$email'";
$query=$dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount()>0)
{
	foreach($results as $result)
	{
		$idag=htmlentities($result->idinst);
	}
}
if(isset($_POST['submit']))
{
$pnombre=$_POST['nombre'];
$pdetalle=$_POST['detalle'];
$pprecio=$_POST['precio'];	
$ptipo=$_POST['tipo'];
$pcapacidad=$_POST['capacidad'];
$pimage=$_FILES["packageimage"]["name"];
move_uploaded_file($_FILES["packageimage"]["tmp_name"],"packageimages/".$_FILES["packageimage"]["name"]);

$pservicio=$_POST["servicio"];
$pobjeto=$_POST["objeto"];
$photel=$_POST["hotel"];
$patractivo=$_POST["atractivo"];

$sql="insert into paquete (nombre, detalle, precio, imgpaq, cantidadp, tipopaq, idagencia) values('$pnombre','$pdetalle', $pprecio, '$pimage', $pcapacidad, $ptipo, $idag)";
$query = $dbh->prepare($sql);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
//echo "<script>alert(".var_dump($_POST).");</script>";
if($lastInsertId)
{
	foreach($pservicio as $llave => $valor){
		$sql2="insert into paqserv (idpaq, idserv) values($lastInsertId, $valor)";
		$query2 = $dbh->prepare($sql2);
		$query2->execute();
	}

	foreach($pobjeto as $llave => $valor){
		$sql2="insert into paqobj(idpaq, idobj) values($lastInsertId, $valor)";
		$query2 = $dbh->prepare($sql2);
		$query2->execute();
	}

	foreach($patractivo as $llave => $valor){
		$sql2="insert into paqatr (idpaq, idatr) values($lastInsertId, $valor)";
		$query2 = $dbh->prepare($sql2);
		$query2->execute();
	}

	foreach($photel as $llave => $valor){
		$sql2="insert into paqhot (idpaq, idhot) values($lastInsertId, $valor)";
		$query2 = $dbh->prepare($sql2);
		$query2->execute();
	}
	$op=1;
}
else {
	$op=0;
	echo "<script>console.log('nega')</script>";
}
} 

	?>
<!DOCTYPE HTML>
<html>
<head>
<title>CHC | Gestión de Paquetes</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="css/fontawesome/css/brands.css" rel="stylesheet">
  <link href="css/fontawesome/css/solid.css" rel="stylesheet">
  <link rel="stylesheet" href="librerias/alertifyjs/css/alertify.min.css" />
<link rel="stylesheet" href="librerias/alertifyjs/css/themes/default.min.css" />

<link href="css/style2.css" rel='stylesheet' type='text/css'/>

<script src="js/jquery-2.1.4.min.js"></script>
<script src="librerias/alertifyjs/alertify.min.js"></script>
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
select{
	margin-top:0;
}
.rounded{
	border-radius:10px;
}
.align{
	padding-left:100px;}

		</style>

</head> 
<body>
<?php
	if(isset($op)){
		if($op==0)
		{
			echo "<script>alertify.error('Error en la creacion del paquete')</script>";
		}
		else{
			echo "<script>alertify.success('El paquete se registró exitosamente')</script>";
		}
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
                <li class="breadcrumb-item"><a href="index.html">Inicio</a><i class="fa fa-angle-right"></i>Gestión </li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 
<!---->

  <div class=" container grid-form1">
  	       <h3>Crear Paquete</h3>
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Nombre</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="nombre" id="enterprisename" placeholder="Ingrese el nombre del paquete" required>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Detalles</label>
									<div class="col-sm-6">
										<textarea class="form-control" name="detalle" id="descripcion" rows="5" required></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Precio del Paquete</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="precio" id="precio" placeholder="Ingrese el precio del paquete" required>
										<span id="price-status" style="font-size:12px; color:#ff0000"></span>
									</div>
								</div>

								<div class="col-sm-12 px-5">
							<div class="row">
							<div class="col-sm-1">
						
						</div>
							<div class="col-md-4">
									<div class="form-group">
									<div class="col-sm-4">
										<label for="focusedinput" class="col-sm-2 control-label px-5">Capacidad </label>
									</div>
										
										<div class="col-sm-5">
											<input type="text" class="form-control" name="capacidad" id="phone" placeholder="Nro de Personas permitidas" required>
										</div>
									</div>
							</div>
							<div class="col-sm-5 ">
									<div class="form-group">
									<div class="col-sm-2">
										<label for="focusedinput" class="col-sm-3 control-label px-2">Tipo: </label>
									</div>
									<div class="col-sm-6">

										<select name="tipo" class="form-control">
											<option value="1">Circuito</option>
											<option value="2">Estancia</option>
											<option value="3">Premium</option>
										</select>

										</div>
									</div>
							</div>
							</div>
							</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Imagen</label>
									<div class="col-sm-8">
										<input type="file" name="packageimage" id="image">
									</div>
								</div>
								</div>
								

								<div class="form-group">
									
<label for="focusedinput" class="col-sm-2 control-label">Servicios</label>

<div class="container grid-form1">
<div class="row">
<?php
echo "<br>";
$sql = "SELECT * from servicio where tiposer=?";
$query = $dbh -> prepare($sql);
$query->execute([1]);
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{
	?>
		<div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
		<div class="form-check">
			<input class="form-check-input" type="checkbox" id="gridCheck1" name="servicio[]" value="<?php echo htmlentities($result->idserv);?>">
			<label class="form-check-label text-capitalize" for="gridCheck1">
			<?php echo htmlentities($result->detalle);?>
			</label>
		</div>
		</div>
<?php
}}
?>
	</div>
	</div>
	</div>

								

		


	
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Hoteles incluidos en el paquete</label>
	
<div class="container grid-form1">
<div class="row">
<?php
$sql = "SELECT * from hotel h, institucion i where i.idinst=h.idinst limit 8";
echo "<br>";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{
	?>
			<div class="col-md-5 text-center">
            <img src="instimages/<?php echo htmlentities($result->imgInst);?>" alt="<?php echo htmlentities($result->nombre);?>" class="rounded" width="200" height="140">
			  
		  <p>
		  <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
		<div class="form-check align">
			<input class="form-check-input" type="checkbox" id="gridCheck1" name="hotel[]" value="<?php echo htmlentities($result->idInst);?>">

			<label class="form-check-label text-capitalize" for="gridCheck1">
			<?php echo htmlentities($result->nombre);?>
			</label></p>

		</div>

		</div>
		</div>
<?php
}}
else {
	echo "no se registraron hoteles";
}

?>
	</div>
	</div>
	</div>
	
	<div class="form-group">
<label for="focusedinput" class="col-sm-2 control-label">Atractivos a visitar</label>
	
<div class="container grid-form1">
<div class="row py-2">
<?php
$sql = "SELECT * from atractivo limit 8";
echo "<br>";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{
	?>
		<div class="col-md-6 text-center">
            <img src="attractiveimages/<?php echo htmlentities($result->img);?>" alt="<?php echo htmlentities($result->nombre);?>" class="rounded" width="200" height="140">
			  
		<div class="col-md-6">
		<div class="form-check text-center">
			<input class="form-check-input" type="checkbox" id="gridCheck1" name="atractivo[]" value="<?php echo htmlentities($result->ID);?>">
			
			<label class="form-check-label text-capitalize text-center" for="gridCheck1">
			<?php echo htmlentities($result->nombre);?>
			</label>

		</div>

		</div>

		</div>
<?php
}}
?>
	</div>
	</div>
	</div>
				
	<div class="form-group">
<label for="focusedinput" class="col-sm-6 control-label">Objetos que debe llevar el pasajero</label>

<div class="container grid-form1">
<div class="row">
<?php
echo "<br>";
$sql = "SELECT * from objeto";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{
	?>
		<div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
		<div class="form-check">
			<input class="form-check-input" type="checkbox" id="gridCheck1" name="objeto[]" value="<?php echo htmlentities($result->idobj);?>">
			<label class="form-check-label text-capitalize" for="gridCheck1">
			<?php echo htmlentities($result->nombre);?>
			</label>
		</div>
		</div>
<?php
}}
?>
	</div>
	</div>
	</div>

			<div class="row">
			<div class="col-sm-9 col-sm-offset-2 text-right">
				<button type="submit" name="submit" class="btn-primary btn">Crear</button>

				<button type="reset" class="btn-inverse btn">Reestablecer</button>
			</div>
		</div>
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

		function checkPrice() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_price.php",
data:'precio='+$("#precio").val(),
type: "POST",
success:function(data){
$("#price-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<?php include('includes/footer.php');?>
<!--COPY rights end here-->
</div>
</div>
					<?php include('includes/sidebarmenu.php');
					include('includes/enterprise-administrator.php');?>
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

} ?>