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
                            Estado <small>Reserva de Paquetes
 </small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
				<?php
						$sql = "select *
						from reserva r, paquete p, institucion i, usuario u
						where r.idpaq=p.idpaq and p.idagencia = i.idinst and i.idencargado = u.id and r.estado=0 and u.email = ?";
						$query=$dbh->prepare($sql);
						$query->execute([$email]);
						$c=$query->rowCount();	
				?>

					<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
							
							<div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
											<button class="btn btn-default" type="button">
												Reservas sin confirmar
  <span class="badge"><?php echo $c ; ?></span>
											</button>
											</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                        <div class="panel-body">
                                           <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Pasajero</th>
                                            <th>Telefono</th>
                                            <th>Correo</th>
											<th>Paquete</th>
											<th>Fecha Reserva</th>
											<th>Fecha Salida</th>
											<th>Monto</th>
											<th>Estado</th>
											<th>Más</th>	
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
									$tsql = "select r.idres idres, r.total total, r.fechareserva fechareserva, u.nombrecom nombrecom, u.telefono telefono, u.email email, p.nombre nombre, p.precio precio, r.cantper cantper, r.fechareserva fechar, fechasol fechas from reserva r, paquete p, institucion i, usuario u where p.idpaq=r.idpaq and r.estado=0 and p.idagencia=i.idinst and r.idus=u.id and i.idencargado=(select id from usuario where email=?) order by r.fechareserva";
									
									$query = $dbh -> prepare($tsql);
									$query->execute([$email]);
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									if($query->rowCount() > 0)
									{
										$count=0;
									foreach($results as $result2)
									{
										$count=$count+1;
										$idres=htmlentities($result2->idres);
										$nombre=htmlentities($result2->nombrecom);
										$telefono=htmlentities($result2->telefono);
										$correo=htmlentities($result2->email);
										$nombrepaq=htmlentities($result2->nombre);
										$fecha_res=htmlentities($result2->fechar);
										$fecha_sol=htmlentities($result2->fechas);
										$precio=htmlentities($result2->precio);
										$cantper=htmlentities($result2->cantper);
										$total=htmlentities($result2->total);
										$estado=htmlentities($result2->estado);
										if($estado==0)
										{
											$msg="Sin confirmar";
										}
										else{
											$msg="confirmado"; 
										}

										echo"<tr>
											<td>".$count."</td>
											<td>".$nombre."</td>
											<td>".$telefono."</td>
											<td>".$correo."</td>
											<td>".$nombrepaq."</td>
											<td>".$fecha_res."</td>
											<td>".$fecha_sol."</td>
											<td>".$total."</td>
											<td>".$msg."</td>
											
											<td><a href='confirmaReserva.php?rid=".$idres." ' class='btn btn-primary'>Confirmar</a></td>
											</tr>";
											
									
									}}
									?>
                                        
                                    </tbody>
                                </table>
								
                            </div>
                        </div>
                    </div>
                      <!-- End  Basic Table  --> 
                                        </div>
                                    </div>
                                </div>
                                <?php
								
								$sql = "select *
								from reserva r, paquete p, institucion i, usuario u
								where r.idpaq=p.idpaq and p.idagencia = i.idinst and i.idencargado = u.id and r.estado=1 and u.email = ?";
								$query=$dbh->prepare($sql);
								$query->execute([$email]);
								$c2=$query->rowCount();
						
								?>
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">
											<button class="btn btn-primary" type="button">
												 Reservas Confirmadas  <span class="badge"><?php echo $c2 ; ?></span>
											</button>
											</a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
										<th>#</th>
                                            <th>Pasajero</th>
                                            <th>Telefono</th>
                                            <th>Correo</th>
											<th>Paquete</th>
											<th>Fecha Reserva</th>
											<th>Fecha Salida</th>
											<th>Monto</th>
											<th>Más</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
									$t2sql = "select r.idres idres, r.total total, u.nombrecom nombrecom, u.telefono telefono, u.email email, p.nombre nombre, p.precio precio, r.cantper cantper, r.fechareserva fechar, fechasol fechas from reserva r, paquete p, institucion i, usuario u where p.idpaq=r.idpaq and r.estado=1 and p.idagencia=i.idinst and r.idus=u.id and i.idencargado=(select id from usuario where email=?) order by r.fechareserva";
									
									$query = $dbh -> prepare($t2sql);
									$query->execute([$email]);
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									if($query->rowCount() > 0)
									{
										$count=0;
									foreach($results as $result2)
									{
										$count=$count+1;
										$idres=htmlentities($result2->idres);
										$nombre=htmlentities($result2->nombrecom);
										$telefono=htmlentities($result2->telefono);
										$correo=htmlentities($result2->email);
										$nombrepaq=htmlentities($result2->nombre);
										$fecha_res=htmlentities($result2->fechar);
										$fecha_sol=htmlentities($result2->fechas);
										$precio=htmlentities($result2->precio);
										$cantper=htmlentities($result2->cantper);
										$total=htmlentities($result2->total);
										echo"<tr>
											<td>".$count."</td>
											<td>".$nombre."</td>
											<td>".$telefono."</td>
											<td>".$correo."</td>
											<td>".$nombrepaq."</td>
											<td>".$fecha_res."</td>
											<td>".$fecha_sol."</td>
											<td>".$total."</td>

											<td><a href='../comprobante.php?rid=".$idres." ' class='btn btn-primary' target='_blank'>Ver</a></td>
											</tr>";
											
									}}
									?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
					
                                        </div>
                                    </div>
									
                                </div>
								<?php
								
								$sql = "select idpaq ip, fechasol fs, sum(cantper) tot
								from reserva
								where idpaq in (SELECT p.idpaq
								from usuario u, institucion i, paquete p
								where u.id=i.idencargado and i.idinst=p.idagencia and u.email=?) and estado=1

								group by idpaq, fechasol";
								$query=$dbh->prepare($sql);
								$query->execute([$email]);
								$r=$query->rowCount();
						
								?>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
											<button class="btn btn-primary" type="button">
												 Salidas confirmadas
 											<span class="badge"><?php echo $r ; ?></span>
											</button>
											
											</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
										<?php
										$sql = "select r.idpaq ip, r.fechasol fs, sum(r.cantper) tot, tmp.nombre n
										from reserva r, (SELECT p.idpaq, u.email, p.nombre
										from usuario u, institucion i, paquete p
										where u.id=i.idencargado and i.idinst=p.idagencia) tmp
										where r.idpaq=tmp.idpaq and tmp.email=? and r.estado=1
		
										group by r.idpaq, r.fechasol";
										$query=$dbh->prepare($sql);
										$query->execute([$email]);

										$results=$query->fetchAll(PDO::FETCH_OBJ);
										if($query->rowCount() > 0)
										{
										foreach($results as $result3)
										{		
											$sid = htmlentities($result3->ip);
											$sfs = htmlentities($result3->fs);
											$stot = htmlentities($result3->tot);
											$snom = htmlentities($result3->n);	
											$newDate = date("d/m/Y", strtotime($sfs));
											//$f=obtenerFechaEnLetra(htmlentities($result3->fs));
												 
											echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$snom."</h3>
														</div>
														<div class='panel-footer back-footer-blue'>
														<a href=../comprobante.php?rid=".$sid ."><button  class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
													Ver  <span class='badge badge-primary'>".$stot."
													</span></button></a>
															".$newDate."
														</div>
													</div>	
											</div>";		
											}
											
									
										}
										?>
                                           
										</div>
										
                                    </div>
									
                                </div>
                            </div>
							
                        </div>
                    </div>
                </div>
            </div>
			</div>
<!-- end div reserva-->
</div>
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
<script type="text/javascript">
    $(document).ready(function(){

        $('#confirma').click(function(){
          confirmaReserva();
        });

    });
</script>
</html>
<?php 

} ?>