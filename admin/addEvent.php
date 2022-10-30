<?php
include('includes/config.php');

if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color']) && isset($_POST['descripcion']))
{	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];
	$descripcion = $_POST['descripcion'];
	$image=$_FILES["festimage"]["name"];
	move_uploaded_file($_FILES["festimage"]["tmp_name"],"festividadimg/".$_FILES["festimage"]["name"]);

	$sql = "INSERT INTO events (title, start, end, color, descripcion, img) values ('$title', '$start', '$end', '$color', '$descripcion', '$image')";
	
	$query = $dbh->prepare( $sql );

	if ($query == false) {
	 print_r($dbh->errorInfo());
	 die ('Error al preparar la consulta');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Error en la ejecucion');
	}
}
	header('Location: '.$_SERVER['HTTP_REFERER']);	
?>
