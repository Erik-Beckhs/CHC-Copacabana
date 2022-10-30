<?php 
    session_start();
	require_once "config.php";
	$id=$_POST['id'];

	$sql="DELETE from atractivo where ID='$id'";
	$query = $dbh->prepare($sql);
    echo $result=$query->execute();
    //header('location:manage-enterprise.php?iid='.$_SESSION['iid']);
 ?>

