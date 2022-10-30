<?php
session_start();
include('config.php');
?>

<div class="w3l-table-info">
					
<h2><strong>Administrar Paquetes</strong></h2>
				
					
                    <table >
                    <caption>
                        <a href="create-package.php"><button class="btn btn-success"><i class="fa fa-external-link-alt"></i> Agregar Nuevo</button></a>
						<?php
							if(isset($_SESSION['palabraP'])){
						?>
						<a href="manage-packages.php"><button class="btn btn-info"><i class="fas fa-ban"></i> Eliminar Filtros</button></a>
						<?php
							}
						?>
						
                        
                        <form action="manage-packages.php" method="POST" class="form_search">
                            <input type="text" name="busqueda" placeholder="Buscar" id="busqueda">
                            <input type="submit" value = "Buscar" class="btn_search">
                        </form>
                    </caption>
						<thead>
						  <tr>
						  <th>#</th>
						  <th >Nombre</th>
							<th>Precio</th>
							<th>Cantidad de Pers.</th>
							<th>Tipo</th>
							<th>Acción</th>
						  </tr>
						</thead>
						<tbody>
<?php 
if(isset($_SESSION['palabraP']) && isset($_SESSION['inst'])){
	$palabraP=$_SESSION['palabraP'];
	$inst=$_SESSION['inst'];
	$sql = "SELECT * from paquete where nombre like '%$palabraP%' and idagencia = '$inst' order by idpaq desc limit 10";
}
else if(isset($_SESSION['palabraP']))
{
	$palabraP=$_SESSION['palabraP'];
	$sql = "SELECT * from paquete where nombre like '%$palabraP%' order by idpaq desc limit 10";
}
else if(isset($_SESSION['inst']))
{
	$inst=$_SESSION['inst'];
	$sql = "SELECT * from paquete where idagencia = '$inst' order by idpaq desc limit 10";
}
else{
	$sql = "SELECT * from paquete order by idpaq desc limit 10";
}
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	
	$idpaq=htmlentities($result->idpaq);
	$nombre=htmlentities($result->nombre);
	$detalle=htmlentities($result->nombre);
	$precio=htmlentities($result->precio);
	$cantidadp=htmlentities($result->cantidadp);
	$tipopaq=htmlentities($result->tipopaq);
	if($tipopaq == 1)
	{
		$tipo="Circuito";
	}
	else if($tipopaq == 2)
	{
		$tipo="Prog. de Estancia";
	}
	else{
		$tipo="Premium";
	}
	$datos=$idpaq."||".$nombre."||".$detalle."||".$precio."||".$cantidadp."||".$tipopaq;
$sw=0;
$sqlp = "SELECT * from promocion where idpaquete=$idpaq";
$queryp = $dbh -> prepare($sqlp);
$queryp->execute();
$results=$queryp->fetchAll(PDO::FETCH_OBJ);
if($queryp->rowCount() == 1)
{
	$sw=1;
}
	?>		
						  <tr>
							<td><?php echo $cnt;?></td>
							<td><?php echo $nombre;?></td>

							<?php
							$sqlpromo = "SELECT * from promocion where idpaquete=$idpaq and current_date() < fechafin";
							$querypromo = $dbh -> prepare($sqlpromo);
							$querypromo->execute();
							$resultspr=$querypromo->fetchAll(PDO::FETCH_OBJ);
							if($querypromo->rowCount() > 0)
							{
								foreach($resultspr as $resultpr)
								{	
									$precio=htmlentities($resultpr->preciopromo);
								}
							}
							?>
							<td><?php echo $precio;?></td>
							<td><?php echo $cantidadp;?></td>
							<td><?php echo $tipo;?></td>
							<td>
							<div class="text-center h3">
								<a href="update-package.php?pid=<?= $idpaq; ?>" title="Modificar"><i class="fa fa-edit text-info"></i></a>
								<a href="#" title="Eliminar" onclick="preguntarSiNoP('<?php echo $idpaq; ?>')"><i class="fas fa-trash-alt text-danger"></i></a>
								<?php if($sw==0):?>
								<a href="#" title="Promocionar" data-toggle="modal" data-target="#myModalP" onclick="agregaFormP('<?php echo $datos; ?>')"><i class="fas fa-tags text-success"></i></a>
								<?php else:?>
								<a href="#" title="Quitar Promocion" onclick="preguntarSiNoPromo('<?php echo $idpaq; ?>')"><i class="fas fa-ban text-success"></i></a>
								<?php endif;?>
							</div>
							</td>
						  </tr>
						 <?php $cnt=$cnt+1;} }?>
						</tbody>
					  </table>
					</div>
				  </table>
                  </div>
