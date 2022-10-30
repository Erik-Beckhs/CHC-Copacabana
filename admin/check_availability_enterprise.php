<?php 
require_once("includes/config.php");
// code admin email availablity
if(!empty($_POST["nombre"])) {
	$nombre= $_POST["nombre"];

	$sql ="SELECT nombre FROM institucion WHERE nombre=:nombre";
$query= $dbh -> prepare($sql);
$query-> bindParam(':nombre', $nombre, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> La institucion ya existe .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Aún no se registro la institución .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}

}


?>
