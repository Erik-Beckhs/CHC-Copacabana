<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>CHC | Confirmation </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
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
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
</head>
<body>
<?php include('includes/header2.php');?>
<div class="banner-1 ">

</div>
<!--- /banner-1 ---->
<!--- contact ---->
<div class="contact">
	<div class="container">
	<div class="badge badge-info" style="width:25rem;">
		<h3 class="text-white py-2"><i class="fas fa-smile-wink"></i> Registro Exitoso</h3>
	</div>
		<div class="col-md-10 contact-left">
			<div class="con-top animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
	

			  <h4>  <?php //echo htmlentities($_SESSION['msg']);
			  
			  
			  echo "Se realiz?? el registro de manera correcta";
			  ?>
			  </h4>
            
			</div>
		
			<div class="clearfix"></div>
	</div>
</div>
<!--- /contact ---->
<?php include('includes/footer.php');?>
<!-- sign -->
<?php include('includes/registro.php');?>	
<!-- signin -->
<?php include('includes/ingresar.php');?>	
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>	
<!-- //write us -->
</body>
</html>