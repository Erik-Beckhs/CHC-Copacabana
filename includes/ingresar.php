<?php
session_start();
if(isset($_POST['signin']))
{
$email=$_POST['email'];
$password=$_POST['password'];
$sql="select * from usuario where email=? and pass=? and idtipou=3";
$query = $dbh -> prepare($sql);
$query->execute([$email, $password]);
$results = $query->fetch(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['login']=$_POST['email'];
$idus=htmlentities($results->id);

		$sql2="insert into historial (idusuario, tipo, ingreso) values ($idus, 3, now())";
		$query2=$dbh->prepare($sql2);
		$query2->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId){
			$_SESSION['idhistCliente']=$lastInsertId;
		}
		echo "<script type='text/javascript'> document.location = 'mis_reservas.php'; </script>";

} else{
	echo "<script>alertify.error('Datos no válidos')</script>";
}
}

?>

<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header" data-blast="bgColor">
							<h5 class="modal-title" id="exampleModalLabel">Login</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
										
									
										<form method="post">
										<label for="email" class="col-form-label">Correo:</label>
										<input type="text" name="email" id="email" placeholder="Ingresa tu Correo"  class="form-control" required="">	
										<label for="password" class="col-form-label">Password:</label>
										<input type="password" name="password" id="password" placeholder="Password" value="" required="" class="form-control">	

										<div class="row justify-content-center">
												<span style="font-size:12px;"><a href="forgot-password.php">¿Olvidaste la contraseña?</a></span>
										</div>
										
										<div class="row justify-content-center my-3">
											<input type="submit" name="signin" value="INGRESAR" class="btn btn-info">
										</div>
										</form>
									
								
							</div>
						</div>
					</div>
				</div>
			</div>

			    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" data-blast="bgColor">
                    <h5 class="modal-title" id="exampleModalLabel">Reserva</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="signup3" method="post" class="p-3" action="package-details.php">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Cantidad de Personas</label>
                            <select name="cantidad" class="form-control">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
                        
                            <label for="" class="col-form-label">Fecha</label>
                            <input type="date" name="fecha" class="form-control">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Solicitar" name="solicitar">
						</div>
						<input type="hidden" value="<?= $paqid;?>" name="paqid">
                    </form>
                </div>
            </div>
        </div>
    </div>