<div class="container border rounded my-2 bg-danger">
	<div class="badge badge-white my-4" style="width:25rem; background-color:#C66856;">
		<h1 class="text-white">Comentarios</h1>
	</div>

        <?php
            $sql="select u.nombrecom nombrecom, DATE_FORMAT(c.fechacal, '%d-%m-%Y') as fechacal, c.valoracion valoracion, c.comentario comentario from calificap c, usuario u where u.id=c.idusuario and c.idpaq = ?";
            $query=$dbh->prepare($sql);
            $query->execute([$paqid]);
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount()>0)
            {
                foreach($results as $result)
                {
                    ?>
                <div class="card mb-3" style="max-width: 900px;">
                
                <div class="row mx-2 my-1" style="width:100%;">
                    
                <div class="col-md-2 border-right">
                    <img src="images/users/dot.png" class="card-img" style="width:80px; height:80px;">
                </div>
                        <div class="col-md-9">
                            <div class="card-body rounded bg-white">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="font-weight-bold"><?=htmlentities($result->nombrecom);?></h4>
                                        <p class="card-text"><small class="text-muted"><?= obtenerFechaEnLetra(htmlentities($result->fechacal));?></small></p>
                                    </div>
                                    
                                    <div class="col-md-6 border-left">
                                    <div class="row">
                                        <span class="border rounded">
                                        <span class="h5">
                                            Valoración del Cliente:
                                        </span><span class="h4 font-weight-bold"><?= htmlentities($result->valoracion);?></span>
                                        </span>
                                        <span class="mx-auto">
                                    </div>
                                    <?php
                                        $star=htmlentities($result->valoracion);
                                        $starwhite=5-($star);
                                        for($i=0; $i<$star; $i++)
                                        {
                                            ?>
                                            <i class="fas fa-star text-warning"></i>
                                            <?php
                                        }
                                        for($j=0; $j<$starwhite; $j++)
                                        {
                                        ?>
                                        <i class="fa fa-star"></i>
                                            <?php
                                            }
                                            ?>
                                            </span>
                                    </div>
                                </div>
                                <div class="row mx-1">
                    <p class="card-text"><?=htmlentities($result->comentario);?></p>
                    </div>
                        
                    <div class="row mx-1">
                    <p class="h4"><i class="fas fa-thumbs-up text-primary"></i></p>
                    <p class="h4 mx-1"><i class="fas fa-heart text-danger"></i></p>
                    <p class="h4"><i class="fas fa-laugh-squint text-warning"></i></p>
                    <p class="h4 mx-1"><i class="fas fa-sad-tear text-warning"></i></p>
                    
                    </div>
                            </div>
                        </div>
                        
                    </div>
                    
	             </div>
                    <?php
                }
            }   
            else {
                ?>
                <h4 class="text-white">Aún no existen comentarios</h4>
                <?php
            }
        ?>
		

                 </div>
                  