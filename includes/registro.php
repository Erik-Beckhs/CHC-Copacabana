<?php
error_reporting(0);

if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$dni=$_POST['dni'];
$mnumber=$_POST['mobilenumber'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$sql="INSERT INTO  usuario(nombrecom,email,pass,telefono, dni, idtipou) VALUES('$fname','$email','$pass', '$mnumber', '$dni', 3)";
$query = $dbh->prepare($sql);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
	if(isset($r)){
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
<?php } 
else {
    echo "<script>alertify.success('Registro exitoso');</script>";
	//echo "<script>alert('Su registró se realizó de manera correcta, ahora puede ingresar al sistema')</script>";	
	}
}
else 
{
    echo "<script>alertify.error('Error!! No se registró el usuario');</script>";
//	echo "<script>alert('Error en el registro, intente nuevamente')</script>";
}
}
?>
		
<!-- nuevo modal general -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                             <br/>
                             <label for="mobilenumber" class="col-form-label">Contraseña</label>
                            <input type="password" name="pass" class="form-control" placeholder="Ingrese su contraseña" autocomplete="off" maxlength="12" required>
							 <p>Estoy de acuerdo con los <a href="politicas_terminos.php" target="_blank">terminos, condiciones y políticas de privacidad</a></p> 
						</div>
                        <div class="right-w3l">
						
                            <input type="submit" class="form-control" id="submit" value="Crear Cuenta" name="submit">
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--modal general-->
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