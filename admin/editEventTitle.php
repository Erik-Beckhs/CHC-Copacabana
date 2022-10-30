<?php
// Conexion a la base de datos
include('includes/config.php');
if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = "DELETE FROM events WHERE id = $id";
	$query = $dbh->prepare( $sql );
	if ($query == false) {
	 print_r($dbh->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	
}elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['descripcion']) && isset($_POST['id'])){
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$color = $_POST['color'];
	$descripcion = $_POST['descripcion'];
	
	$sql = "UPDATE events SET  title = '$title', color = '$color', descripcion='$descripcion' WHERE id = $id ";

	
	$query = $dbh->prepare( $sql );
	if ($query == false) {
	 print_r($dbh->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
}
header('Location: calendario.php');

	
?>
