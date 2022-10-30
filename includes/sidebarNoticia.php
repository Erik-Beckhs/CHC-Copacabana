
<div class="col-md-4">

<!-- Search Widget -->
<div class="card mb-4" style="box-shadow: 0px 0px 5px 1px black;">
  <h5 class="card-header bg-dark text-white">Busqueda</h5>
  <div class="card-body">
         <form name="search" action="buscar_noticia.php" method="post">
      <div class="input-group">
      <input type="text" name="busquedaN" class="form-control"  required>
      <span class="input-group-btn">
        <button class="btn btn-dark" type="submit">Buscar</button>
      </span>
    </form>
    </div>
  </div>
</div>


<!-- Side Widget -->
<div class="card my-4" style="box-shadow: 0px 0px 5px 1px black;">
  <h5 class="card-header bg-dark text-white">Últimas noticias</h5>
  <div class="card-body">
  <ul class="mb-0">
<?php
$query=mysqli_query($con,"select id, titulo from noticia where activo=1 order by fecha desc limit 8");
while ($row=mysqli_fetch_array($query)) {

?>

<li>
            <a href="noticiaDetalle.php?nid=<?= htmlentities($row['id']);?>"><?php echo htmlentities($row['titulo']);?></a>
          </li>
  <?php } ?>
</ul>
<hr/>
<div style="display:block;">
<h5><a href="noticia.php"> Ver todas las Noticias</a></h5>
</div>
  </div>
</div>

</div>
