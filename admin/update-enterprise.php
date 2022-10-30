<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

$ie=$_GET['ie'];
$ien=$_GET['iden'];

if($ie==1)
{
	$titulo="Hotel";
}
else if($ie==2)
{
	$titulo="Agencia";
}
if(isset($_POST['update']))
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
$iimage=$_FILES["instimage"]["name"];

$sql="update institucion set nombre=:inombre, direccion=:idireccion, descripcion=:idescripcion, telefono=:itelefono, idencargado=:iidenc, bioseguridad=:ibio, ubicacion=:ub, pagina=:pag, correo=:correo where idinst=:idinst";
$query = $dbh->prepare($sql);
$query->bindParam(':inombre',$inombre,PDO::PARAM_STR);
$query->bindParam(':idireccion',$idireccion,PDO::PARAM_STR);
$query->bindParam(':idescripcion',$idescripcion,PDO::PARAM_STR);
$query->bindParam(':itelefono',$itelefono,PDO::PARAM_STR);
$query->bindParam(':iidenc',$iencargado,PDO::PARAM_INT);
$query->bindParam(':ibio',$ibioseguridad,PDO::PARAM_INT);
$query->bindParam(':ub',$iubicacion,PDO::PARAM_STR);
$query->bindParam(':pag',$ipagina,PDO::PARAM_STR);
$query->bindParam(':correo',$icorreo,PDO::PARAM_STR);
$query->bindParam(':idinst',$ien,PDO::PARAM_STR);
$query->execute();

header('Location:manage-enterprise.php?iid='.$ie.'&e=1');
}

if (isset($_GET['id']))
{
	$ide=$_GET['id'];
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
		echo "<script>alertify.success('Se agregó un nuevo registro')</script>";
		$nombre=$nombrecom;
		$st=1;	
	}
	else 
	{
	 echo "<script>alertify.error('Error al adicionar registro')</script>";
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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!--bootstrap cdn-->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style3.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>

<link href="css/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="css/fontawesome/css/brands.css" rel="stylesheet">
  <link href="css/fontawesome/css/solid.css" rel="stylesheet">

<link href="css/style2.css" rel='stylesheet' type='text/css'/>
<!--alertify-->
<link rel="stylesheet" href="librerias/alertifyjs/css/alertify.min.css">
<link rel="stylesheet" href="librerias/alertifyjs/css/themes/default.min.css">

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
<?php
if($ie==1)
{
	$sql = "select * from usuario u, institucion i, hotel h, categoriahot ch where i.idinst=? and u.id=i.idencargado and i.idinst=h.idinst and h.idcat = ch.idcath";
}
else {
	$sql = "select * from usuario u, institucion i, agencia a where i.idinst=? and u.id=i.idencargado and i.idinst=a.idinst";
}
$query = $dbh -> prepare($sql);
$query->execute([$ien]);
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{
$encargado=htmlentities($result->nombrecom);
$idenc=htmlentities($result->idencargado);
$institucion=htmlentities($result->nombre);
$direccion=htmlentities($result->direccion);
$descripcion=htmlentities($result->descripcion);
$ubicacion=htmlentities($result->ubicacion);
$pagina=htmlentities($result->pagina);
$facebook=htmlentities($result->facebook);
$correo=htmlentities($result->correo);
$telefono=htmlentities($result->telefono);
$bioseguridad=htmlentities($result->bioseguridad);
$img=htmlentities($result->imgInst);
}
?>

  <div class="grid-form1">
  	       <h3>Modificar <?= $titulo;?></h3>
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>INFORMACION</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Encargado</label>
									<div class="col-sm-4">
									<select name="encargado" class="form-control">
									<?php
									if($st==1)
									{
										$enc=$nombre;
									?>
									<option value="<?= $lastInsertId;?>"><?= $enc;?></option>
									<?php

									}
									
									else{
										$enc= $encargado;
										?>
										<option value="<?= $idenc;?>"><?= $enc;?></option>
										<?php
									}
		
									$sql1 = "SELECT * from usuario where idtipou=2";
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
							<span class="text-uppercase">
                            Crear Encargado</span>
                        </button>
									
						</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Nombre</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="nombre" id="enterprisename" value='<?= $institucion;?>'>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Dirección</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="direccion" id="location" value='<?= $direccion;?>'>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Descripcion</label>
									<div class="col-sm-6">
										<textarea class="form-control" name="descripcion" id="descripcion" rows="5"><?= $descripcion;?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Teléfono</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="telefono" id="location" value='<?= $telefono;?>'>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Ubicacion Google Maps</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="ubicacion" id="location" value='<?= $ubicacion;?>'>
									</div>
								</div>

						
						<div class="row" style="display:inline-block; width:100%">
						<div class="col-sm-1">
						
						</div>
						<div class="col-sm-4">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-3 control-label px-5">Pagina Web</label>
									<div class="col-sm-8 px-5 ml-5">
										<input type="text" class="form-control" name="pagina" id="phone" value='<?= $pagina;?>'>
									</div>
								</div>
						</div>
						<div class="col-sm-5">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-3 control-label">Correo</label>
									<div class="col-sm-6 ">
									<input type="email" class="form-control" name=correo id="phone" value='<?= $correo;?>'>
									</div>
								</div>
						</div>
						</div>
						<div class="row">
						<div class="col-sm-1">
						
						</div>
							<div class="col-md-4">
								<div class="form-group pl-5">
									<label for="focusedinput" class="col-sm-3 control-label px-5">Facebook</label>
									<div class="col-sm-6 px-5 ml-5">
										<input type="text" class="form-control" name="pagina" id="phone" value='<?= $facebook;?>'>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-3 control-label">Bioseguridad</label>
									<div class="col-sm-3">
									<?php if($bioseguridad)
									{ 
									?>
										<select name="bioseguridad" class="form-control">
										<option value="1">SI</option>
										<option value="0">NO</option>	
										<?php
									}
									else { ?>
										<select name="bioseguridad" class="form-control">
										<option value="1">SI</option>
										<option value="1">SI</option>	
									<?php
									}
									?>

										</select>
									</div>
								</div>
							</div>

						</div>

						
					</div>	

						<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Imagen</label>
						<div class="col-sm-8">
						<img src="instimages/<?php echo $img;?>" width="300">
						<a href="change-image_inst.php?imgid=<?php echo $ien;?>">
						<span class="badge bagge-info text-white h2">Cambiar Imagen</span>
						</a>
						</div>
						</div>		
						</div>
			<div class="row">
			<div class="col-sm-9 text-center" style="margin-top:30px;" >
				<button type="submit" name="update" class="btn-success btn">Modificar</button>
				<button type="button" class="btn btn-info" name="cancel" id="cancel">Cancelar</button>
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
                            <input type="text" class="form-control" name="email" id="password">
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

		$('#cancel').on('click', function(){
			history.back();
		})
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="js/scripts.js"></script>
</body>
</html>
<?php }} 
?>