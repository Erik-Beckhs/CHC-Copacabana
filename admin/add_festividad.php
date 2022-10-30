<?php

// Conexion a la base de datos
include("../includes/config.php");
	
	$nombre = $_POST['nombref'];
	$detalle = $_POST['detallef'];
	$lugar = $_POST['lugar'];
    $fechaini = $_POST['fechaini'];
    $fechafin = $_POST['fechafin'];
    //$image = $_POST['img'];

	$sql = "INSERT INTO festividad (nombre, detalle, lugar, fechaini, fechafin) values ('$nombre', '$detalle', '$lugar', '$fechaini', '$fechafin')";
	
	echo $sql;
	
	$query = $dbh->prepare( $sql );
	if ($query == false) {
	 print_r($dbh->errorInfo());
	 die ('Error en la base de datos');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Error en la ejecucion');
	}

header('Location: '.$_SERVER['HTTP_REFERER']);
	
?>
