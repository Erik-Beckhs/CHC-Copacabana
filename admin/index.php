<!DOCTYPE HTML>
<html>
<head>
<title>Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="css/fontawesome/css/brands.css" rel="stylesheet">
  <link href="css/fontawesome/css/solid.css" rel="stylesheet">
<link rel="stylesheet" href="librerias/alertifyjs/css/alertify.css">
<link rel="stylesheet" href="librerias/alertifyjs/css/themes/default.css">

<link rel="stylesheet" href="css/jquery-ui.css"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<script src="librerias/alertifyjs/alertify.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head> 
<body>
	<div class="main-wthree">
	<div class="container">
	<div class="sin-w3-agile">
		<h2>Login</h2>
		<form method="post">
			<div class="username">
				<span class="username">Email:</span>
				<input type="text" name="email" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Password:</span>
				<input type="password" name="password" class="password" placeholder="" required="">
				<div class="clearfix"></div>
			</div>

			<div class="login-w3">
					<input type="submit" class="login" name="login" value="Ingresar">
			</div>	
		</form>
				
	</div>
	</div>
	</div>
	
	<div class="fixed-bottom mb-4">
<div class="btn btn-danger mx-4 py-2 bg-danger">
	<h3 class="text-right"><a href="../index.php" style="color:white;"><i class="fas fa-arrow-circle-left"></i> Volver</a></h3>
</div>	
</div>

</body>
</html>

<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=$_POST['password'];
$sq="select idencargado from institucion i, hotel h where i.idinst=h.idinst";
$sql="select * from usuario where email=:email and pass=:password and idtipou<>3 and id not in ($sq)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
	foreach($results as $result)
	{
		$_SESSION['tipo']=htmlentities($result->idtipou);
		$idus=htmlentities($result->id);
	}
	$_SESSION['alogin']=$email;
	if($_SESSION['tipo']==2)
	{
		
		echo "<script>alertify.success('Usuario de tipo encargado existente, Bienvenido...');</script>";
		//encargado
		$sql="insert into historial (idusuario, tipo, ingreso) values ($idus,2, now())";
		$query=$dbh->prepare($sql);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId){
			$_SESSION['idhist']=$lastInsertId;
		}
		echo "<script type='text/javascript'> document.location = 'panel_reservas.php'; </script>";
	}
	else if($_SESSION['tipo']==1)
	{
		echo "<script>alertify.success('Usuario de tipo administrador existente, Bienvenido...');</script>";
		$sql="insert into historial (idusuario, tipo, ingreso) values ($idus,1, now())";
		$query=$dbh->prepare($sql);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId){
			$_SESSION['idhist']=$lastInsertId;
		}
		echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
	}
	else 
	{
		echo "<script>alertify.success('Usuario de tipo super administrador existente, Bienvenido...');</script>";
		$sql="insert into historial (idusuario, tipo, ingreso) values ($idus,4, now())";
		$query=$dbh->prepare($sql);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId){
			$_SESSION['idhist']=$lastInsertId;
		}
		echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
	}	
} 
else
{
	echo "<script>alertify.error('Datos Inválidos');</script>";
}
}

?>

