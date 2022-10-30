<?php 
require_once("includes/config.php");
// code admin email availablity
if(!empty($_POST["email"])) {
	$email= $_POST["email"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

		echo "Error : Correo no válido.";
	}
	else {
		$sql ="SELECT email FROM usuario WHERE email=:email";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query-> execute();
		$results = $query -> fetchAll(PDO::FETCH_OBJ);
		if($query -> rowCount() > 0)
		{
		echo "<span style='color:red'> El correo ya existe .</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
		} else{
			
			echo "<span style='color:green'> Email disponible para el registro .</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
		}
	}
}


?>
