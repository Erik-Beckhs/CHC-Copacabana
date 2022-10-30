<?php
include('config.php');

$idcli=$_POST['idcli'];
$atid=$_POST['atid'];
$val=$_POST['rating'];
$com=$_POST['comentario'];

$sql="insert into calificaa (idusuario, idatr, valoracion, comentario) values (:idcli, :atid, :val, :com)";
$query=$dbh->prepare($sql);
$query -> bindParam(':idcli', $idcli, PDO::PARAM_INT);
$query -> bindParam(':atid', $atid, PDO::PARAM_INT);
$query -> bindParam(':val', $val, PDO::PARAM_STR);
$query -> bindParam(':com', $com, PDO::PARAM_STR);
$query->execute();

$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{ 	
    header("location:../attractive-details.php?atid=$atid");
}
else{
    echo "No se pudo registrar el comentario";
}
?>