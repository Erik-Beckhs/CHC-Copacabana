<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

$ie=$_GET['ie'];
if($ie==1)
{
	$titulo="Hotel";
}
else if($ie==2)
{
	$titulo="Agencia";
}

if(isset($_POST['btnencargado']))
{
	$nombrecom=$_POST['nombre'];
	$dni=$_POST['dni'];
	$telefono=$_POST['telefono'];
	$email=$_POST['email'];

	$sql="INSERT INTO usuario (nombrecom,email,pass,dni,telefono, idtipou) VALUES(:nombrecom,:email,:dni,:dni,:telefono, 2)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':nombrecom',$nombrecom,PDO::PARAM_STR);
	$query->bindParam(':email',$email,PDO::PARAM_STR);
	$query->bindParam(':dni',$dni,PDO::PARAM_STR);
	$query->bindParam(':telefono',$telefono,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId)
	{
		echo "<script>alert('Se agregó un nuevo registro')</script>";
		$nombre=$nombrecom;
		$st=1;	
	}
	else 
	{
	 echo "<script>alert('Error al adicionar registro')</script>";
	}
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>CHC | Gestión de Hoteles</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!--bootstrap cdn-->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style3.css" rel='stylesheet' type='text/css' />
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
		</style>
		<script>
		 new WOW().init();
	</script>

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
                <li class="breadcrumb-item"><a href="index.html">Inicio</a><i class="fa fa-angle-right"></i>Gestión </li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 
<!---->

  <div class="grid-form1">
  	       <h3><strong>Registrar <?= $titulo;?></strong></h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="package" method="POST" enctype="multipart/form-data">
							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Encargado</label>
									<div class="col-sm-4">
									<select name="encargado" class="form-control">
									<?php
									if($st==1)
									{
										$enc=$nombre;
									}
									else{
										$enc= "SELECCIONE UN VALOR";
									}
									?>
								
									<option value="<?= $lastInsertId;?>"><?= $enc;?></option>
									<?php
									$s="select idencargado from institucion";
									$sql1 = "SELECT * from usuario where idtipou=2 and id not in ($s)";
									$query = $dbh->prepare($sql1);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									
									foreach($results as $result)
									{
									?>
									<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->nombrecom);?></option>
									
								<?php
							}
							?>
							</select>
									</div>


									<button type="button" class="btn w3ls-btn bg-theme d-block btn-info" data-toggle="modal" aria-pressed="false"
                            data-target="#modalEncargado">
                            Crear Encargado
                        </button>
									
						</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Nombre</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre de la institución" required onBlur="checkAvailability()">
										<span id="enterprise-availability-status" style="font-size:12px; color:#ff0000"></span> 
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Dirección</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="direccion" id="location" placeholder="Ingrese la direccion" required>
									</div>
								</div>


								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Descripcion</label>
									<div class="col-sm-6">
										<textarea class="form-control" name="descripcion" id="descripcion" rows="5" required></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Ubicacion Google Maps</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="ubicacion" id="location" placeholder="Ingrese la url">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Pagina Web</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="pagina" id="pagina" placeholder="Ingrese la url de la pagina web (opcional)">
									</div>
								</div>

								<div class="col-sm-12 mx-5">
						<div class="row" style="display:inline-block; width:100%">
						<div class="col-sm-1">
						
						</div>
						<div class="col-sm-4">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-3 control-label px-5">Facebook</label>
									<div class="col-sm-6 px-5 ml-5">
										<input type="text" class="form-control" name="facebook" id="facebook" placeholder="Ingrese la url">
									</div>
								</div>
						</div>
						<div class="col-sm-4">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-3 control-label px-2">Correo</label>
									<div class="col-sm-6 pl-5">
									<input type="email" class="form-control" name=correo id="email" placeholder="Ingrese el correo">
									</div>
								</div>
						</div>
						</div>
						</div>

								<?php if ($ie==1){

							 	?>

							<div class="col-sm-12 px-5">
							<div class="row">
							<div class="col-sm-1">
						
						</div>
							<div class="col-md-4">
									<div class="form-group">
										<label for="focusedinput" class="col-sm-3 control-label px-5">Precio Bs.</label>
										<div class="col-sm-6 px-4 ml-4">
											<input type="text" class="form-control" name="precio" id="precio" placeholder="Tarifa de Referencia" required onBlur="checkPrice()">
											<span id="price-status" style="font-size:12px; color:#ff0000"></span>
										</div>
										 
									</div>
							</div>
							<div class="col-sm-4 ">
									<div class="form-group">
									<label for="focusedinput" class="col-sm-3 control-label px-2">Categoria</label>
									<div class="col-sm-6 px-5">

										<select name="categoria" class="form-control">
									<?php
									$sql1 = "SELECT * from categoriahot";
									$query = $dbh->prepare($sql1);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									
									foreach($results as $result)
									{
									?>
									<option value="<?php echo htmlentities($result->idcath);?>"><?php echo htmlentities($result->detalle);?></option>
								<?php
							}
							?>
							</select>

										</div>
									</div>
							</div>
							</div>
							</div>

								<?php } ?>
						
						<div class="col-sm-12 mx-5">
						<div class="row" style="display:inline-block; width:100%">
						<div class="col-sm-1">
						</div>
						<div class="col-sm-4">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-3 control-label px-5">Teléfono</label>
									<div class="col-sm-6 px-5 ml-5">
										<input type="text" class="form-control" name="telefono" id="phone" placeholder="Ingrese el telefono" required>
									</div>
								</div>
						</div>
						<div class="col-sm-4">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-3 control-label px-2">Bioseguridad</label>
									<div class="col-sm-6 pl-5">
									<select name="bioseguridad" id="" class="form-control">
										<option value="1">SI</option>
										<option value="0">NO</option>
									</select>
									</div>
								</div>
						</div>
						</div>
						</div>

								
							<div class="row">
								
									<label for="focusedinput" class="col-sm-2 control-label">Imagen</label>
									<div class="col-sm-2">
										<input type="file" name="hotelimage" id="image">
									</div>
								
									<label for="focusedinput" class="col-sm-2 control-label">Video</label>
									<div class="col-sm">
										<input type="file" name="hotelvideo" id="video" size="150" maxlength="150">
									</div>
							</div>
<br>
<div class="form-group">
<label for="focusedinput" class="col-sm-2 control-label font-weight-bold"><strong> Servicios </strong></label>

<div class="container grid-form1">
<div class="row">
<?php
echo "<br>";
$sql = "SELECT * from servicio where tiposer=?";
$query = $dbh -> prepare($sql);
$query->execute([1]);
if($ie==1)
{
	$query->execute([0]);	
}
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{
	?>
		<div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
		<div class="form-check">
			<input class="form-check-input" type="checkbox" id="gridCheck1" name="servicio[]" value="<?php echo htmlentities($result->idserv);?>">
			<label class="form-check-label text-capitalize px-3" for="gridCheck1">
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

<?php
	if($ie==1)
	{
		?>

<div class="form-group">
<label for="focusedinput" class="col-sm-2 control-label"><strong> Características</strong></label>
	
<div class="container grid-form1">
<div class="row">
<?php
$sql = "SELECT * from caracteristica";
echo "<br>";
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
			<input class="form-check-input" type="checkbox" id="gridCheck1" name="caracteristica[]" value="<?php echo htmlentities($result->idcar);?>">
			<label class="form-check-label text-capitalize px-3" for="gridCheck1">
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

<label for="focusedinput" class="col-sm-2 control-label" ><strong> Tipos de Habitación</strong></label>

	
<div class="container grid-form1">
<div class="row">
<?php
$sql = "SELECT * from tipohab";
echo "<br>";
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
			<input class="form-check-input" type="checkbox" id="gridCheck1" name="tipohab[]" value="<?php echo htmlentities($result->idtipo);?>">
			<label class="form-check-label text-capitalize px-3" for="gridCheck1">
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
<?php } ?>
	



<div class="form-group">
<label for="focusedinput" class="col-sm-2 control-label"><strong> Idiomas</strong></label>
	
<div class="container grid-form1">
<div class="row">
<?php
$sql = "SELECT * from idioma";
echo "<br>";
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
			<input class="form-check-input" type="checkbox" id="gridCheck1" name="idioma[]" value="<?php echo htmlentities($result->idlang);?>">
			<label class="form-check-label text-capitalize px-3" for="gridCheck1">
			<?php echo htmlentities($result->idioma);?>
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
				<button type="submit" name="crearHotel" class="btn-primary btn">Crear</button>

				<button type="reset" class="btn-danger btn">Reestablecer</button>
			</div>
		</div>
	</div>
					
					</form>

		<div class="modal fade" id="modalEncargado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" class="p-3">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Nombre Completo</label>
                            <input type="text" class="form-control" name="nombre" id="recipient-name" required="">
                        </div>
                        <div class="form-group">
                            <label for="dni" class="col-form-label">DNI</label>
                            <input type="text" class="form-control" name="dni" id="password"
                                required="">
                        </div>
						<div class="form-group">
                            <label class="col-form-label">Correo Electrónico</label>
                            <input type="text" class="form-control" name="email" id="password"
                                >
                        </div>
						<div class="form-group">
                            <label class="col-form-label">Telefono de Referencia</label>
                            <input type="text" class="form-control" name="telefono" id="password"
                                required="">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Crear" name="btnencargado">
                        </div>
						<div class="row sub-w3l my-3">
                            <div class="col sub-w3_pvt">
                                <label for="brand1">
                                    <span></span>Para acceder al sistema, su contraseña es el DNI, se sugiere cambiarlo luego de ingresar por primera vez</label>
                            </div>
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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

<!-- Bootstrap Core JavaScript -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>

<!--Javascript for check email availabilty-->
<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability_enterprise.php",
data:'nombre='+$("#nombre").val(),
type: "POST",
success:function(data){
$("#enterprise-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

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

</body>
</html>
<?php
	if(isset($_POST['crearHotel']))
	{
	$inombre=$_POST['nombre'];
	$idireccion=$_POST['direccion'];
	$idescripcion=$_POST['descripcion'];
	$itelefono=$_POST['telefono'];
	$iencargado=$_POST['encargado'];
	$ibioseguridad=$_POST['bioseguridad'];
	$iubicacion=$_POST['ubicacion'];
	$ipagina=$_POST['pagina'];
	$icorreo=$_POST['correo'];
	$ifacebook=$_POST['facebook'];
	$iimage=$_FILES["hotelimage"]["name"];
	$ivideo=$_FILES["hotelvideo"]["name"];
	move_uploaded_file($_FILES["hotelimage"]["tmp_name"],"instimages/".$_FILES["hotelimage"]["name"]);
	move_uploaded_file($_FILES["hotelvideo"]["tmp_name"],"videos/instvideo/".$_FILES["hotelvideo"]["name"]);
	$iservicio=$_POST["servicio"];
	$iidioma=$_POST["idioma"];

	var_dump(POST);
	
	if($ie==1)
	{
		$iprecio=$_POST['precio'];	
		$icategoria=$_POST['categoria'];
		$icaracteristica=$_POST["caracteristica"];
		$itipohab=$_POST["tipohab"];
	}
	
	$sql="INSERT INTO institucion (nombre,direccion,descripcion, telefono,idencargado, imgInst, bioseguridad, ubicacion, pagina, correo, facebook, videoUrl) VALUES('$inombre','$idireccion','$idescripcion', '$itelefono',$iencargado, '$iimage', $ibioseguridad, '$iubicacion', '$ipagina', '$icorreo', '$ifacebook', '$ivideo')";
	$query = $dbh->prepare($sql);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if($lastInsertId)
	{
		if($ie==1)
		{
			$sqli="insert into hotel (idinst, tarifa, idcat) values (:idinst, :tarifa, :cat)";
			$queryi = $dbh->prepare($sqli);
			$queryi->bindParam(':idinst',$lastInsertId,PDO::PARAM_INT);
			$queryi->bindParam(':tarifa',$iprecio,PDO::PARAM_STR);
			$queryi->bindParam(':cat',$icategoria,PDO::PARAM_INT);
			$queryi->execute();
			
			foreach($icaracteristica as $llave => $valor)
			{
				$sql2="insert into hotcar(idhotel, idcar) values(:idhot, :idcar)";
				$query2 = $dbh->prepare($sql2);
				$query2->bindParam(':idhot',$lastInsertId,PDO::PARAM_INT);
				$query2->bindParam(':idcar',$valor,PDO::PARAM_INT);
				$query2->execute();
			}
	
			foreach($itipohab as $llave => $valor)
			{
				$sql2="insert into hottipohab(idhotel, idtipo) values(:idhot, :idtipo)";
				$query2 = $dbh->prepare($sql2);
				$query2->bindParam(':idhot',$lastInsertId,PDO::PARAM_INT);
				$query2->bindParam(':idtipo',$valor,PDO::PARAM_STR);
				$query2->execute();
			}
		}
		else if($ie==2)
		{
			$sqli="insert into agencia values (:idinst)";
			$queryi = $dbh->prepare($sqli);
			$queryi->bindParam(':idinst',$lastInsertId,PDO::PARAM_INT);
			$queryi->execute();
		}
	
		foreach($iservicio as $llave => $valor)
		{
			$sql2="insert into instserv (idinst, idservicio) values(:idinst, :idserv)";
			$query2 = $dbh->prepare($sql2);
			$query2->bindParam(':idinst',$lastInsertId,PDO::PARAM_INT);
			$query2->bindParam(':idserv',$valor,PDO::PARAM_INT);
			$query2->execute();
		}
	
		foreach($iidioma as $llave => $valor)
		{
			$sql2="insert into instlang(idinst, idlang) values(:idinst, :idlang)";
			$query2 = $dbh->prepare($sql2);
			$query2->bindParam(':idinst',$lastInsertId,PDO::PARAM_INT);
			$query2->bindParam(':idlang',$valor,PDO::PARAM_INT);
			$query2->execute();
		}
		//header('location:manage-enterprise.php?iid='.$ie.'&c=1');
		echo "<script>alertify.success('Se registró la institución de manera exitosa');</script>";
	}
		else 
		{
			echo "<script>alertify.error('Error: No se registró la institución');</script>";
		}
	}
	
	if (isset($_GET['id']))
	{
		$ide=$_GET['id'];
	}
	
	 } ?>