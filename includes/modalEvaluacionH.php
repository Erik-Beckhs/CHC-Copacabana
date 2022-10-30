
<!--mymodal3-->

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
                    <form name="signup3" method="post" class="p-3" action="comprobante.php">
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

    <script type="text/javascript">
    $(document).ready(function(){
        $('#solicita').click(function(){
          rating=$('#rating').val();
          comentario=$('#coment').val();
          idcli=$('#idcli').val();
          idhot=$('#idhot').val();
          agregarcomentarioH(rating,comentario,idcli, idhot);
        });
    });
</script>