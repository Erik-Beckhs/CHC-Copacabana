<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_SESSION['login']))
{
	$email=$_SESSION['login'];
	$sesion=1;
	$sql="select * from usuario where email=?";
	$query=$dbh->prepare($sql);
	$query->execute([$email]);
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	if($query->rowCount()>0)
	{
		foreach($results as $result)
		{
			$idcli = htmlentities($result->id);
		}
	}
}
else {
	$sesion=0;
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>CHC | Detalles</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css'/>
<link href="css/style2.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="css/fontawesome/css/brands.css" rel="stylesheet">
  <link href="css/fontawesome/css/solid.css" rel="stylesheet">
  <link href="alertifyjs/css/alertify.css" rel="stylesheet">
  <link href="alertifyjs/css/themes/default.css" rel="stylesheet">

<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/funciones.js"></script>
<script src="alertifyjs/alertify.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css" />

	<script>
		 new WOW().init();
	</script>
<script src="js/jquery-ui.js"></script>
<script src="js/rating.js"></script>
					<script>
						$(function() {
						$( "#datepicker,#datepicker1" ).datepicker();
						});
					</script>
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
<!-- top-header -->
<?php include('includes/header2.php');?>
<div class="banner-3">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> CHC - Atractivos Turísticos</h1>
	</div>
</div>
<!--- /banner ---->
<!--- selectroom ---->
<div class="selectroom">
	<div class="container">	
<?php 
$aid=intval($_GET['atid']);
$_SESSION['aid']=$aid;
$sql = "SELECT  a.ID, a.nombre as nombre, a.img as img, a.ubicacion as ubicacion, a.descripcion as descripcion, a.temporadaideal as temporadaideal, c.nombrecat as nombrecat, a.dificultad as dificultad, a.llegada as llegada, activo activo, videoAtr from atractivo a, categoria c where a.idcat=c.idcat and a.id=:aid";
$query = $dbh->prepare($sql);
$query -> bindParam(':aid', $aid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	
	$sqlv="select idatr, avg(valoracion) val from calificaa where idatr='$aid' group by idatr";
	$queryv=$dbh->prepare($sqlv);
	$queryv->execute();
	$r=$queryv->fetchAll(PDO::FETCH_OBJ);
	if($queryv->rowCount()>0)
	{
	  foreach($r as $re)
	  {
		$val=htmlentities($re->val);
	  }
	}
	else{
	  $val=0;
	}	
	?>

<!--<form name="book" method="post">-->
		<div class="selectroom_top">

			<div class="col-md-5 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
				
				
				<?php
			  $video=htmlentities($result->videoAtr);
			 	if($video!=null){
					 ?>
					 <video src="admin/videos/atractivos/<?= $video;?>" autoplay controls width='350'></video>
				 <?php
				 } 
				 else {
					 ?>
					 <img src="admin/attractiveimages/<?php echo htmlentities($result->img);?>" class="img-responsive " style="width:600px; height:350px;">
					 <?php
				 }
			  ?>
<br>
				<?php 
					echo htmlentities($result->nombre); 
				?>
			<div>
				<?php
					if((htmlentities($result->activo))==1)
					{
						$estado="activo";
						?>
						<span class="h4 text-dark">Estado: </span><span class="badge badge-success bg-success text-capitalize" style="font-size:18px;"><?= $estado;?></span>
					<?php
					}
					else{
						$estado="inactivo";
						?>
						<span class="h4 text-dark">Estado: </span><span class="badge badge-danger bg-danger text-capitalize" style="font-size:18px;"><?= $estado;?></span>
					<?php
					}
				?>
				<div class="my-2">
				<span class="h4 text-dark">Valoración: </span><span class="badge badge-danger 
				<?php echo $val>=5? 'bg-success': 'bg-danger'?>
				 text-capitalize" style="font-size:20px;"><?= number_format($val,1);?></span>
				</div>
				</div>

			</div>

			<div class="col-md-7 selectroom_right wow fadeInRight animated border" data-wow-delay=".5s" style="min-height:300px;">
				<div class="my-4">
					<div class="badge badge-success text-wrap bg-success" style="width:30rem;">
						<h2 class="text-white"><?php echo htmlentities($result->nombre);?></h2>
					</div>
				</div>
				<div class="my-4 text-justify">
					<div>
					<p><b><span class="text-white badge badge-success bg-info text-wrap text-center" style="width:11rem; font-size:16px;"><i class="fas fa-map-marker-alt"></i> Ubicación: </span></b> <?php echo htmlentities($result->ubicacion);?></p>
					</div>
					<div>
					<p><b><span class="text-white badge badge-success bg-info text-wrap text-center" style="width:13rem; font-size:16px;"><i class="fas fa-align-justify"></i> Descripción: </span></b> <?php echo htmlentities($result->descripcion);?></p>
					</div>
					<div>
					<p><b><span class="text-white badge badge-success bg-info text-wrap text-center" style="width:16rem; font-size:16px;"><i class="fas fa-smile-wink"></i> Temporada Ideal: </span></b> <?php echo htmlentities($result->temporadaideal);?></p>
					</div>
					<div>
					<p><b><span class="text-white badge badge-success bg-info text-wrap text-center" style="width:13rem; font-size:16px;"><i class="fas fa-question-circle"></i> Como llegar: </span></b> <?php echo htmlentities($result->llegada);?></p>
					</div>
				</div>
			</div>
						
				<div class="grand">
					<p class="h4 text-info">Dificultad</p>
					<span class="h3"><?php echo htmlentities($result->dificultad);?></span>
				</div>
				<div class="grand">
					<p class="h4 text-info">Categoria</p>
					<span class="h3"><?php echo htmlentities($result->nombrecat);?></span>
				</div>
			</div>

		</form>
		<?php include('includes/modalEvaluacionA.php');?>		
<!--mymodal3-->
    <!-- login  -->
    
    <div class="modal fade" id="myModalCalificaAtr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" data-blast="bgColor">
                    <h5 class="modal-title" id="exampleModalLabel">Valoración</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-center">Agradecemos el que puedas calificar a nuestro atractivo, para que sirva como referencias a los demas visitanes, en un rango de 1 a 10 estrellas</label>
                            <label for="recipient-name" class="col-form-label">Cantidad de Estrellas</label>
                            <div class="text-center">                        
                                <button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
                                <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                <span class="fas fa-star" aria-hidden="true"></span>
                                </button>                                      
                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                <span class="fas fa-star" aria-hidden="true"></span>
                                </button>
                            <input type="hidden" class="form-control" id="rating2" name="rating" value="1">
                            </div>
                            <label for="" class="col-form-label">Comentario</label>
                            <textarea class="form-control" name="comentario" id="comentA"></textarea>
                        </div>
                        <input type="hidden" value="<?= $aid;?>" name="atid" id="idat">
                        <input type="hidden" value="<?= $idcli;?>" name="idcli" id="idcliA">
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="enviar" name="" id="solicitaA" data-dismiss="modal">
						</div>
                </div>
            </div>
        </div>
    </div>
    <!-- //login -->

<!-- nuevo modal registro -->
<div class="modal fade" id="myModalRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" data-blast="bgColor">
                    <h5 class="modal-title" id="exampleModalLabel">CREA TU CUENTA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="signup" method="POST" class="p-3">
                        <div class="form-group">
                            <label for="fname" class="col-form-label">Nombre Completo</label>
							<input type="text" class="form-control" name="fname" autocomplete="off" placeholder="Ingrese su nombre" required>
                            <label for="dni" class="col-form-label">Número de Identificación</label>
                            <input type="text" name="dni" class="form-control" placeholder="Ingrese su DNI" autocomplete="off" required>
							<label for="mobilenumber" class="col-form-label">Número de Teléfono</label>
                            <input type="text" name="mobilenumber" class="form-control" placeholder="Ingrese su número de teléfono" autocomplete="off" maxlength="12" required>
							<label for="email" class="col-form-label">Correo Electrónico</label>
							<input type="text" class="form-control" placeholder="Email" name="email" id="email" onBlur="checkAvailability()" autocomplete="off"  required="">	
		 					<span id="user-availability-status" style="font-size:12px; color:#ff0000"></span> 
                             <br/>
                             <label for="pass" class="col-form-label">Contraseña</label>
                            <input type="text" name="pass" class="form-control" placeholder="Ingrese su contraseña" autocomplete="off" maxlength="12" required>
							 <p>Estoy de acuerdo con los <a href="politicas_terminos.php" target="_blank">terminos, condiciones y políticas de privacidad</a></p> 
						</div>
                        <div class="right-w3l text-center">
						
                            <input type="submit" class="btn btn-success btn-lg" id="submit" value="Crear Cuenta" name="submit2">
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--modal registro-->

<?php }} 

?>

<div id="comentarioA"></div>

<div class="text-right fixed-top mr-2 mt-5" style="position-fixed;">
	<a href="#" data-toggle="modal" data-target="<?php echo $sesion==1? '#myModalCalificaAtr':'#myModalRegistro' ?>" ><button class="btn btn-primary btn-lg" name="btnReserva"><i class="fas fa-star"></i> Calificar</button></a>
</div>

<div class="fixed-bottom mb-4">
<div class="btn btn-danger mx-4 py-2">
	<h3 class="text-right"><a href="attractive-list.php" style="color:white;"><i class="fas fa-arrow-circle-left"></i> Volver</a></h3>
</div>	
</div>

	</div>


</div>
<!--- /selectroom ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/registro.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/ingresar.php');?>
		
<!-- //signin -->
<!-- write us -->
<?php //include('includes/write-us.php');?>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#comentarioA').load('includes/comentarioA.php');
    	//$('#buscador').load('componentes/buscador.php');
	});
</script>