<!--modal new-->
<div class="modal fade" id="myModalN" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-sm">
                <div class="modal-header bg-success">
                    <span class="modal-title text-white font-weight-bold h5" id="exampleModalLabel">AGREGAR NUEVO USUARIO</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="signup" method="POST" class="p-3">
                        <div class="form-group">
                            <label for="fname" class="col-form-label">Nombre Completo</label>
							<input type="text" class="form-control" name="" id="fname" autocomplete="off" required>
                            <label for="dni" class="col-form-label">Número de Identificación</label>
                            <input type="text" name="" id="dni" class="form-control" autocomplete="off" required>
							<label for="mobilenumber" class="col-form-label">Número de Teléfono</label>
                            <input type="text" name="" id="mobilenumber" class="form-control" autocomplete="off" maxlength="12" required>
							
							<label for="passw" class="col-form-label">Password</label>
                            <input type="text" name="" id="passw" class="form-control" autocomplete="off" maxlength="12" required>

							<label for="email" class="col-form-label">Correo Electrónico</label>
							<input type="text" class="form-control" name="" id="email" onBlur="checkAvailability()" autocomplete="off"  required="">
							<label for="rol" class="col-form-label">Rol</label>
							<select class="form-control" name="" id="rol">
							<option value="1">Administrador</option>
							<option value="2">Encargado</option>
							<option value="3">Cliente</option>
							</select>

		 					<span id="user-availability-status" style="font-size:12px; color:#ff0000"></span> 
							 <p>Estoy de acuerdo con los <a href="../politicas_terminos.php" target="_blank">terminos, condiciones y políticas de privacidad</a></p> 
						</div>
                        <div class="modal-footer">

							<button type="button" class="btn btn-primary" data-dismiss="modal" id="guardaNuevoU">
							Agregar
							</button>

						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<!--end modal new-->