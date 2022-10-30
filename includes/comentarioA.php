<div class="container border rounded my-2 bg-danger">
	<div class="badge badge-white my-4" style="width:25rem; background-color:#FA5C67;">
		<h2 class="text-white">Comentarios</h2>
	</div>
    
        <?php
        session_start();
        $aid=$_SESSION['aid'];
            require_once "config.php";
            $sql="select u.nombrecom nombrecom, DATE_FORMAT(c.fechacal, '%d-%m-%Y') as fechacal, c.valoracion valoracion, c.comentario comentario from calificaa c, usuario u where u.id=c.idusuario and c.idatr = ?";
            $query=$dbh->prepare($sql);
            $query->execute([$aid]);
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount()>0)
            {
                foreach($results as $result)
                {
                    ?>
                <div class="card mb-3" style="max-width: 900px;">
                
                <div class="row mx-2 my-1" style="width:100%;">
                    
                <div class="col-md-2 border-right">
                    <img src="images/users/dot.png" class="card-img" style="width:120px; height:120px;">
                </div>
                        <div class="col-md-9">
                            <div class="card-body rounded bg-white">
                                
                                <div class="row">
                                    <div class="col-md-6 border-right">
                                        <span class="h4 font-weight-bold"><?=htmlentities($result->nombrecom);?></span>
                                        <p class="card-text"><small class="text-muted"><?= obtenerFechaEnLetra(htmlentities ($result->fechacal));?></small></p>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="row ml-1">
                                        <span class="border rounded p-1 ml-3">
                                        <span class="h5">
                                            Valoración del Cliente:
                                        </span><span class="h4 font-weight-bold mx-2"><?= htmlentities($result->valoracion);?></span>
                                        </span>
                                    </div>
                                    <?php
                                        $star=htmlentities($result->valoracion);
                                        $starwhite=10-($star);
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
                                    </div>
                                </div>
                                <div class="row mx-1">
                    <p class="card-text"><?=htmlentities($result->comentario);?></p>
                    </div>
                        
                    <div class="row mx-1">
                    <p class="h4 xd"><i class="fas fa-thumbs-up text-primary"></i></p>
                    <p class="h4 xd mx-2"><i class="fas fa-heart text-danger"></i></p>
                    <p class="h4 xd"><i class="fas fa-laugh-squint text-warning"></i></p>
                    <p class="h4 mx-2 xd"><i class="fas fa-sad-tear text-warning"></i></p>
                    
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
                 <?php
function obtenerFechaEnLetra($fecha){
    $dia= conocerDiaSemanaFecha($fecha);
    $num = date("j", strtotime($fecha));
    $anno = date("Y", strtotime($fecha));
    $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
    return $dia.', '.$num.' de '.$mes.' del '.$anno;
}
 
function conocerDiaSemanaFecha($fecha) {
    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    $dia = $dias[date('w', strtotime($fecha))];
    return $dia;
}
?>