<?php
require_once "config.php";
$id=$_POST['id'];
$fini=$_POST['fini'];
$ffin=$_POST['ffin'];
$ppromo=$_POST['ppromo'];
$descuento=$_POST['descuento'];
$sql = "insert into promocion (idpaquete, fechaini, fechafin, preciopromo, descuento) values ($id, '$fini', '$ffin', $ppromo, $descuento)";
$query = $dbh->prepare($sql);
echo $result=$query->execute();
?>