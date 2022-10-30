<?php 
	require_once "config.php";
	$id=$_POST['id'];

	$sql="DELETE from paquete where idpaq='$id'";
	$query = $dbh->prepare($sql);
    echo $result=$query->execute();
 ?>