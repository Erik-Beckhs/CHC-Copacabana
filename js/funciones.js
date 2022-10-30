
							function enviarDatos(datos){
								d=datos.split('||');
								$('#imagen').val(d[0]);
								$('#asunto').val(d[1]);
								$('#experiencia').val(d[2]);
								$('#nombre').val(d[3]);
								$('#fecha').val(d[4]);
							}

							//para noticia
							function agregaform(datos){

								d=datos.split('||');
							
								$('#idpersona').val(d[0]);
								$('#titulo').val(d[1]);
								$('#apellidou').val(d[2]);
								$('#emailu').val(d[3]);
								
								var image=new Image();
								var src = 'images/noticias/'+d[4];
								image.src=src;
								$('#image5').append(image);	
								//$('#imagen').val(d[5]);
								
							}
							function agregaformResena(datos){

								d=datos.split('||');
								//console.log(datos);
								var ruta = 'images/experiencias/'+d[0];	
								$('#image0').attr("src", ruta);
								$('#tituloR').text(d[1]);
								$('#conttext').text(d[2]);
								$('#autor').text(d[3]);
								$('#fecha').text(d[4]);	
							}
							function agregaDatosVideo(video){

								//d=datos.split('||');
								//console.log(datos);
								var ruta = 'videos/festividades/'+video;	
								$('#videoF').attr("src", ruta);
							}

							function enviarDatosF(datos){

								d=datos.split('||');
								var ruta = 'admin/festividadimg/'+d[1];	
								$('#imgF').attr("src", ruta);
								$('#tituloF').text(d[4]);
								$('#fechaF').text(d[5]);
								$('#descripcionF').text(d[3]);
								$('#status').text(d[2]);
								//$('#fecha').text(d[4]);	
							}

							function agregarcomentarioH(rating,comentario,idcli,idhot){

								cadena="valoracion=" + rating + 
										"&comentario=" + comentario +
										"&idcli=" + idcli +
										"&idhot=" + idhot;
							
								$.ajax({
									type:"POST",
									url:"includes/agregarComentarioH.php",
									data:cadena,
									success:function(r){
										console.log(r);
										if(r==1){
											$('#comentario').load('includes/comentarioI.php');
											 //$('#buscador').load('componentes/buscador.php');
											alertify.success("Comentario enviado con exito :)");
										}else{
											alertify.error("Fallo el servidor :(");
										}
									}
								});
							}

							function agregarcomentarioA(rating,comentario,idcli,idat){

								cadena="valoracion=" + rating + 
										"&comentario=" + comentario +
										"&idcli=" + idcli +
										"&idat=" + idat;
							
								$.ajax({
									type:"POST",
									url:"includes/agregarComentarioA.php",
									data:cadena,
									success:function(r){
										console.log(cadena);
										if(r==1){
											$('#comentarioA').load('includes/comentarioA.php');
											 //$('#buscador').load('componentes/buscador.php');
											alertify.success("Comentario enviado con exito :)");
										}else{
											alertify.error("Fallo el servidor :(");
										}
									}
								});
							}