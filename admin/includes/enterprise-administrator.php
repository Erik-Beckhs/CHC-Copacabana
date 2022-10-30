<?php
error_reporting(0);
if(isset($_POST['reg']))
{
$nombrecom=$_POST['nombrecom'];
$ci=$_POST['ci'];
$email=$_POST['email'];
$password=$_POST['password'];
$telefono=$_POST['telefono'];
$sql="INSERT INTO  usuario(nombrecom,email,pass,telefono, ci) VALUES(:nombrecom,:email,:password, :telefono, :ci)";
$query = $dbh->prepare($sql);
$query->bindParam(':nombrecom',$nombrecom,PDO::PARAM_STR);
$query->bindParam(':telefono',$telefono,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':ci',$ci,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
	$sql2="INSERT INTO  encargado(id) VALUES(:lastInsertId)";
	$query2 = $dbh->prepare($sql2);
	$query2->bindParam(':lastInsertId',$lastInsertId,PDO::PARAM_STR);
	$query2->execute();
	header('location:index.php');
}
else 
{
	$_SESSION['msg']="Algo salió mal. intentalo de nuevo";
	//header('location:thankyou.php'); ver esta parte
	}
}

?>
<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<head>

</head>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>						
						</div>
						<div class="modal-body modal-spa">
							
								<div class="login">
									<div class="login-right" style=
									"width:100%;"
									>
										<form method="post">
				<h3>Agregar Encargado</h3>
				<input type="text" name="ci" id="ci" placeholder="Nro. Cedula de Identidad" value="" required="">
				<input type="text" name="nombrecom" id="nombrecom" placeholder="Nombre completo"  required="">	
				<input type="text" value="" placeholder="Email" name="email" id="email" onBlur="checkAvailability()" autocomplete="off"  required="">	
					<span id="user-availability-status" style="font-size:12px;"></span> 
				<input type="password" name="password" id="password" placeholder="Password" value="" required="">
				<input type="password" name="telefono" id="telefono" placeholder="Nro. Telefono" value="" required="">
				<input type="submit" name="reg" value="REGISTRAR">
										</form>
									</div>
									<div class="clearfix"></div>								
								</div>
						</div>
					</div>
				</div>
			</div>