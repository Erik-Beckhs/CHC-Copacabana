<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['paqid']))
{
	$paqid=intval($_GET['paqid']);
}
else{
	$paqid=$_POST['paqid'];
}

if(isset($_POST['solicitar']))
{
$cantidad=$_POST['cantidad'];
$fecha=$_POST['fecha'];
$sql="select * from reserva where idpaq=? and fechasol=?";
$query = $dbh->prepare($sql);
$query->execute([$paqid, $fecha]);
$results=$query->fetchAll(PDO::FETCH_OBJ);

$sql3="select cantidadp from paquete where idpaq=?";
		$query3=$dbh->prepare($sql3);
		$query3->execute([$paqid]);
		$results3=$query3->fetchAll(PDO::FETCH_OBJ);
		foreach($results3 as $result3)
		{
			$cantp=htmlentities($result3->cantidadp);
		}

		if($query->rowCount() > 0)
		{
			$sql2="select idpaq, fechasol, sum(cantper) as cant from reserva where fechasol=? and idpaq=? group by idpaq, fechasol";
			$query2=$dbh->prepare($sql2);
			$query2->execute([$fecha, $paqid]);
			$results2=$query2->fetchAll(PDO::FETCH_OBJ);
			foreach($results2 as $res)
			{
				$cantocup=htmlentities($res->cant);
			}
					if($cantocup+$cantidad <= $cantp)
					{
						$s=1;
					}
					else {
						$s=0;
					}
		}
		else {
					if($cantidad <= $cantp)
					{
						$s=1;
					}
					else {
						$s=0;
					}
				
		}
header("location:detalles_reserva.php?st=$s&ca=$cantidad&paq=$paqid&fs=$fecha");
}

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
<!--<link href="css/bootrap.min.css" rel='stylesheet' type='text/css'/>-->
<link href="css/style2.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="css/fontawesome/css/brands.css" rel="stylesheet">
  <link href="css/fontawesome/css/solid.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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
						//$(function() {
						//$( "#datepicker,#datepicker1" ).datepicker();
						//});
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
.list{
    font-size: 12px;
    padding-left:10px;
  }
  .selectroom_right li{
	  width:80%;
  }
		</style>				
</head>
<body>
<!-- top-header -->
<?php include('includes/header2.php');?>
<div class="banner-3">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> CHC - Paquetes Turísticos</h1>
	</div>
</div>
<!--- /banner ---->
<!--- selectroom ---->
<div class="selectroom">
	<div class="container">	
<?php 


$sql= "select idpaq, nombre, detalle, precio, imgpaq, videoPaq from paquete where idpaq=$paqid";
$query = $dbh->prepare($sql);
$query -> bindParam(':aid', $aid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

	
		<div class="selectroom_top">
		<div class="row">
			<div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
			<?php
			  $video=htmlentities($result->videoPaq);
			 	if($video!=null){
					 ?>
					 <video src="admin/videos/paquetes/<?= $video;?>" controls width='340'></video>
					 
				 <?php
				 } 
				 else {
					 ?>
					 <img src='admin/packageimages/<?php echo htmlentities($result->imgpaq);?>' class='card-img' width='500' height='250'>
					 <?php
				 }
			  ?>
			  
<?php
$sqlpr= "select * from promocion where idpaquete=$paqid";
$querypr = $dbh->prepare($sqlpr);
$querypr->execute();
$resultspr=$querypr->fetch(PDO::FETCH_OBJ);
if($querypr->rowCount() == 1)
{
	$descuento=htmlentities($resultspr->descuento);
	$preciopromo=htmlentities($resultspr->preciopromo);
	$fechafin=htmlentities($resultspr->fechafin);
}

?>
			  <?php
			 if(isset($descuento)){
				 if($descuento==.1){
					$v='10.jpg';
				 }
				 else if($descuento==.2){
					$v='20.png';
				}
				else if($descuento==.3){
					$v='30.jpg';
				}
				else if($descuento==.4){
					$v='40.jpg';
				}
				else if($descuento==.5){
					$v='50.png';
			 }
			  
			  ?>	
			
			
			<?php }?>
			</div>
			<div class="col-md-8 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">

			<div class="row">
				<h2 class="text-info"><i class="fab fa-servicestack"></i> <?php echo htmlentities($result->nombre);?></h2>
				<div class="my-2">
					<?php echo htmlentities($result->detalle);?></p>
				</div>
			</div>
		
			<div class="row py-4 border rounded">
				<div class="col border-right mx-auto">
				<div class="badge badge-primary text-wrap" style="width: 17rem; background-color:#E87A56">
				
					<h5 class="text-white"><i class="fas fa-hiking"></i> Actividades que incluye el paquete</h5>
					</div>

			<p class="card-text">
              <ul>
              <?php 
               $sql="select * from servicio s, paqserv ps where s.idserv=ps.idserv and ps.idpaq=?";
               $query=$dbh->prepare($sql);
                $query->execute([htmlentities($result->idpaq)]);
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                if($query->rowCount() > 0)
                {
                foreach($results as $result2)
                {	
              ?><div class="display"></div>
			  <li class="text-capitalize list"><i class="fa fa-check fa-sm"></i>
              <?= htmlentities($result2->detalle);?></li>
              <?php
              }}
              ?>
              </ul>
              </p>

				</div>
				<div class="col mx-auto">
				<div class="badge badge-primary text-wrap" style="width: 17rem; background-color:#E87A56">
				
					<h5 class="text-white"><i class="fas fa-glasses"></i> ¿Qué llevar?</h5>
					</div>
				<p class="card-text">
              <ul>
              <?php 
               $sql="select * from objeto o, paqobj po where o.idobj=po.idobj and po.idpaq=?";
               $query=$dbh->prepare($sql);
                $query->execute([htmlentities($result->idpaq)]);
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                if($query->rowCount() > 0)
                {
                foreach($results as $result2)
                {	
              ?><div class="display"></div>
			  <li class="text-capitalize list"><i class="fa fa-check fa-sm"></i>
              <?= htmlentities($result2->nombre);?></li>
              <?php
              }}
              ?>
              </ul>
              </p>
			  
				</div>
			</div>
			<?php if(isset($descuento)){
				?>
				<img class="position-relative" src="images/<?= $v;?>" width="200" style="position:absolute; top:-150px; left:130px; visibility:visible z-index:10">
				<?php
				}
			?>
			
			</div>
			<!--espacio en blanco-->
						<div class="clearfix"></div>
		</div>
		<div class="container bg-info col-md-12">

		<?php
		if (isset($descuento))
		{
			?>
			<p class="text-right"><span class="text-white h4 pl-3 font-weight-bold">Antes: </span>
			<span class="h4 text-white border-right pr-3"><?php echo htmlentities($result->precio);?> Bs</span> <span class="text-white h4 pl-3 font-weight-bold">    Ahora: </span>
			<span class="h2 text-warning text-font-weight border-right pr-3"><?php echo $preciopromo;?> Bs</span>
			<span class="text-white h4 pl-3 font-weight-bold">  Promociòn valida hasta: </span>
			<span class="h4 text-white"><?php echo obtenerFechaEnLetra($fechafin);?></span>
			</p>
		<?php	
		}
		else {
			?>
			<p class="text-right"><span class="text-white h4 pl-3 font-weight-bold">A tan sólo: </span>
					<span class="h2 text-white"><?php echo htmlentities($result->precio);?> Bs</span></p>
					
		<?php
		}
		?>
		</div>		

		<div class="border-bottom">

		<div class="my-2">
		
              <?php 
               $sql="select * from atractivo a, paqatr pa where a.id=pa.idatr and pa.idpaq=?";
               $query=$dbh->prepare($sql);
                $query->execute([htmlentities($result->idpaq)]);
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                if($query->rowCount() > 0)
                {
					?>
					<div class="badge badge-primary text-wrap my-2" style="width: 17rem; background-color:#E87A56">
					<h4 class="text-white">
					Atractivos a Visitar
					</h4>
					</div>
					<div class="row py-4 text-justify">
					<?php
                foreach($results as $result2)
                {	
					$descr=substr(htmlentities($result2->descripcion),0,250)
              ?>
			  
			  <div class="card mx-auto" style="width: 30rem;">
			  
			  <img src='admin/attractiveimages/<?php echo htmlentities($result2->img);?>' class='img-fluid' style='width:300px; height:250px !important;'>
			  	
				<div class="card-body text-center">
				<div class="badge badge-primary text-wrap bg-dark">
					<h5 class="text-white"><?php echo htmlentities($result2->nombre);?></h5>
				</div>
					<h5 class="card-text py-2 text-justify"><?php echo $descr; ?>...</h5>
					<a href="attractive-details.php?atid=<?= htmlentities($result2->idatr);?>" class="btn btn-primary text-capitalize my-2">ver atractivo</a>
				</div>
				</div>
			  
              <?php
              }}
              ?>
</div>
</div>
</div>
		



              <?php 
               $sql="select * from institucion i, hotel h, paqhot ph where h.idinst=ph.idhot and i.idinst=h.idinst and ph.idpaq=?";
               $query=$dbh->prepare($sql);
                $query->execute([htmlentities($result->idpaq)]);
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                if($query->rowCount() > 0)
                {
					?>
					<div class="badge badge-primary text-wrap" style="width: 17rem; background-color:#E87A56;">
					<h4 class="text-white">
							Hoteles de estadía
					</h4>

					</div>

					<div class="row py-4">
<?php
                foreach($results as $result2)
                {	
					$descr=substr(htmlentities($result2->descripcion),0,250)
              ?>
			  
			  <div class="card mx-2" style="width: 18rem;">
			  <img src="admin/instimages/<?php echo htmlentities($result2->imgInst);?>" class="card-img-top" width="500" height="230">
				<div class="card-body">
				<div class="badge badge-primary text-wrap mx-4" style="width: 11rem; background-color:#000">
					<h5 class="text-white"><?php echo htmlentities($result2->nombre);?></h5>
				</div>
					<p class="text-warning text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fa fa-star text-white"></i></p>
					<h5 class="card-text"><?php echo $descr; ?>...</h5>
					<a href="hotel-details.php?hid=<?= htmlentities($result2->idinst)?>" class="btn btn-primary text-capitalize my-2">ver hotel</a>
				</div>
				</div>
			  
              <?php
			  }
			?>
			</div>
			<?php
			}
              ?>

			</div>
<?php
if($sesion==1)
{
	?>
	<div class="text-right fixed-top mr-2 mt-5">
	<a href="#" data-toggle="modal" data-target="#myModal3" ><button class="btn btn-primary btn-lg" name="btnReserva"><i class="fas fa-user-check"></i> Reservar</button></a>
	</div>
	<div class="text-right">
	<a href="#" data-toggle="modal" data-target="#myModal3" ><button class="btn btn-primary btn-lg" name="btnReserva"><i class="fas fa-user-check"></i> Reservar</button></a>
	<a href="#" data-toggle="modal" data-target="#myModalCalificaPaquete" ><button class="btn btn-primary btn-lg" name="btnCalifica"><i class="fas fa-star"></i> Calificar</button></a>
	</div>
<?php
}
else {
	?>
			<?php $r=1; ?>
			
			<div class="text-right fixed-top my-4 mx-2 mt-5">
			<a href="#" data-toggle="modal" data-target="#myModal" ><button class="btn btn-primary btn-lg" name="btnReserva"><i class="fas fa-user-check"></i> Reservar</button></a>
			</div>
			<div class="text-right">
			<a href="#" data-toggle="modal" data-target="#myModal" ><button class="btn btn-primary btn-lg" name="btnReserva"><i class="fas fa-user-check"></i> Reservar</button></a>
			</div>
	<?php
}
?>

			</div>
			</div>
			</div>
			
			<div class="fixed-bottom mb-4">
			<div class="btn btn-danger mx-4 py-2">
				<h3 class="text-right"><a href="attractive-list.php" style="color:white;"><i class="fas fa-arrow-circle-left"></i> Volver</a></h3>
			</div>	
			</div>		
			

<?php }} ?>

<!--mymodal3-->
    <!-- login  -->
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" data-blast="bgColor">
                    <h5 class="modal-title" id="exampleModalLabel">Reserva</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="signup3" method="post" class="p-3" action="package-details.php">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Cantidad de Personas</label>
                            <select name="cantidad" class="form-control">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
                        
                            <label for="" class="col-form-label">Fecha</label>
                            <input type="date" name="fecha" class="form-control">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Solicitar" name="solicitar">
						</div>
						<input type="hidden" value="<?= $paqid;?>" name="paqid">
                    </form>
                </div>
            </div>
        </div>
    </div>
	<!-- //login -->

</div>

	</div>
	    <!-- login  -->
    
		<div class="modal fade" id="myModalCalificaPaquete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form name="signup3" method="post" class="p-3" id="ratingForm" action="includes/controlador_paquete.php">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-center">Para mejorar nuestros servicios, agradecemos que califique nuestro paquete segun la experiencia que haya tenido con el paquete</label>
                            <label for="recipient-name" class="col-form-label">Cantidad de Estrellas</label>
                            <div class="text-center">                        
                                <button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>                                      
                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                            <input type="hidden" class="form-control" id="rating" name="rating" value="1">
                            </div>
                            <label for="" class="col-form-label">Comentario</label>
                            <textarea class="form-control" name="comentario"></textarea>
                        </div>
                        <input type="hidden" value="<?= $paqid;?>" name="paqid">
                        <input type="hidden" value="<?= $idcli;?>" name="idcli">
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="enviar" name="solicitar">
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //login -->

	<?php
	 include('includes/calificap.php');
	?>

	</div>
</div>
<!--- /selectroom ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/registro.php');?>
<?php include('includes/ingresar.php');?>			
<!-- //signu -->
<!-- signin -->
<?php //include('includes/modalReserva.php');?>	
<?php include('includes/modalEvaluacion.php');?>		
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>
</body>
</html>
<?php
function obtenerFechaEnLetra($fecha){
    $dia= conocerDiaSemanaFecha($fecha);
    $num = date("j", strtotime($fecha));
    $anno = date("Y", strtotime($fecha));
    $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
    return $dia.', '.$num.' de '.$mes.' del '.$anno;
}
 
function conocerDiaSemanaFecha($fecha) {
    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    $dia = $dias[date('w', strtotime($fecha))];
    return $dia;
}
?>