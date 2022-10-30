<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['hid']))
{
	$hid=intval($_GET['hid']);
	$_SESSION['hid']=$hid;
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
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/funciones.js"></script>

<script src="js/bootstrap.min.js"></script>
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
.list{
    font-size: 12px;
    padding-left:10px;
  }
  .selectroom_right li{
	  width:80%;
  }
  .valoracion{
    position:absolute;
    font-size:1em;
    top:5px;
    right:5px;
    width:60px;
    height:40px;
    background-color:orange;
    z-index:10;
    border-radius:5px;
  }
  img{
    width:100%;
    position:relative;
  }
  .xd:hover{
	font-size:30px;
	transition: 0.05s ease-out;
  }
		</style>				
</head>
<body>
<!-- top-header -->
<?php include('includes/header2.php');?>
<div class="banner-3">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> CHC - Hoteles</h1>
	</div>
</div>
<!--- /banner ---->
<!--- selectroom ---->
<div class="selectroom">
	<div class="container" style="min-height:250px;">	
		  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>INFORMACIÓN</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<?php 
$sql="select * from institucion i, hotel h, usuario u where i.idinst=h.idinst and i.idencargado=u.id and i.idinst=?";
$query = $dbh->prepare($sql);
$query->execute([$hid]);
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
	$inst=htmlentities($result->idinst);
	$sqlv="select idinst, avg(valoracion) val from calificai where idinst='$inst' group by idinst";
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
	<?php
$direccion=htmlentities($result->direccion);
$ubicacion=htmlentities($result->ubicacion);
$pagina=htmlentities($result->pagina);
$facebook=htmlentities($result->facebook);
$telefono=htmlentities($result->telefono);
$correo=htmlentities($result->correo);
$descripcion=htmlentities($result->descripcion);
$video=htmlentities($result->videoUrl);
?>
		<div class="selectroom_top">
		<div class="row">
			<div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
				<h4><span class="valoracion text-right text-white pr-2 py-1">
				<?= number_format($val,2);?>
			</span></h4>

				<img src="admin/instimages/<?php echo htmlentities($result->imgInst);?>" class="card-img" width="500" height="250">
				<?php
				if($video!=null){
				?>
					<div class="mt-1">
					<div class="text-center">
					<a class="btn bg-theme mt-4 w3_pvt-link-bnr scroll text-white" data-blast="bgColor"
                                href="#ModalVideo" data-toggle="modal" role="button" data-target="#ModalVideo"><span class="h4"> Ver Oferta <i class="fas fa-video"></i></span></a>
					</div>
					</div>
					<?php
				}
				?>
			</div>
			<div class="col-md-8 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">

				<div class="row">
					<div class="col-sm-4 border-right">
						<div class="row">
							<h2 class="text-info text-center"><?php echo htmlentities($result->nombre);?></h2>
						</div>

						<div class="row">
						<span class="mx-auto">
							<?php
						$star=htmlentities($result->idcat);
						$starwhite=5-$star;
						for($i=0; $i<$star; $i++)
						{
							?>
							<i class="fas fa-star text-warning"></i>
							<?php
						}
						for($j=0; $j<$starwhite; $j++)
						{
						?>
						<i class="fa fa-star"></i>
							<?php
							}
							?>
							</span>
						</div>
				<div class="row mt-1">
				<p class="text-info mx-auto h3"><span class="mx-auto"> Desde:<b><span class="h3 text-dark"><?php echo htmlentities($result->tarifa);?></b></span><span class="text-info"> Bs</span></span></p>
				</div>

			</div>

			<div class="col-md-7 mx-4">
				<div class="row">
				<span class="h5"><i class="fas fa-map-marker-alt text-danger"></i>
					<a href=<?= $ubicacion;?> target="_blank"><?= $direccion;?></a></span>
				</div>
				<?php
					if($pagina!=null)
					{
				?>
				<div class="row">
				<span class="h5"><i class="fas fa-globe text-info"></i>
					<a href=<?= $pagina;?> target="_blank">Pagina Web</a></span>
				</div>
				<?php
					}
				?>
				<?php
				if($facebook!=null)
				{
				?>
				<div class="row">
				<span class="h5"><i class="fab fa-facebook-square text-primary"></i>
					<a href=<?= $facebook;?> target="_blank">Siguenos en Facebook</a></span>
				</div>
				<?php
				}
				?>
				<div class="row">
				<span class="h5"><i class="fab fa-whatsapp text-success"></i>
				<a href=""><?= $telefono;?></a></span>
				</div>

				<?php
					if($correo!=null)
					{
					?>
				<div class="row">
				<span class="h5"><i class="fas fa-envelope-open text-danger"></i>
					<a href=""><?= $correo;?></a></span>
				</div>
				<?php
				}
				?>
			</div>
			</div>

				<div class="row py-4 text-justify">
					<?php echo $descripcion;?></p>
					
				</div>
			</div>
			</div>


			<div class="row py-4 mx-4 justify-content-center h-100 border rounded">
				<div class="col-md-4 border-right">
				<div class="badge badge-primary text-wrap" style="width: 17rem; background-color:#549FF4;">
					<h4 class="text-white m-2"><i class="fas fa-coffee"></i> Servicios</h4>
					</div>

			<p class="card-text py-2" >
              <ul>
              <?php 
               $sql="select * from servicio s, instserv ise where s.idserv=ise.idservicio and ise.idinst=?";
               $query=$dbh->prepare($sql);
                $query->execute([htmlentities($result->idinst)]);
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                if($query->rowCount() > 0)
                {
                foreach($results as $result2)
                {	
              ?>
			  <li class="text-capitalize list"><i class="fa fa-check fa-sm"></i>
              <?= htmlentities($result2->detalle);?></li>
              <?php
              }}
              ?>
              </ul>
              </p>
				</div>

				<div class="col-md-4 border-right">
				<div class="badge badge-primary text-wrap" style="width: 17rem; background-color:#549FF4;">
				
					<h4 class="text-white m-2"><i class="fas fa-asterisk"></i> Características</h4>
					</div>
				<p class="card-text py-2">
              <ul>
              <?php 
               $sql="select * from hotcar hc, caracteristica c where hc.idcar=c.idcar and hc.idhotel=?";
               $query=$dbh->prepare($sql);
                $query->execute([htmlentities($result->idinst)]);
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                if($query->rowCount() > 0)
                {
                foreach($results as $result2)
                {	
			  ?>
			  <div class="display"></div>
			  <li class="text-capitalize list"><i class="fa fa-check fa-sm"></i>
              <?= htmlentities($result2->detalle);?></li>
              <?php
              }}
              ?>
              </ul>
              </p>
				</div>

				<div class="col-md-4">
				<div class="badge badge-primary text-wrap" style="width: 17rem; background-color:#549FF4;">
				
					<h4 class="text-white m-2"><i class="fas fa-bed"></i> Tipos de Hab.</h4>
					</div>
				<p class="card-text py-2">
              <ul>
              <?php 
               $sql="select * from tipohab t, hottipohab ht where ht.idtipo=t.idtipo and ht.idhotel=?";
               $query=$dbh->prepare($sql);
                $query->execute([htmlentities($result->idinst)]);
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                if($query->rowCount() > 0)
                {
                foreach($results as $result2)
                {	
			  ?>
			  <div class="display"></div>
			  <li class="text-capitalize list"><i class="fa fa-check fa-sm"></i>
              <?= htmlentities($result2->detalle);?></li>
              <?php
              }}
              ?>
              </ul>
              </p>
			

			</div>
			</div>
				
			</div>
		
			</div>
		<!-- modal video -->
		<div class="modal fade" id="ModalVideo" tabindex="-1" role="dialog" aria-labelledby="ModalVideo"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                    <video src="admin/videos/instvideo/<?= $video; ?>" controls></video>
            </div>
        </div>
    </div>
    <!-- //modal video -->
<?php }} ?>
</div>

<div id="comentario"></div>

	</div>
</div>

<div class="fixed-bottom mb-4">
<div class="btn btn-danger mx-4 py-2">
	<h3 class="text-right"><a href="hoteles-list.php" style="color:white;"><i class="fas fa-arrow-circle-left"></i> Volver</a></h3>
</div>	
</div>	

<?php
if($sesion==1)
{
	?>
	<div class="text-right fixed-top mr-2 mt-5" style="position-fixed">
	<a href="#" data-toggle="modal" data-target="#myModalCalificaHotel" ><button class="btn btn-primary btn-lg" name="btnCalifica"><i class="fas fa-star"></i> Calificar</button></a>
	</div>

	<!--modalCalifica-->
<div class="modal fade" id="myModalCalificaHotel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            <label for="recipient-name" class="col-form-label text-center">Para mejorar nuestros servicios, agradecemos que califique nuestro hotel segun la experiencia que haya tenido con el mismo</label>
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
                            <input type="hidden" class="form-control" id="rating" name="rating" value="1">
                            </div>
                            <label for="" class="col-form-label">Comentario</label>
                            <textarea class="form-control" name="" id="coment"></textarea>
                        </div>
                        <input type="hidden" value="<?= $hid;?>" name="" id="idhot">
                        <input type="hidden" value="<?= $idcli;?>" name="" id="idcli">
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="enviar" name="" id="solicita" data-dismiss="modal">
						</div>
                </div>
            </div>
        </div>
    </div>
    <!-- //modalCalifica -->

<?php
}
	?>

<!--- /selectroom ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/registro.php');?>	
<?php include('includes/ingresar.php');?>			
<!-- //signu -->
<?php include('includes/modalEvaluacionH.php');?>
<!-- signin -->
<?php include('includes/modalReserva.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#comentario').load('includes/comentarioI.php');
    	//$('#buscador').load('componentes/buscador.php');
	});
</script>