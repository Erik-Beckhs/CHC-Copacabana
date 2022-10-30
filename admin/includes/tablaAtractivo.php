<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a><i class="fa fa-angle-right"></i>Gestión de Atractivos</li>
    </ol>
<div class="agile-grids">	
<div class="agile-tables border">
				<!-- tables -->
				<div class="row ml-auto">
				<div class="col-md-12">
					  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
					  <div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav">
						<li class="nav-item" style="width:440px;">
							<a class="nav-link text-white text-center" href="manage-attractives.php?estado=1">Activos</a>
						</li>
						<li class="nav-item mx-1" style="width:440px;">
							<a class="nav-link text-white text-center" href="manage-attractives.php?estado=0">Inactivos</a>
						</li>
						</ul>
					</div>
</nav>
</div></div>
<div class="row">	
<?php
$start=($_GET['pagina']-1)*$regpp;
if($est==1)
{
	$sql = "SELECT * from atractivo where activo=1 limit $start, $regpp";
	$tit="Activos";
}
else {
	$sql = "SELECT * from atractivo where activo=0 limit $start, $regpp";
	$tit="Inactivos";
}
?>		
				
					<div class="w3l-table-info">
					  <h2>Atractivos <?= $tit; ?></h2>
</div>
<div class="col-md-9">
					  <form action="search_attractive.php" method="get" class="form_search">
						<input type="text" name="busqueda" placeholder="Buscar" id="busqueda">
						<input type="submit" value = "Buscar" class="btn_search">
					</form>
</div>

					    <table id="table">
						<thead>
						  <tr>
						  <th>#</th>
							<th >Nombre</th>
							<th>Ubicacion</th>
							<th>Dificultad</th>
							<th>Categoria</th>
							<th>Cambiar Estado</th>
							<th>Opciones</th>
						  </tr>
						</thead>
						<tbody>
<?php 
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$start+1;

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
							<td><?php echo htmlentities($cnt);?></td>
							<td><?php echo htmlentities($result->nombre);?></td>
							<td><?php echo htmlentities($result->ubicacion);?></td>
							<td><?php echo htmlentities($result->dificultad);?></td>

							<?php $cat=htmlentities($result->idcat);
							$sqlc="select nombrecat from categoria where idcat=$cat";
							$queryc=$dbh->prepare($sqlc);
							$queryc->execute();
							$ress=$queryc->fetchAll(PDO::FETCH_OBJ);
							if($queryc->rowCount() > 0)
							{
							foreach($ress as $ress2)
							{
								$c=htmlentities($ress2->nombrecat);
							}
							}
							else
							{
								$c="Sin Categoria";
							}
														?>													
							<td><?= $c; ?></td>
							<td>
							<?php $id=htmlentities($result->ID);?>
							<!--<form action="includes/controlador_atr.php" method="POST">-->
								<input type="hidden" value=<?= $id;?> name="id">
								<input type="hidden" value=<?= $est; ?> name="estado">
								<input type="submit" class="button rounded h5 text-white <?= $est==1? 'bg-danger' : 'bg-success' ?>" name="cambiar_estado" value=<?=
								$est==1? Inactivar : Activar?> id="estadoA" onclick="preguntarSiNo('<?php echo $id ?>')">
							<!--</form>-->
							</td>
							<td>
							<div class="h4 text-center">	
								<a href="update.php?uid=<?= $id;?>" title="Modificar"><i class="fa fa-edit text-info"></i></a>
								<a href="delete.php?uid=<?= $id;?>" title="Eliminar"><i class="fas fa-trash-alt text-danger"></i></a>
							</div>
							</td>
						  </tr>
						 <?php $cnt=$cnt+1;} }?>
						</tbody>
					  </table>
					</div>
				  </table>
<div class="row justify-content-center">	
<nav aria-label="page navigation example">
<ul class="pagination ml-5 mb-3">
<li class="page-item <?php echo $_GET['pagina']<=1? 'disabled':'' ?>"><a class="page-link" href="manage-attractives.php?pagina=<?= $_GET['pagina']-1;?>&estado=<?= $est;?>">Anterior</a></li>
      <?php for($i=0;$i<$total_paginas;$i++):?>
      <li class="page-item 
      <?php echo $_GET['pagina']==$i+1 ? 'active': '' ?> ">
      <a href="manage-attractives.php?pagina=<?= $i+1; ?>&estado=<?= $est;?>" class="page-link">
      <?= $i+1;?></a>
      </li>
      <?php endfor ?>
      <li class="page-item <?php echo $_GET['pagina']>=$total_paginas? 'disabled':'' ?>"><a href="manage-attractives.php?pagina=<?= $_GET['pagina']+1;?>&estado=<?= $est;?>" class="page-link">Siguiente</a></li>
</ul>
</nav>
</div>