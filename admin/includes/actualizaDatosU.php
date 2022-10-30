<?php
require_once "config.php";
$id=$_POST['id'];
$dni=$_POST['dni'];
$nombre=$_POST['nombre'];
$telefono=$_POST['telefono'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$tipo=$_POST['tipo'];

$sql="update usuario set dni='$dni', nombrecom='$nombre', email='$email', pass='$pass', telefono='$telefono', dni='$dni', idtipou='$tipo' where id='$id'";
$query = $dbh->prepare($sql);
echo $result=$query->execute();

?>