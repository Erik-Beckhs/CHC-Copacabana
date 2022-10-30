<?php
include('includes/config.php');
$id=$_POST['id'];

$sql="update reserva set estado=1 where idres='$id'";
$query=$dbh->prepare($sql);
$query->execute();
echo $result=$query->fetchAll(PDO::FETCH_OBJ);
?>