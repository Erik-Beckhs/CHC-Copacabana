<?php
require_once "includes/config.php";
session_start(); 

$idhistCliente=$_SESSION['idhistCliente'];

$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
$sql="update historial set salida=now() where idhistorial=$idhistCliente";
$query=$dbh->prepare($sql);
$query->execute();

unset($_SESSION['login']);
unset($_SESSION['idhistCliente']);
unset($_SESSION['inst']);
session_destroy(); // destroy session
header("location:index.php"); 
?>
