<?php 
	require_once "config.php";
	$id=$_POST['id'];

	$sql="DELETE from usuario where id='$id'";
	$query = $dbh->prepare($sql);
    echo $result=$query->execute();
 ?>