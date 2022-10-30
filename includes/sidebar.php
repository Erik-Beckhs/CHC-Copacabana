  <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header">Buscar</h5>
            <div class="card-body">
                   <form name="search" action="buscar_atractivo.php" method="GET">
              <div class="input-group">
        
        <?php /* if(!isset($st)){
                  $m="Buscar...";
              }
              else{
                 $m=$st;
              }*/
        ?>

        <input type="text" name="searchtitle" class="form-control" placeholder="<?php echo $st? $st:'Buscar..' ?>" required>
        <input type="hidden" name="pagina" value="1">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit">Ir!</button>
                </span>
              </form>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categorías</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <ul class="list-unstyled mb-0">
<?php 
include("includes/config.php");
$sql="select idcat, nombrecat from categoria";
//$query=mysqli_query($con,"select id,CategoryName from tblcategory");
$query=$dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
//while($row=mysqli_fetch_array($query))
{
?>

                    <li>
                    <?php
                    $catid=htmlentities($result->idcat);
                    ?>
                      <div class="badge <?= $_GET['catid']==$catid?'badge-info':'badge-dark';?> m-1" style="width:15rem;">
                      <a href="category.php?pagina=1&catid=<?php echo $catid?>" class="text-white text-left"><h6><?php echo htmlentities($result->nombrecat);?></h6></a>
                      </div>
                    </li>
<?php } ?>
<li>
<div class="badge <?= $_GET['catid']==0?'badge-info':'badge-dark';?> m-1" style="width:15rem;">
                      <a href="category.php?pagina=1&catid=0" class="text-white text-left"><h6>Ver Todos</h6></a>
                      </div>
</li>
                  </ul>
                </div>
       
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Lugares</h5>
            <div class="card-body">
                      <ul class="mb-0">
                      <li>
<div class="badge <?= $_SESSION['catid']==5?'badge-info':'badge-dark';?> m-1" style="width:15rem;">
                      <a href="category.php?catid=5" class="text-white text-left"><h6>Atractivos en Copacabana</h6></a>
                      </div>
</li>
<li>
<div class="badge <?= $_SESSION['catid']==6?'badge-info':'badge-dark';?> m-1" style="width:15rem;">
                      <a href="category.php?catid=6" class="text-white text-left"><h6>Atractivos en Isla del Sol</h6></a>
                      </div>
</li>
<li>
<div class="badge <?= $_SESSION['catid']==7?'badge-info':'badge-dark';?> m-1" style="width:15rem;">
                      <a href="category.php?catid=7" class="text-white text-left"><h6>Otros Lugares</h6></a>
                      </div>
</li>
            <?php } ?>
          </ul>
            </div>
          </div>

        </div>
