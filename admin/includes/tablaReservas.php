<?php
session_start();
include('config.php');
$inst=$_SESSION['inst'];
$rr=$_SESSION['rr'];
?>
<div class="w3l-table-info">			
                    <table >
						<thead>
						  <tr>
						  <th>#</th>
						  <th >Paquete</th>
						  <th >Tipo</th>
							<th>Cliente</th>
							<th>Fecha Reserva</th>
							<th>Fecha Salida</th>
							<th>Cantidad</th>
							<th>Precio Unitario</th>
							<th>Total</th>
						  </tr>
						</thead>
						<tbody>
<?php 
if($rr==1){
	$sql = "SELECT p.nombre, u.nombrecom, r.fechareserva, r.fechasol, r.cantper, r.total total, p.precio, p.tipopaq from paquete p, reserva r, usuario u where p.idpaq=r.idpaq and r.idus=u.id and p.idagencia = $inst and r.estado=1 order by r.fechareserva desc limit 20";
}
else if($rr==2)
{
	$sql = "SELECT p.nombre, u.nombrecom, r.fechareserva, r.fechasol, r.cantper, r.total total, p.precio, p.tipopaq from paquete p, reserva r, usuario u where p.idpaq=r.idpaq and r.idus=u.id and p.idagencia = $inst and r.estado=0 order by r.fechareserva desc limit 20";
}
else{
	$sql = "SELECT p.nombre, u.nombrecom, r.fechareserva, r.fechasol, r.cantper, r.total total, p.precio, p.tipopaq from paquete p, reserva r, usuario u where p.idpaq=r.idpaq and r.idus=u.id and p.idagencia = $inst order by r.fechareserva desc limit 20";
}
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	
	$nombre=htmlentities($result->nombre);
	$nombrecom=htmlentities($result->nombrecom);
	$fechar=htmlentities($result->fechareserva);
	$fechasol=htmlentities($result->fechasol);
	$cantper=htmlentities($result->cantper);
	$tipopaq=htmlentities($result->tipopaq);
	$precio=htmlentities($result->precio);
	$total=htmlentities($result->total);
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
	?>		
						  <tr>
							<td><?php echo $cnt;?></td>
							<td><?php echo $nombre;?></td>
							<td><?php echo $tipo;?></td>
							<td><?php echo $nombrecom;?></td>
							<td><?php echo $fechar;?></td>
							<td><?php echo $fechasol;?></td>
							<td><?php echo $cantper;?></td>
							<td><?php echo $precio;?></td>
							<td><?php echo $total;?></td>
						  </tr>
						 <?php $cnt=$cnt+1;} }?>
						</tbody>
					  </table>
					</div>
				  </table>
                  </div>
