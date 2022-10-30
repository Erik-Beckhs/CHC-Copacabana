  <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header">Buscar</h5>
            <div class="card-body">
                   <form name="search" action="buscar_hotel.php" method="GET">
              <div class="input-group">
          <!--<input type="hidden" name="pagina" value="<?//= $_GET['pagina']; ?>">-->
        <input type="text" name="searchtitle" class="form-control" placeholder="<?php echo $_GET['searchtitle']? $st : 'Buscar...' ?>">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit">Ir!</button>
                </span>
              </form>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Ordenar por</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <ul class="list-unstyled mb-0">
                    
                    <li>
                    <div class="btn btn-info text-wrap <?= $ord==1?'active':'' ?>">
                    <a href="hoteles-list.php?ord=1"><h6 class="card-title" style="width: 13rem;"><p class="text-white text-left"><i class="fas fa-star"></i> Valoración de clientes</p></h6></a>
                  </div>
                    </li>
                    <li>
                    <div class="btn btn-info text-wrap my-2 <?= $ord==2?'active':'' ?>">
                    <a href="hoteles-list.php?ord=2"><h6 class="card-title " style="width: 13rem;"><p class="text-white text-left"><i class="fas fa-bookmark"></i> Clasificación</p></h6></a>
                  </div>
                    </li>
                    <li>
                    <div class="btn btn-info text-wrap <?= $ord==3?'active':'' ?>">
                    <a href="hoteles-list.php?ord=3"><h6 class="card-title" style="width: 13rem;"><p class="text-white text-left"><i class="fas fa-dollar-sign"> </i> Precio</p></h6></a>
                  </div>
                    </li>
                  </ul>
                </div>
       
              </div>
            </div>
          </div>


          <!-- Side Widget -->
          <!--
          <div class="card my-4">
            <h5 class="card-header">Mostrar</h5>
            <div class="card-body">
                      <ul class="mb-0">
          </ul>
            </div>
          </div>-->

        </div>
