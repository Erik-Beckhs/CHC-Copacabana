<?php 
	require_once "config.php";
	$v=$_POST['valoracion'];
	$c=$_POST['comentario'];
	$ic=$_POST['idcli'];
	$ih=$_POST['idhot'];

	$sql="INSERT into calificai (idcliente,idinst,valoracion,comentario) values ('$ic','$ih','$v','$c')";
    $query = $dbh->prepare($sql);
    echo $result=$query->execute();
 ?>