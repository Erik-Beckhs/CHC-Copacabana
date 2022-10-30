<?php
error_reporting(0);
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$ci=$_POST['ci'];
$mnumber=$_POST['mobilenumber'];
$email=$_POST['email'];
$password=$_POST['password'];
$sql="INSERT INTO  usuario(nombrecom,email,pass,telefono, ci) VALUES(:fname,:email,:password, :mnumber, :ci)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':ci',$ci,PDO::PARAM_STR);
$query->bindParam(':mnumber',$mnumber,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

$sql2="INSERT INTO  cliente(id) VALUES(:lastInsertId)";
$query2 = $dbh->prepare($sql2);
$query2->bindParam(':lastInsertId',$lastInsertId,PDO::PARAM_STR);
$query2->execute();
//$lastInsertId = $dbh->lastInsertId();

$_SESSION['msg']="Te has registrado correctamente. Ahora puedes loguearte ";
header('location:thankyou.php');
}
else 
{
$_SESSION['msg']="Algo salió mal. intentalo de nuevo";
header('location:thankyou.php');
}
}

if(isset($_POST['submit2']))
{
$fname=$_POST['fname'];
$dni=$_POST['dni'];
$mnumber=$_POST['mobilenumber'];
$email=$_POST['email'];
$sql="INSERT INTO  usuario(nombrecom,email,pass,telefono, dni, idtipou) VALUES(:fname,:email,:dni, :mnumber, :dni, 3)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':dni',$dni,PDO::PARAM_STR);
$query->bindParam(':mnumber',$mnumber,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
session_start();
$_SESSION['login']=$email;

$archivoActual = $_SERVER['PHP_SELF'];
header("refresh:1;url=".$archivoActual);

?>
<script type="text/javascript">
            $(window).load(function(){
                $('#myModal3').modal('show');
            });
        </script>

<?php
}
else 
{
//header('location:thankyou.php');
}
}
?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
							<section>
								<div class="modal-body modal-spa">
									<div class="login-grids">
										<div class="login">
											<div class="login-right">
								<form name="signup" method="post">
								<h3>Crea tu cuenta </h3>
								<input type="text" value="" placeholder="Nombre Completo" name="fname" autocomplete="off" required="">
								<input type="text" value="" placeholder="Cedula de Identidad" name="ci" autocomplete="off" required="">
								<input type="text" value="" placeholder="Número de telefono" maxlength="10" name="mobilenumber" autocomplete="off" required="">
						<input type="text" value="" placeholder="Email" name="email" id="email" onBlur="checkAvailability()" autocomplete="off"  required="">	
						<span id="user-availability-status" style="font-size:12px; color:#ff0000"></span> 
					<input type="password" value="" placeholder="Password" name="password" required="">	
									<input type="submit" name="submit" id="submit2" value="CREAR CUENTA">
									</form>
											</div>
												<div class="clearfix"></div>								
										</div>
											<p>Estoy de acuerdo con los <a href="page.php?type=terms">terminos, condiciones</a> y <a href="page.php?type=privacy">políticas de privacidad</a></p>
									</div>
								</div>
							</section>
					</div>
				</div>
			</div>
<!--mymodal2-->
			<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
							<section>
								<div class="modal-body modal-spa">
									<div class="login-grids">
										<div class="login">
											<div class="login-left">
												<ul>
													<li><a class="fb" href="#"><i></i>Facebook</a></li>
													<li><a class="goog" href="#"><i></i>Google</a></li>
												</ul>
											</div>
											<div class="login-right">
				<form name="signup2" method="POST">
								<h3>Crear cuenta e Iniciar Sesión</h3>
					
				<input type="text" value="" placeholder="Nombre Completo" name="fname" autocomplete="off" required="">
				<input type="text" value="" placeholder="Número de identificación" name="dni" autocomplete="off" required="">
				<input type="text" value="" placeholder="Número de telefono" maxlength="10" name="mobilenumber" autocomplete="off" required="">
		<input type="text" value="" placeholder="Email" name="email" id="email" onBlur="checkAvailability()" autocomplete="off"  required="">	
		 <span id="user-availability-status" style="font-size:12px; color:#ff0000"></span> 
			<input type="submit" name="submit2" id="submit" value="CREAR CUENTA">
			<input type="hidden" value="<?= $paqid;?>" name="paqid">
									</form>
											</div>
												<div class="clearfix"></div>								
										</div>
											<p>Estoy de acuerdo con los <a href="page.php?type=terms">terminos, condiciones</a> y <a href="page.php?type=privacy">políticas de privacidad</a></p>
									</div>
								</div>
							</section>
					</div>
				</div>
			</div>
		
<!-- nuevo modal general -->
<div class="modal fade" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" data-blast="bgColor">
                    <h5 class="modal-title" id="exampleModalLabel">CREA TU CUENTA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="signup" method="POST" class="p-3">
                        <div class="form-group">
                            <label for="fname" class="col-form-label">Nombre Completo</label>
							<input type="text" class="form-control" name="fname" autocomplete="off" placeholder="Ingrese su nombre" required>
                            <label for="dni" class="col-form-label">Número de Identificación</label>
                            <input type="text" name="dni" class="form-control" placeholder="Ingrese su DNI" autocomplete="off" required>
							<label for="mobilenumber" class="col-form-label">Número de Teléfono</label>
                            <input type="text" name="mobilenumber" class="form-control" placeholder="Ingrese su número de teléfono" autocomplete="off" maxlength="12" required>
							<label for="email" class="col-form-label">Correo Electrónico</label>
							<input type="text" class="form-control" placeholder="Email" name="email" id="email" onBlur="checkAvailability()" autocomplete="off"  required="">	
		 					<span id="user-availability-status" style="font-size:12px; color:#ff0000"></span> 
							 <p>Estoy de acuerdo con los <a href="page.php?type=terms">terminos, condiciones</a> y <a href="page.php?type=privacy">políticas de privacidad</a></p> 
						</div>
                        <div class="right-w3l">
						
                            <input type="submit" class="form-control" id="submit" value="Crear Cuenta" name="submit">
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	</div>
<!--Javascript for check email availabilty-->
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