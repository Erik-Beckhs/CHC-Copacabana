<?php
session_start(); 

$idhist=$_SESSION['idhist'];

$_SESSION = array();
include('includes/config.php');
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
$sql="update historial set salida=now() where idhistorial=$idhist";
$query=$dbh->prepare($sql);
$query->execute();

unset($_SESSION['alogin']);
unset($_SESSION['idhist']);

session_destroy(); // destroy session
header("location:index.php"); 
?>

