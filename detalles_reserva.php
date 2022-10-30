<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_GET['st']))
{
	$estado=$_GET['st'];
	//$idcli=$_SESSION['login'];
	$idpaq=$_GET['paq'];
	$cantidad=intval($_GET['ca']);
	$fs=$_GET['fs'];
}
if (isset($_POST['confirma']))
{
$ic=$_POST['idcli'];
$ip=$_POST['idpaq'];
$cant=$_POST['cantidad'];
$fecha=$_POST['fecha'];
$total=$_POST['monto'];

$sql="insert into reserva (idus, idpaq, cantper, fechasol, total) values ($ic, $ip, $cant, '$fecha', '$total')";
$query=$dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{ 	
    $idr=$lastInsertId;
    $op=1;
}
else {
    $op=0;
}}

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
  .badge-primary{
	  background-color:#ff4f81;
  }
		</style>				
</head>
<body>
<?php
if(isset($op)){
    if($op==1):
    ?>
    <script type="text/javascript">
        $(window).load(function(){
            $('#resExito').modal('show');
        });
    </script>
    <?php
    else:
    ?>
    <script type="text/javascript">
        $(window).load(function(){
            $('#resFallo').modal('show');
        });
    </script>
<?php
    endif;
}
?>

<!-- top-header -->
<?php include('includes/header2.php');?>
<div class="banner-3">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> CHC - Paquetes Turísticos</h1>
	</div>
</div>
<!--- /banner ---->
	 <!-- contact -->
	 <div class="contact-wthree pt-lg-5" id="contact">
        <div class="container py-md-5 py-4">
            <div class="title-desc text-left pb-3">
				  <?php
				  
					  if($estado==0)
					  {
						  ?>
						  <div class="badge badge-primary text-wrap" style="width: 70rem;">
						<h3 class="main-title-w3pvt  text-capitalize text-white"><i class="fas fa-sad-tear"></i> Lo sentimos, no nos queda vacantes, elija otra fecha!!</p>
					  </div>
					  <a href="package-list.php"></a><button class="btn btn-primary"> Volver </button>
						<?php
					  }
					  else
					  {
						?>
						<div class="badge badge-primary text-wrap" style="width: 40rem;">
						<h3 class="main-title-w3pvt  text-capitalize text-white"><i class="fas fa-smile-wink"></i> Aún nos quedan vacantes!!</p></h3>
					  </div>
						<p class="main-title-w3pvt  text-capitalize">A continuacion se muestran los detalles de su reserva </p>					
            </div>
            <div class="row py-lg-5 py-sm-4">
                <div class="col-lg-12">
                    <div class="w3_pvt-contact-top">
                        <h2>Detalles</h2>
                    </div>
                    <hr>
                    <div class="col-lg-6 mt-3">
                        <!-- register form grid -->
                        <div class="register-top1">
                            <form method="POST" class="register-wthree">
								<?php
									$sql="select * from usuario where email=?";
									$query=$dbh->prepare($sql);
									$query->execute([$_SESSION['login']]);
									$results=$query->fetchAll(PDO::FETCH_OBJ);

									if($query->rowCount() > 0)
									{
									foreach($results as $result)
									{	
								?>
                                <div class="form-group">
                                            <label>
                                                Nombre Completo:
                                            </label>
                                            <input class="form-control" type="text" readonly="readonly" name="name" value="<?= htmlentities($result->nombrecom);?>" data-blast="borderColor">
								</div>
								<div class="form-group">
                                            <label>
                                                Email:
                                            </label>
                                            <input class="form-control" type="text" readonly="readonly" name="email" value="<?= htmlentities($result->email);?>"  data-blast="borderColor">
								</div>
								<div class="form-group">
                                            <label>
                                                Telefono:
                                            </label>
                                            <input class="form-control" type="text" readonly="readonly" name="telefono" value="<?= htmlentities($result->telefono);?>"  data-blast="borderColor">
								</div>
								<input type="hidden" name="idcli" value="<?= htmlentities($result->id)?>">
								<?php }} 
								$sql="select nombre, precio from paquete where idpaq=$idpaq";
								$query=$dbh->prepare($sql);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);

									if($query->rowCount() > 0)
									{
									foreach($results as $result)
									{
								?>
								
								<div class="form-group">
                                            <label>
                                                Paquete:
                                            </label>
                                            <input class="form-control" type="text" readonly="readonly" name="paquete" value="<?= htmlentities($result->nombre);?>" data-blast="borderColor">
								</div>
								<?php 
								$precio=htmlentities($result->precio);
                                $sqlpromo="select * from promocion where idpaquete=$idpaq";
								$querypromo=$dbh->prepare($sqlpromo);
								$querypromo->execute();
								$resultspromo=$querypromo->fetch(PDO::FETCH_OBJ);

								if($querypromo->rowCount() == 1)
								{
                                    $precio=htmlentities($resultspromo->preciopromo);
                                }
								$total=intval($precio)*$cantidad;
								}}
								?>
								<div class="form-group">
											<label>
                                               Fecha Solicitada:
                                            </label>
                                            <input class="form-control" type="text" readonly="readonly" name="fecha" value="<?= $fs; ?>" data-blast="borderColor">
											</div>
											<div class="form-group">
                                            <label>
                                                Cantidad de Personas:
                                            </label>
                                            <input class="form-control" type="text" readonly="readonly" name="cantidad" value="<?= $cantidad; ?>" data-blast="borderColor">
								</div>
								<div class="form-group">
                                            <label>
                                                Monto a Cancelar:
											</label>
											
                                            <input class="form-control" type="text" readonly="readonly" name="monto" value="<?= $total;?> Bs" data-blast="borderColor">
								</div>	
								
											<input type="hidden" name="idpaq" value="<?= $idpaq;?>">

											<input type="submit" data-blast="bgColor" class="btn btn-w3_pvt btn-block text-white font-weight-bold text-uppercase bg-theme" name="confirma" value="Confirmar Reserva">  
													
                            </form>
                        </div>
                        <!--  //register form grid ends here -->
						<?php
					  }
				 ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

		<!-- reservaexitosa  -->
		<div class="modal fade" id="resExito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" data-blast="bgColor">
                    <h5 class="modal-title" id="exampleModalLabel">Información</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="GET" class="p-3" action="comprobante.php">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Su reserva se realizó de manera exitosa, nuestro equipo se comunicará con usted</label>
                            <p>Gracias por confiar en nosotros</p>          
                        </div>
                        <input type="hidden" value="<?= $idr;?>" name="rid">
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Ver Comprobante" name="verificar">
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<!-- //reservaexitosa -->
	<!-- reservafallo  -->
    <div class="modal fade" id="resFallo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" data-blast="bgColor">
                    <h5 class="modal-title" id="exampleModalLabel">Información</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="signup3" method="post" class="p-3" action="package-details.php">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Fallo al registrar</label>
                            <p>Ocurrió un error, le rogamos intente más tarde</p>
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Verificar" name="verificar2">
						</div>
						<input type="hidden" value="<?= $paqid;?>" name="paqid">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //reservafallo -->
	<!-- //contact -->

<!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/registro.php');?>	
<?php include('includes/ingresar.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/modalReserva.php');?>				
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>
</body>
</html>