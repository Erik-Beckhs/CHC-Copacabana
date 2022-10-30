<?php 
	require_once "config.php";
	$v=$_POST['valoracion'];
	$c=$_POST['comentario'];
	$ic=$_POST['idcli'];
	$ia=$_POST['idat'];

	$sql="INSERT into calificaa (idusuario,idatr,valoracion,comentario) values ('$ic','$ia','$v','$c')";
    $query = $dbh->prepare($sql);
    echo $result=$query->execute();
 ?>