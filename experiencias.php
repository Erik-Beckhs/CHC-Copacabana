<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(!isset($_GET['pagina']))
{
    header("location:experiencias.php?pagina=1");
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>CHC | Experiencias</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style2.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="css/fontawesome/css/brands.css" rel="stylesheet">
  <link href="css/fontawesome/css/solid.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css" />
	<script>
		 new WOW().init();
	</script>
<script src="js/jquery-ui.js"></script>
					<script>
						$(function() {
						$( "#datepicker,#datepicker1" ).datepicker();
						});
					</script>
	  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.img-emb2{
            width:500px;
            height:250px !important;
        }
        a{
            text-decoration:none;
        }
		</style>				
</head>
<body>
<!-- top-header -->
<?php include('includes/header2.php');?>
<div class="banner-3">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> CHC - Experiencias de Visita</h1>
	</div>
</div>
<!--- /banner ---->
<!--- selectroom ---->
<div class="selectroom">
	<div class="container">	
		  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>INFORMACIÓN</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<!-- blog -->
<section class="blog_w3ls py-lg-5" id="posts">
        <div class="container py-sm-5 py-4">
            <div class="title-desc text-right pb-sm-3">
                <h3 class="main-title-w3pvt  text-capitalize">Reseñas</h3>
                <p>Comparte tu experiencia y ayuda a cientos de personas que pretenden visitar el lugar</p>
            </div>
            <div class="row space-sec">
                <!-- blog grid -->
<?php

$no_registros_pagina = 9;

$total_p="select * from experiencia where estado=1";
$result=$dbh->prepare($total_p);
$result->execute();
$total=$result->rowCount();
$total_paginas = ceil($total / $no_registros_pagina);

$iniciar=($_GET['pagina']-1)*$no_registros_pagina;

$sql3="select * from experiencia e, usuario u where estado=1 and u.id=e.idvisitante order by idexp desc limit $iniciar, $no_registros_pagina";

                $query2=$dbh->prepare($sql3);
                $query2->execute();
                $results=$query2->fetchAll(PDO::FETCH_OBJ);

                if($query2->rowCount() > 0)
                {
                foreach($results as $result)
                {	
                    $img=htmlentities($result->img);
                    $asunto=htmlentities($result->asunto);
                    $experiencia=htmlentities($result->experiencia);
                    $nombrecom=htmlentities($result->nombrecom);
                    $fechapub=htmlentities($result->fechapub);
                
                $datos = $img."||".$asunto."||".$experiencia."||".$nombrecom."||".$fechapub
	
                    ?>
                <div class="col-lg-4 col-md-6 mt-sm-0 mt-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="#exampleModal2" data-toggle="modal" aria-pressed="false" data-target="#exampleModal2" title="Ver Experiencia" onclick="agregaformResena('<?php echo $datos ?>')">
                                <img class="img-fluid img-thumbnail img-emb2" src="images/experiencias/<?php echo $img;?>" alt="Card image cap">
                                <span class="fa fa-user post-icon bg-theme" data-blast="bgColor" 
                                aria-hidden="true"></span>
                        </div>
                        <div class="card-body">
                            <h5 class="blog-title card-title font-weight-bold text-capitalize text-dark">
                            <?php echo $asunto;?>
                            </h5>
                            <p class="text-justify h5 text-dark"><?php echo substr($experiencia, 0, 100);?>...</p>
                            <p style="color:#ff4f81" class="mt-3 font-weight-bold text-right">
                            <?php echo $nombrecom;?>
                            </p>
                            <div class="text-right">
                            <span class="text-white rounded p-1" style="background-color:#ff4f81;"><?php echo obtenerFechaEnLetra($fechapub);?></span>
                            </div>
                        </div>
					</div></a>
                </div>
                <?php }} ?> 
                <!-- //blog grid -->
            </div>
        </div>

<div class="row justify-content-center">
<nav aria-label="page navigation example">
<ul class="pagination ml-5 mb-3">
      <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled':'' ?>"><a class="page-link" href="experiencias.php?pagina=<?= $_GET['pagina']-1;?>">Anterior</a></li>
      <?php for($i=0;$i<$total_paginas;$i++):?>
      <li class="page-item 
      <?php echo $_GET['pagina']==$i+1 ? 'active': '' ?> ">
      <a href="experiencias.php?pagina=<?= $i+1; ?>" class="page-link">
      <?= $i+1;?></a>
      </li>
      <?php endfor ?>
      <li class="page-item <?php echo $_GET['pagina']>=$total_paginas? 'disabled':'' ?>"><a href="experiencias.php?pagina=<?= $_GET['pagina']+1;?>" class="page-link">Siguiente</a></li>
</ul>
</nav>
</div>
    </section>
	<!-- //blog -->
	 <!-- contact -->
     <!--
	 <div class="contact-wthree pt-lg-5" id="contact">
        <div class="container border">
            <div class="title-desc text-left pb-3">
                <h3 class="main-title-w3pvt  text-capitalize">Describe tu experiencia en el Santuario</h3>
                <p>Tu opinión es muy importante para nosotros</p>
            </div>
            <div class="row py-lg-5 py-sm-4">
                <div class="col-lg-12">
                    <div class="w3_pvt-contact-top">
                        <h2>Reseña</h2>
                    </div>
                    
                    <div class="col-md-6 mt-3 border py-4">
                        <!-- register form grid 
                        <div class="register-top1">
                            <form action="includes/controlador_experiencia.php" method="post" class="register-wthree">
                                
                                <div class="form-group">
                                            <label>
                                                Nombre Completo
                                            </label>
                                            <input class="form-control" type="text" placeholder="Nombre" name="name"
                                                required="" data-blast="borderColor">
								</div>
                                

								<div class="form-group">
                                            <label>
                                                Asunto
                                            </label>
                                            <input class="form-control" type="text" placeholder="Email" name="email"
                                                required="" data-blast="borderColor">
                                </div>
                                        
                                <div class="form-group">
                                            <label>
                                                Cuéntanos tu Experiencia
                                            </label>
                                            <textarea class="form-control" type="text" name="comentario"
                                                required="" data-blast="borderColor"></textarea>
								</div>
								<div class="form-group">
											<input type="button" value="Sube tu Imagen" class="btn btn-info">
											
								</div>
										
                                            <button type="submit" data-blast="bgColor" class="btn btn-w3_pvt btn-block text-white font-weight-bold text-uppercase bg-theme">Enviar</button>   
                            </form>
                            
                           
                        </div>
                        
                    
                        <!--  //register form grid ends here 
                    </div>
                    
                    <div class="col-md-6 py-3 text-right">
                                   
                <img src="images/res.jpg" class="img-fluid rounded" style="width:400px; height:450px;" alt="imagen">
              
                
                </div>
                -->
                
                </div>
                
            </div>
            
        </div>
        
    </div>
    
    <!-- //contact -->
    <div class="fixed-bottom mb-4">
<div class="btn btn-danger mx-4 py-2">
	<h3 class="text-right"><a href="index.php" class="text-white"><i class="fas fa-arrow-circle-left"></i> Volver</a></h3>
</div>	
</div>
</div>



</div>
    <!-- blog modal1 -->

    <div class="modal fade" id="myModalExp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-theme">
                    <label class="modal-title h5 text-white" id="asunto"></label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="images/a4.jpg" class="img-fluid" alt="" />
                    
                    <input type="text" class="form-control" id="nombre"></span>

                    <p class="text-left my-4">
                        Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur non nulla sit amet
                        nisl
                        tempus convallis quis ac
                        lectus. Cras ultricies ligula sed magna dictum porta.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- //blog modal1 -->

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
<!--- /selectroom ---->
<!--- /footer-top ---->
<?php include('includes/modalIndex.php');?>
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/registro.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/ingresar.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>

<script src="js/funciones.js"></script>
</body>
</html>