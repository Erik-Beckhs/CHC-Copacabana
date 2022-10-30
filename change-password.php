<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_POST['submit5']))
	{
$password=$_POST['password'];
$newpassword=$_POST['newpassword'];
$email=$_SESSION['login'];
	$sql ="SELECT * FROM usuario WHERE email=:email and pass=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update usuario set pass=:newpassword where email=:email";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Su contraseña ha sido cambiada exitosamente";
}
else {
$error="Su contraseña es erronea";	
}
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>CHC | Copacabana Turística</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tourism Management System In PHP" />
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
	<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value)
{
alert("Las contraseñas no coinciden !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
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
.banner-1{
	min-height:50px;
}
		</style>
</head>
<body>
<!-- top-header -->
<div class="top-header">
<?php include('includes/header2.php');?>
<div class="banner-1 ">

</div>
<div class="privacy">

	<div class="container border rounded col-md-4">
		<h3 class="wow fadeInDown animated animated text-primary" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Cambio de Contraseña</h3>
		<form name="chngpwd" method="post" onSubmit="return valid();">
		 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>INFORMACION</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
	<p style="width: 350px;">
		
			<b>Contraseña Actual</b>  <input type="password" name="password" class="form-control" id="exampleInputPassword1" required="">
	</p> 

<p style="width: 350px;">
<b class="text-info">Nueva Contraseña</b>
<input type="password" class="form-control" name="newpassword" id="newpassword" required="">
</p>

<p style="width: 350px;">
<b class="text-info">Confirme la contraseña</b>
	<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required="">
			</p>

			<p style="width: 350px;">
<button type="submit" name="submit5" class="btn-primary btn">Cambiar</button>
			</p>
			</form>

		
	</div>
</div>

<!--- /privacy ---->

<div class="fixed-bottom mb-4">
<div class="btn btn-danger mx-4 py-2">
	<h3 class="text-right"><a href="attractive-list.php" style="color:white;"><i class="fas fa-arrow-circle-left"></i> Volver</a></h3>
</div>	
</div>
<!--- footer-top ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/registro.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/ingresar.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>
</body>
</html>
<?php } ?>