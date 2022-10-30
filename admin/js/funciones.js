function agregarDatosU(nombre, dni, telefono, email, pass, rol){
	cadena="nombre=" + nombre + 
			"&dni=" + dni +
			"&telefono=" + telefono +
			"&email=" + email +
			"&pass=" + pass +
			"&rol=" + rol;

		$.ajax({
			type:"POST",
			url:"includes/agregarNuevoU.php",
			data:cadena,
			success:function(r){
				console.log(r);
				if(r==1){
					$('#tabla').load('includes/tablaUsuario.php');
					alertify.success('agregado con exito');		
				}
				else{
					alertify.error("Fallo al servidor");
				}
			}
		});
}

function agregaform(datos){

	d=datos.split('||');

	$('#idUsuario').val(d[0]);
	$('#fnamee').val(d[1]);
	$('#telefonoe').val(d[2]);
	$('#emaile').val(d[3]);
	$('#tipoe').val(d[4]);
	$('#passe').val(d[5]);
	$('#dnie').val(d[6]);
	
}

//paquetes
function agregaFormP(datos){
	d=datos.split('||');
	$('#idPaq').val(d[0]);
	$('#pactual').val(d[3]);
}
//-paq
function promocionaP(){

	id=$('#idPaq').val();
	tipo=$('#select').val();
	fini=$('#fini').val();
	ffin=$('#ffin').val();
	pactual=$('#pactual').val();
	ppromo=$('#ppromo').val();

	cadena= "id=" + id +
			"&tipo=" + tipo + 
			"&fini=" + fini +
			"&ffin=" + ffin +
			"&pactual=" + pactual +
			"&ppromo=" + ppromo ;

	$.ajax({
		type:"POST",
		//url:"includes/ingresarPromoP.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('includes/tablaPaquete.php');
				alertify.success("Se ha promocionado el paquete :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function actualizaDatos(){

	id=$('#idUsuario').val();
	dni=$('#dnie').val();
	nombre=$('#fnamee').val();
	telefono=$('#telefonoe').val();
	email=$('#emaile').val();
	pass=$('#passe').val();
	tipo=$('#tipoe').val();

	cadena= "id=" + id +
			"&dni=" + dni + 
			"&nombre=" + nombre +
			"&telefono=" + telefono +
			"&email=" + email +
			"&pass=" + pass +
			"&tipo=" + tipo;

	$.ajax({
		type:"POST",
		url:"includes/actualizaDatosU.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('includes/tablaUsuario.php');
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se canceló')});
}
function preguntarSiNoPromo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar la promociòn?', 
					function(){ eliminarDatosPromo(id) }
                , function(){ alertify.error('Se canceló')});
}
function preguntarSiNoP(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatosP(id) }
                , function(){ alertify.error('Se canceló')});
}
function preguntarSiNoI(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatosI(id) }
                , function(){ alertify.error('Se canceló')});
}
function preguntarSiNoA(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatosA(id) }
                , function(){ alertify.error('Se canceló')});
}

function preguntarSiNo2(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatos2(id) }
                , function(){ alertify.error('Se canceló')});
}

function eliminarDatos(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"includes/eliminarDatosU.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('includes/tablaUsuario.php');
					alertify.success("Eliminado con exito!");
				}else{
					alertify.error("Falló el servidor :(");
				}
			}
		});
}

function eliminarDatosP(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"includes/eliminarDatosP.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tablaPaquete').load('includes/tablaPaquete.php');
					alertify.success("Eliminado con exito!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}
function eliminarDatosI(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"includes/eliminarDatosI.php",
			data:cadena,
			success:function(r){
				if(r==1){
					//$('#tablaPaquete').load('includes/tablaPaquete.php');
					location.reload();
					alertify.success("Eliminado con exito!");
					//$(document).load();
					//history.go()-1;
					console.log('posi2');
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}
function eliminarDatosA(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"includes/eliminarDatosA.php",
			data:cadena,
			success:function(r){
				if(r==1){
					//$('#tablaPaquete').load('includes/tablaPaquete.php');
					location.reload();
					alertify.success("Eliminado con exito!");
					//$(document).load();
					//history.go()-1;
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}

function eliminarDatos2(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"includes/eliminarHistorial.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('includes/tablaHistorial.php');
					alertify.success("Eliminado con exito!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}




							function enviarDatos(datos){
								d=datos.split('||');

								$('#idreserva').val(d[0]);
								$('#pasajero').val(d[1]);
								$('#telefono').val(d[2]);
								$('#correo').val(d[3]);
								$('#paquete').val(d[4]);
								$('#monto').val(d[5]);
							}

							function confirmaReserva(){
								id=$('#idreserva').val();
    							cadena="id="+id;

						$.ajax({
							type:"POST",
							url:"../includes/confirmaRes.php",
							data:cadena,
							success:function(r){
								if(r==1){
									$('#table').load('panel_reservas.php');
									alertify.success("se confirmó la reserva de manera exitosa");
								}
								else{
									alertify.error("Fallo al servidor");
								}
							}
						});
					}