<!--mymodal3-->
    <!-- login  -->
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
	<!-- //login -->
	<!-- reservaexitosa  -->
    <div class="modal fade" id="resExito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" data-blast="bgColor">
                    <h5 class="modal-title" id="exampleModalLabel">Información</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="signup3" method="GET" class="p-3" action="comprobante.php">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Su reserva se realizó de manera exitosa, nuestro equipo se comunicará con usted</label>
                            <p>Gracias por confiar en nosotros</p>
                            
                        </div>
                        <input type="hidden" value="<?= $idr;?>" name="rid">
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Ver Comprobante" name="verificar">
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<!-- //reservaexitosa -->
	<!-- reservafallo  -->
    <div class="modal fade" id="resFallo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" data-blast="bgColor">
                    <h5 class="modal-title" id="exampleModalLabel">Información</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="signup3" method="post" class="p-3" action="package-details.php">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Fallo al registrar</label>
                            <p>Ocurrió un error, le rogamos intente más tarde</p>
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Verificar" name="verificar">
						</div>
						<input type="hidden" value="<?= $paqid;?>" name="paqid">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //reservafallo -->