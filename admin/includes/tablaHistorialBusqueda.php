<?php
include('config.php');
$fecha=$_GET['fecha'];
?>
<div class="w3l-table-info">
					<caption>
                        <span class="h1 text-primary"> Historial</span>
						<br>
						<?php
						if($_GET['fecha']!=""){
							echo "<span class='h4 text-primary'> Fecha:".$fecha."</span>";
						}
						?>
						
                        <form action="" method="get" class="form_search">
                            <input type="date" name="fecha" id="busqueda">
                            <input type="submit" value = "Filtrar" class="btn btn-success">
                        </form>
                    </caption>
					    <table id="table">
						<thead>
						  <tr>
						  <th>#</th>
							<th >Usuario</th>
							<th>Tipo</th>
							<th>Ingreso a Sistema</th>
							<th>Salida de Sistema</th>
							<th>Eliminar</th>
						  </tr>
						</thead>
						<tbody>
<?php 
if($_GET['fecha']==""){
	$sql = "select * from historial";
}
else{
	$sql = "select * from historial where ingreso like '%$fecha%'";
}
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
	$cnt=1;
	foreach($results as $result)
	{
		$id=htmlentities($result->idhistorial);
		$idusuario=htmlentities($result->idusuario);
		$tipo=htmlentities($result->tipo);
		$ingreso=htmlentities($result->ingreso);
		$salida=htmlentities($result->salida);

		$sql2="select * from usuario where id=$idusuario";
		$query2=$dbh->prepare($sql2);
		$query2->execute();
		$results2=$query2->fetchAll(PDO::FETCH_OBJ);
		foreach($results2 as $result2){
			$nombrecom=htmlentities($result2->nombrecom);
		}

		$sql3="select * from tipous where idt=$tipo";
		$query3=$dbh->prepare($sql3);
		$query3->execute();
		$results3=$query3->fetchAll(PDO::FETCH_OBJ);
		foreach($results3 as $result3)
		{
			$t=htmlentities($result3->tipous);
		}
		
		?>	
	
						  <tr>
							<td><?php echo $cnt;?></td>
							<td><?php echo $nombrecom;?></td>
							<td><?php echo $t;?></td>
							<td><?php echo $ingreso;?></td>
							<td><?php echo $salida;?></td>
							<td><a href="#" onclick="preguntarSiNo2('<?php echo $id; ?>')" class="badge badge-danger"><span class="h4"><i class="fa fa-trash text-white"></i> Eliminar</span></a></td>
						  </tr>
						 <?php $cnt=$cnt+1;
						} }?>
						</tbody>
					  </table>
					</div>
				  </table>
			</div>
			<div class="row float-right">
			<?php 
			if($_GET['fecha']==0)
			{
			?>
			<a href="reportes.php?r=5" target="_blank"><button class="btn btn-primary btn-lg" name="btnImprimir" style="width:200px;"><i class="fas fa-print"></i> Imprimir</button></a>
			<?php
			}
			else{
				?>
					<a href="reportes.php?fecha=<?= $fecha;?>&r=6"><button class="btn btn-primary btn-lg" name="btnImprimir" style="width:200px;"><i class="fas fa-print"></i> Imprimir</button></a>
				<?php
			}
			?>
			</div>