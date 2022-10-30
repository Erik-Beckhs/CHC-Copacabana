<?php
error_reporting(0);
?>

	<!-- modal confirmar  -->
    <div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" data-blast="bgColor">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title text-info" id="exampleModalLabel">Confirmación de Reserva</h5>
                </div>
                <div class="modal-body">

                    <label for="">Id Reserva:</label>
                    <input type="text" class="form-control" id="idreserva" disabled>
                    <label for="">Pasajero:</label>
                    <input type="text" class="form-control" id="pasajero" disabled>
                    <label for="">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono" disabled> 
                    <label for="">Correo:</label>
                    <input type="text" class="form-control" id="correo" disabled>
                    <label for="">Paquete:</label>
                    <input type="text" class="form-control" id="paquete" disabled>
                    <label for="">Monto a Cancelar:</label>
                    <input type="text" class="form-control" id="monto" disabled>
                    <br>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-info">¿Esta seguro que desea confirmar la reserva?</p>
                        </div>
                        <div class="right-w3l">
                            <button type="button" class="form-control bg-success" name="btnSi" id="confirma" data-dismiss="modal">SI</button>
						</div>
                        <div class="right-w3l pt-1">
                            <button type="button" class="form-control bg-danger" value="NO" data-dismiss="modal">NO</button>
						</div>
						<input type="hidden" value="<?= $paqid;?>" name="paqid">
                </div>
            </div>
        </div>
    </div>
    <!-- //reservafallo -->

    