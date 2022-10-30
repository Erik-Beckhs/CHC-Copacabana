  <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header">Buscar</h5>
            <div class="card-body">
                   <form name="search" action="buscar_paquete.php" method="GET">
              <div class="input-group">
           
        <input type="text" name="searchtitle" class="form-control" placeholder="<?= $st? $st:'Buscar...'?>" required>
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit">Ir!</button>
                </span>
              </form>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Mostrar</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <ul class="list-unstyled mb-0">
                    <li>
                    <div class="badge <?php echo $pid==1? 'badge-info': 'badge-dark'?> text-wrap my-2">
                    <a href="package-list.php?pid=1"><h6 class="card-title" style="width: 13rem;"><p class="text-white text-left px-2"><b><i class="fas fa-car"></i> Circuito</b></p></h6></a>
                    </div>
                    </li>
                    <li>
                    <div class="badge <?php echo $pid==2? 'badge-info': 'badge-dark'?> text-wrap">
                    <a href="package-list.php?pid=2"><h6 class="card-title" style="width: 13rem;"><b><p class="text-white text-left px-2"><i class="fas fa-bed"></i> Programa de Estancia</p></b></h6></a>
                  </div>
                    </li>
                    <li>
                    <div class="badge <?php echo $pid==3? 'badge-info': 'badge-dark'?> text-wrap my-2">
                    <a href="package-list.php?pid=3"><h6 class="card-title" style="width: 13rem;"><p class="text-white text-left px-2"><b><i class="fas fa-star"> </i> Premium</p></b></h6></a>
                  </div>
                    </li>
                    <li>
                    <div class="badge <?php echo $pid!=1 && $pid!=2 && $pid!=3 ? 'badge-info': 'badge-dark'?> text-wrap ">
                    <a href="package-list.php"><h6 class="card-title" style="width: 13rem;"><p class="text-white text-left px-2"><b><i class="fas fa-border-all"></i> Ver Todo</p></b></h6></a>
                  </div>
                    </li>
                  </ul>
                </div>
       
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Más reservados</h5>
            <div class="card-body">
            <ul class="list-group">
<?php
$sql = "select p.idpaq id, p.nombre nombre, count(r.idpaq) cantidad from paquete p, reserva r where p.idpaq = r.idpaq group by p.nombre order by cantidad DESC limit 7";
$query=$dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount()>0)
foreach($results as $result):
?>
  <li class="list-group-item d-flex justify-content-between align-items-center"><a href="package-details.php?paqid=<?= htmlentities($result->id);?>">
    <?= htmlentities($result->nombre);?></a>
    <span class="badge badge-primary badge-pill"><?= htmlentities($result->cantidad);?></span>
  </li>
<?php
endforeach;
?>      
            </ul>
            </div>
          </div>

        </div>
