<?php
include('config.php');

$idcli=$_POST['idcli'];
$paqid=$_POST['paqid'];
//$val=$_POST['valoracion'];
$val=$_POST['rating'];
$com=$_POST['comentario'];

$sql="insert into calificap (idusuario, idpaq, valoracion, comentario) values (:idcli, :paqid, :val, :com)";
$query=$dbh->prepare($sql);
$query -> bindParam(':idcli', $idcli, PDO::PARAM_INT);
$query -> bindParam(':paqid', $paqid, PDO::PARAM_INT);
$query -> bindParam(':val', $val, PDO::PARAM_STR);
$query -> bindParam(':com', $com, PDO::PARAM_STR);
$query->execute();
//$results=$query->fetchAll(PDO::FETCH_OBJ);
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{ 	
    header("location:../package-details.php?paqid=$paqid");
}
?>