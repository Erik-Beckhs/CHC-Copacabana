<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
	//$sw1=0;
	if(isset($_POST['busqueda'])){
		//$sw1=1;
		$_SESSION['palabraP']=$_POST['busqueda'];
	}
	else {
		unset($_SESSION['palabraP']);
	}
	?>
<!DOCTYPE HTML>
<html>
<head>
<title>CHC | admin administrar paquetes</title>
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

  <link rel="stylesheet" href="alertifyjs/css/alertify.css">
<link rel="stylesheet" href="alertifyjs/css/themes/default.css">
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<script src="js/funciones.js"></script>
<script src="alertifyjs/alertify.js"></script>
<!-- tables -->
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<style>
#opciones div{
    display:none;
}
</style>
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
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
                <li class="breadcrumb-item"><a href="index.html">Inicio</a><i class="fa fa-angle-right"></i>Administración de Paquetes</li>
            </ol>
<div class="agile-grids">	
				<!-- tables -->
				
			<div class="agile-tables">
			<div id="tablaPaquete"></div>

<!--inner block start here-->
<div class="inner-block">
</div>
<div class="text-right fixed-bottom mr-5 mb-4">
	<a href="reportes.php?r=7"><button class="btn btn-info" name="btnReserva" style="width:200px;"><i class="fas fa-print"></i> Imprimir</button></a>
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
		<!--modal promocion-->
		<div class="modal fade" id="myModalP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <span class="modal-title text-white font-weight-bold h5" id="exampleModalLabel">PROMOCIONAR PAQUETE</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="signup" method="POST" class="p-3">
                        <div class="form-group">
							<input type="text" hidden="" id="idPaq">
							
									<label for="fname" class="col-form-label">Fecha Inicio</label>
									<input type="date" class="form-control" name="fini" id="fini" required>
									<label for="mobilenumber" class="col-form-label">Fecha Fin</label>
									<input type="date" name="ffin" id="ffin" class="form-control" maxlength="12" required>
								
									<label  class="col-form-label">Precio Actual</label>
									<input type="text" class="form-control" name="pactual" id="pactual" disabled>
								
									<label class="col-form-label">Descuento</label>
									<select class="form-control"name="select" id="select" >
										<option value=".10">10%</option>
										<option value=".20">20%</option>
										<option value=".30">30%</option>
										<option value=".40">40%</option>
										<option value=".50">50%</option>
									</select>
								</div>
								<div id="3">
									<label for="ppromo" class="col-form-label">Precio Promoción</label>
									<input type="text" class="form-control" name="ppromo" id="ppromo" autocomplete="off"  disabled>
								</div>
							</div>

		 					<!--<span id="user-availability-status" style="font-size:12px; color:#ff0000"></span> -->
						
                        <div class="right-w3l">
                            <input type="submit" class="form-control btn-primary" id="promociona" value="Promocionar" name="submit" data-dismiss="modal">
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	</div>
	<!--end modal edit-->
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

			 $('#select').on('change', function(){
				 var x=$(this).val();
				 var pa=$('#pactual').val();
				 var p = pa-(pa*x);
				 $('#ppromo').val(p);
			 })	 

			 $('#promociona').click(function(){
				promocionaP();
			});
		});
		</script>
	
	<script>
	function agregaFormP(datos){
		d=datos.split('||');
		$('#idPaq').val(d[0]);
		$('#pactual').val(d[3]);
	}
	</script>
<script>
function preguntarSiNoPromo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar la promociòn?', 
					function(){ eliminarDatosPromo(id) }
                , function(){ alertify.error('Se canceló')});
}
</script>
	<script>
	function promocionaP(){
		
		id=$('#idPaq').val();
		fini=$('#fini').val();
		ffin=$('#ffin').val();
		ppromo=$('#ppromo').val();
		descuento=$('#select').val();

		cadena= "id=" + id +
				"&fini=" + fini +
				"&ffin=" + ffin +
				"&descuento=" + descuento +
				"&ppromo=" + ppromo;

		$.ajax({
			type:"POST",
			url:"includes/ingresarPromoP.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tablaPaquete').load('includes/tablaPaquete.php');
					alertify.success("Se ha promocionado el paquete :)");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
	}
	</script>
	<script>
	function eliminarDatosPromo(id){

	cadena="id=" + id;

	$.ajax({
		type:"POST",
		url:"includes/eliminarPromo.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tablaPaquete').load('includes/tablaPaquete.php');
				alertify.success("Eliminado con exito!");
			}else{
				alertify.error("Falló el servidor :(");
			}
		}
	});
}
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaPaquete').load('includes/tablaPaquete.php');
			})
	</script>
		<!-- /script-for sticky-nav -->
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>
<?php } ?>