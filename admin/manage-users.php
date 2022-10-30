<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
	?>
<!DOCTYPE HTML>
<html>
<head>

<title>CHC | Admin administración de usuarios</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style2.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link rel="stylesheet" href="alertifyjs/css/alertify.css">
<link rel="stylesheet" href="alertifyjs/css/themes/default.css">
<!-- Graph CSS -->
<link href="css/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="css/fontawesome/css/brands.css" rel="stylesheet">
  <link href="css/fontawesome/css/solid.css" rel="stylesheet">
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/funciones.js"></script>
<script src="alertifyjs/alertify.js"></script>

<!-- //jQuery -->
<!-- tables -->
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>


<style>
	.alert-mine{
		background-color:#B22514;
		border-color:#ffffff;
	}
</style>
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
                <li class="breadcrumb-item"><a href="index.html">Inicio</a><i class="fa fa-angle-right"></i>Administracion de Usuarios</li>
            </ol>
<div class="agile-grids">	
				<!-- tables -->
				
				<div class="agile-tables">
					
			<div id="tabla">
			</div>

			<!--modals-->
						
				<!--modal edit-->
				<div class="modal fade" id="myModalE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <span class="modal-title text-white font-weight-bold h5" id="exampleModalLabel">MODIFICAR USUARIO</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="signup" method="POST" class="p-3">
                        <div class="form-group">
							<input type="text" hidden="" id="idUsuario">
							<label class="col-form-label">DNI</label>
							<input type="text" class="form-control" name="" id="dnie" autocomplete="off" required>
                            <label for="fname" class="col-form-label">Nombre Completo</label>
							<input type="text" class="form-control" name="" id="fnamee" autocomplete="off" required>
							<label for="mobilenumber" class="col-form-label">Número de Teléfono</label>
                            <input type="text" name="" id="telefonoe" class="form-control" autocomplete="off" maxlength="12" required>
							
							<label  class="col-form-label">Correo Electrónico</label>
							<input type="text" class="form-control" name="" id="emaile" onBlur="checkAvailability()" autocomplete="off"  required="">
							<label class="col-form-label">Contraseña</label>
							<input type="password" class="form-control" name="" id="passe" onBlur="checkAvailability()" autocomplete="off"  required="">
							<label for="email" class="col-form-label">Tipo</label>
							<input type="text" class="form-control" name="" id="tipoe" autocomplete="off"  required="">

		 					<span id="user-availability-status" style="font-size:12px; color:#ff0000"></span> 
							 <p>Estoy de acuerdo con los <a href="page.php?type=terms">terminos, condiciones</a> y <a href="page.php?type=privacy">políticas de privacidad</a></p> 
						</div>
                        <div class="right-w3l">
						
                            <input type="submit" class="form-control btn-primary" id="actualizadatos" value="Actualizar" name="submit" data-dismiss="modal">
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<!--end modal edit-->
	<!--end modals>
-->	
			
<?php
include ('includes/modalUser.php');?>
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >= navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>

		<script>
		function checkAvailability() {
		$("#loaderIcon").show();
		jQuery.ajax({
		url: "check_availability.php",
		data:'email='+$("#email").val(),
		type: "POST",
		success:function(data){
		$("#user-availability-status").html(data);
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
							<script type="text/javascript">
								$(document).ready(function(){
									$('#tabla').load('includes/tablaUsuario.php');
								})
							</script>
							<script type="text/javascript">
								$(document).ready(function(){
									$('#guardaNuevoU').click(function(){
										nombre=$('#fname').val();
										dni=$('#dni').val();
										telefono=$('#mobilenumber').val();
										email=$('#email').val();
										pass=$('#passw').val();
										rol=$('#rol').val();
										agregarDatosU(nombre, dni, telefono, email, pass, rol)
									});

									$('#actualizadatos').click(function(){
										actualizaDatos();
									});

								})
							</script>

<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>

<?php } ?>