<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{
	if(isset($_POST['submit6']))
{
$name=$_POST['name'];
$mobileno=$_POST['mobileno'];
$email=$_SESSION['login'];
$ci=$_POST['ci'];

$sql="update usuario set nombrecom='$name',telefono=$mobileno, dni=$ci where email='$email'";
$query = $dbh->prepare($sql);
$query->execute();
//$msg="Perfil Modificado Exitosamente";
//echo "<script>location.reload();</script>";
header('location:profile.php?e=1');
}

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
	header('location:profile.php?e=3');
	
	//echo "<script>location.reload();</script>";
}
else {
	//$error="Su contraseña es erronea";	
	//echo "<script>alertify.error('Su contraseña es erronea');</script>";
	header('location:profile.php?e=2');
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

  <link rel="stylesheet" href="alertifyjs/css/alertify.css">
<link rel="stylesheet" href="alertifyjs/css/themes/default.css">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="alertifyjs/alertify.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
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
.container{
	margin:0 0px 0 150px;
}
		</style>
</head>
<body>
<?php
if(isset($_GET['e'])){
	if($_GET['e']==1){
		echo "<script>alertify.success('Se cambió su informacion de manera exitosa');</script>";
	}
	else if($_GET['e']==2){
		echo "<script>alertify.error('Su contraseña es erronea');</script>";
	}
	else{
		echo "<script>alertify.success('Su contraseña ha sido cambiada exitosamente');</script>";
	}
}
?>
<!-- top-header -->
<div class="top-header">
<?php include('includes/header2.php');?>
</div>
<!--- /banner-1 ---->

<!--- privacy ---->
<div class="privacy row">

	<div class="container border rounded col-md-4">

	<div class="badge badge-info">
		<h3 class="wow fadeInDown animated animated text-white px-3" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Modificar Datos</h3>
		</div>

		<form name="chngpwd" method="post">
<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from usuario where email=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

	<p style="width: 350px;">
		
			<b>Nombre</b>  <input type="text" name="name" value="<?php echo htmlentities($result->nombrecom);?>" class="form-control" id="name" required="">
	</p> 
	<p style="width: 350px;">
<b>DNI</b>
<input type="text" class="form-control" name="ci" maxlength="10" value="<?php echo htmlentities($result->dni);?>" id="mobileno"  required="">
</p>
<p style="width: 350px;">
<b>Teléfono</b>
<input type="text" class="form-control" name="mobileno" maxlength="10" value="<?php echo htmlentities($result->telefono);?>" id="mobileno"  required="">
</p>

<p style="width: 350px;">
<b>Email</b>
	<input type="email" class="form-control" name="email" value="<?php echo htmlentities($result->email);?>" id="email" readonly>
			</p>
<?php }} ?>
			<p style="width: 350px;">
<button type="submit" name="submit6" class="btn-primary btn">Modificar</button>
			</p>
			</form>

		
	</div>

	<div class="container border rounded col-md-4">

			<div class="badge badge-info">
			<h3 class="wow fadeInDown animated animated text-white px-3" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Cambio de Contraseña</h3>
			</div>

				<form name="chngpwd" method="post">
			<p style="width: 350px;">
				
					<b>Contraseña Actual</b>  <input type="password" name="password" class="form-control" id="exampleInputPassword1" required="">
			</p> 

		<p style="width: 350px;">
		<b class="text-info">Nueva Contraseña</b>
		<input type="text" class="form-control" name="newpassword" id="newpassword" required="">
		</p>

		<p style="width: 350px;">
		<b class="text-info">Confirme la contraseña</b>
			<input type="text" class="form-control" name="confirmpassword" id="confirmpassword" required="">
					</p>

					<p style="width: 350px;">
		<button type="submit" name="submit5" class="btn-primary btn">Cambiar</button>
					</p>
					</form>
	</div>

</div>
<div class="fixed-bottom mb-4">
<div class="btn btn-danger mx-4 py-2">
	<h4 class="text-right"><a href="index.php" style="color:white;"><i class="fas fa-arrow-circle-left"></i> Volver</a></h4>
</div>	
</div>
<!--- /privacy ---->
<!--- footer-top ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/regitrar.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/ingreso.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>
</body>
</html>
<?php
} ?>