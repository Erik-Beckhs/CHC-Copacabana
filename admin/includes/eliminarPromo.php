 <?php 
	require_once "config.php";
	$id=$_POST['id'];

	$sql="DELETE from promocion where idpaquete='$id'";
	$query = $dbh->prepare($sql);
    echo $result=$query->execute();
 ?>