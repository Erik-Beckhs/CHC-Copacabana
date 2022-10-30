<?php
require_once "config.php";
$fname=$_POST['nombre'];
$dni=$_POST['dni'];
$mnumber=$_POST['telefono'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$tipo=$_POST['rol'];

$sql="INSERT INTO  usuario (nombrecom,email,pass,telefono, dni, idtipou) VALUES('$fname','$email','$pass', '$mnumber', '$dni', '$tipo')";
$query = $dbh->prepare($sql);
echo $result=$query->execute();
//$result = $query -> fetchAll(PDO::FETCH_OBJ);
?>