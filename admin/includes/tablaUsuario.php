<?php
include('config.php');
?>

<div class="w3l-table-info">
					
					  <span class="h2 text-primary">Administrar Usuarios</span>
				
					
                    <table id="table">
                    <caption>
                        <a href="#" data-toggle="modal" data-target="#myModalN"><button class="btn btn-success"><i class="fa fa-user-plus"></i> Agregar Nuevo</button></a>
                        
                        <form action="search_user.php" method="get" class="form_search">
                            <input type="text" name="busqueda" placeholder="Buscar" id="busqueda">
                            <input type="submit" value = "Buscar" class="btn_search">
                        </form>
                    </caption>
						<thead>
						  <tr>
						  <th>#</th>
							<th>Nombre</th>
							<th>Número de telefono</th>
							<th>Email</th>
							<th>Tipo </th>
							<th>Acción</th>
						  </tr>
						</thead>
						<tbody>

<?php 
$sql = "SELECT * from usuario order by id desc limit 10";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	
	$id=htmlentities($result->id);
	$nombre=htmlentities($result->nombrecom);
	$telefono=htmlentities($result->telefono);
	$t=htmlentities($result->idtipou);
	$email=htmlentities($result->email);
	$dni=htmlentities($result->dni);
	$pass=htmlentities($result->pass);
						   $datos=$id."||".$nombre."||".$telefono."||".$email."||".$t."||".$pass."||".$dni;
						   			?>		
						  <tr>
							<td><?php echo htmlentities($cnt);?></td>
							<td><?php echo $nombre;?></td>
							<td><?php echo $telefono;?></td>
							<?php
							$tipo='Super Admin';
							if($t==1)
							{
								$tipo="Administrador";
							}
							else if($t==2)
							{
								$tipo="Encargado";
							}
							else if($t==3)
							{
								$tipo="Cliente";
							}
							?>
							<td><?php echo $email;?></td>
							<td><?php echo $tipo;?></td>
							<td>
							<div class="text-center h3">
								<a href="#" title="Modificar" data-toggle="modal" data-target="#myModalE" onclick="agregaform('<?php echo $datos ?>')"><i class="fa fa-edit text-info"></i></a>
								<a href="#" title="Eliminar" onclick="preguntarSiNo('<?php echo $id; ?>')"><i class="fas fa-trash-alt text-danger"></i></a>
							</div>
							</td>
						  </tr>
						 <?php $cnt=$cnt+1;} }?>
						</tbody>
					  </table>
					</div>
				  </table>
                  </div>
