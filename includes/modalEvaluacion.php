<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!--mymodal3-->

    <div class="modal fade" id="myModalCalificaHotel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" data-blast="bgColor">
                    <h5 class="modal-title" id="exampleModalLabel">Valoración</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="signup3" method="post" class="p-3" id="ratingForm" action="includes/controlador_paquete.php">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-center">Para mejorar nuestros servicios, agradecemos que califique nuestro hotel segun la experiencia que haya tenido con el mismo</label>
                            <label for="recipient-name" class="col-form-label">Cantidad de Estrellas</label>
                            <div class="text-center">                        
                                <button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>                                      
                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                            <input type="text" class="form-control" id="rating" name="rating" value="1">
                            </div>
                            <label for="" class="col-form-label">Comentario</label>
                            <textarea class="form-control" name="comentario"></textarea>
                        </div>
                        <input type="hidden" value="<?= $hid;?>" name="hotid">
                        <input type="hidden" value="<?= $idcli;?>" name="idcli">
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="enviar" name="solicitar">
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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