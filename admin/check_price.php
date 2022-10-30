<?php 
if(!empty($_POST["precio"])) {
	$precio= $_POST["precio"];
	if (!is_numeric($precio)) {
        echo "Error : Por favor escriba un número.";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    }
    else {
        echo "<span style='color:green'> Número válido.</span>";
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }    
}

?>
