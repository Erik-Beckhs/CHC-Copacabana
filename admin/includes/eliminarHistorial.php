<?php 
	require_once "config.php";
	$id=$_POST['id'];

	$sql="DELETE from historial where idhistorial='$id'";
	$query = $dbh->prepare($sql);
    echo $result=$query->execute();
 ?>