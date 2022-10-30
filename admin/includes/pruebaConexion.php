<?php
$user='root';
$password='';
$host='localhost';
$db='dbcopa';

$dbh=new mysqli($host, $user, $password, $db);
if($dbh):
    echo "conexion exitosa";
else:
    echo "fallo la conexion";
endif
?>