<?php 
session_start();
error_reporting(0);
//$_SESSION['val']==0;
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Camara Hotelera de Copacabana</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Trips Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <!-- color switch -->
    <link href="css/blast.min.css" rel="stylesheet">
    <!-- portfolio -->
    <link href="css/portfolio.css" type="text/css" rel="stylesheet" media="all">

    <link href="css/style2.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    
    
    <!-- font-awesome icons -->
    <link href="css/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="css/fontawesome/css/brands.css" rel="stylesheet">
  <link href="css/fontawesome/css/solid.css" rel="stylesheet">

  <link rel="stylesheet" href="alertifyjs/css/alertify.css">
  <link rel="stylesheet" href="alertifyjs/css/themes/default.css">

    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Custom Theme files -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src=alertifyjs/alertify.js></script>
    
    <script src="js/bootstrap.min.js"></script>
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <!-- //online-fonts -->
    <script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <!--animate-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">

    <style>
        .img-emb{
            height:250px !important;
        }
        .img-emb2{
            width:500px;
            height:250px !important;
        }
        ul.callbacks_tabs {
        left: 47.5%;
    }
    </style>
    <script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
</head>

<body>
<div class="fixed-bottom mb-4">
<div class="mx-4 py-2">
    <a href="#" style="color:white;" data-toggle="modal" data-target="#modalReporteCovid" ><span class="h4"> <button class="btn btn-success text-right"><i class="fas fa-notes-medical"></i> Ultimo Reporte Covid</span></button></a>
</div>	
</div>

    <!-- blast color scheme -->
    <div class="blast-box">
        <div class="blast-frame">
            <p>Color de Esquema</p>
            <div class="blast-colors d-flex justify-content-center">
                <div class="blast-color">#ff4f81</div>
                <div class="blast-color">#77ba00</div>
                <div class="blast-color">#ffa900</div>
                <div class="blast-color">#2ec4b6</div>
                <div class="blast-color">#42a5f5</div>
                <!-- you can add more colors here -->
            </div>
            <p class="blast-custom-colors">Color personalizado</p>
            <input type="color" name="blastCustomColor" value="#cf2626">

        </div>
        <div class="blast-icon"><i class="fa fa-cog" aria-hidden="true"></i></div>

    </div>
    <!-- //blast color scheme -->
    <?php include ("includes/header.php"); ?>
    <!-- banner -->
    <div id="home">
        
        </header>
        <div class="callbacks_container">
            <ul class="rslides" id="slider3">
                <li class="banner banner1">
                    <div class="container">
                        <div class="banner-text">
                            <div class="slider-info">
                                <span class="line">descubre..</span>
                                <h3>un<span data-blast="bgColor" class="rounded">lugar</span> mágico</h3>
                                <p class="text-white">Descubre Copacabana, uno de los destinos turísticos mas importantes de Bolivia, lleno de magia y encanto </p>
                                <a class="btn bg-theme mt-4 w3_pvt-link-bnr scroll text-white" data-blast="bgColor"
                                href="#exampleModalVideo" data-toggle="modal" role="button" data-target="#exampleModalVideo"><span class="h5"> Invitación <i class="fas fa-video"></i></span></a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="banner banner2">
                    <div class="container">
                        <div class="banner-text">
                            <div class="slider-info">
                                <span class="line">comparte..</span>
                                <h3>una<span data-blast="bgColor" class="rounded">maravillosa</span> experiencia</h3>
                                <p class="text-white">Comparte maravillosas experiencias con los servicios, atractivos y actividades culturales que le brinda el destino turistico número uno de La Paz </p>
                                <a class="btn bg-theme mt-4 w3_pvt-link-bnr scroll text-white" data-blast="bgColor"
                                href="#exampleModalVideo" data-toggle="modal" role="button" data-target="#exampleModalVideo"><span class="h5"> Invitación <i class="fas fa-video"></i></span></a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="banner banner3">
                    <div class="container">
                        <div class="banner-text">
                            <div class="slider-info">
                                <span class="line">visita..</span>
                                <h3><span data-blast="bgColor" class="rounded">nuestro</span> santuario</h3>
                                <p class="text-white">Visita el Santuario de Copacabana y la Virgencita de la Candelaria, patrona de Bolivia </p>
                                <a class="btn bg-theme mt-4 w3_pvt-link-bnr scroll text-white" data-blast="bgColor"
                                href="#exampleModalVideo" data-toggle="modal" role="button" data-target="#exampleModalVideo"><span class="h5"> Invitación <i class="fas fa-video"></i></span></a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- //banner -->
    <!-- ver mas -->
    <div class="about-wthree" id="about">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 about-right-bg"></div>
                <div class="col-lg-7 about-left-wthree bg-theme" data-blast="bgColor">
                    <div class="title-desc text-right pb-sm-3">
                        <h3 class="main-title-w3pvt text-white text-capitalize">Copacabana</h3>
                        <p class="text-white">Municipio Turístico de Bolivia</p>
                    </div>
                    <p class="my-3 text-right text-white child_second">Copacabana ubicada a 150 km. de la Ciudad de La Paz y a orillas del Lago Titicaca es un importante centro turístico y de peregrinación de Bolivia. Un lugar imperdible para conocer la cultura y las tradiciones de las poblaciones del Titicaca.</p>
                    <p class="my-3 text-right text-white child_second">Copacabana está ubicada a 150 km. de La Paz. Las empresas de buses Manco Kapac y Transporte 2 de Febrero tienen varias frecuencias diarias desde la Ciudad de La Paz. El punto de partida queda cerca del Cementerio de La Paz. El viaje tiene una duración de 3,30 horas. También existen algunas agencias de viajes que organizan traslados a Copacabana cada día.</p>
                    <div class="ml-auto text-right">
                        <!--<a href="#plans" class="text-capitalize text-dark w3_pvt-link-bnr btn bg-light scroll mt-sm-4">view
                            more</a>-->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ver mas -->
    <!-- services -->
    <section class=" services-wthreepvt position-relative" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 service-sub-grids">
                    <a href="experiencias.php">
                    <div class="d-flex services-box">
                        <span class="icon">
                            <i class="fa fa-pencil" data-blast="color"></i>
                        </span>
                        <div class="service-content">
                            <span>comparte</span>
                            <h4>experiencia de visitantes</h4>
                        </div>
                    </div>
                    </a>
                    <a href="#ComoLlegarModal" data-toggle="modal" aria-pressed="false" data-target="#ComoLlegarModal">
                    <div class="d-flex services-box">
                        <span class="icon">
                            <i class="fa fa-rocket" data-blast="color"></i>
                        </span>
                        <div class="service-content">
                            <span>averigua</span>
                            <h4>cómo llegar?</h4>
                        </div>
                    </div>
                    </a>
                    <a href="attractive-list.php">
                    <div class="d-flex services-box">
                        <span class="icon">
                            <i class="fa fa-laptop" data-blast="color"></i>
                        </span>
                        <div class="service-content">
                            <span>descubre lugares mágicos</span>
                            <h4>desde tu ordenador</h4>
                        </div>
                    </div>
                    </a>
                    <div class="service-bottom-img">
                        <img src="images/p44.jpg" alt="" class="img-fluid rounded" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="services-bottom">
                        <div class="service-txt">
                            <h5 data-blast="color">Un fin de semana <br>en Copacabana</h5>
                            <p class="my-3 text-right">Planifica tu visita al santuario, visita el 
                            lugar con tus amigos, familia y descubre la infinidad de atractivos y belleza
                            natural que le ofrece nuestro santuario.</p>
                        </div>
                    </div>
                    <div class="my-auto service-top-img">
                        <img src="images/p33.jpg" alt="" class="img-fluid rounded" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //services -->
    <!-- about bottom -->
    <div class="about-wthree1 bg-theme" data-blast="bgColor" id="atractivos">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 about-left-wthree">
                    <div class="title-desc  pb-sm-3">
                        <h3 class="main-title-w3pvt text-white text-capitalize">ATRACTIVOS TURÍSTICOS</h3>
                        <p class="text-white">Disfrútalos</p>
                    </div>
                    <p class="my-3 text-white child_second">Nuestros Atractivos Turísticos se encuentran dentro y fuera 
                    de la población, estando estos, rodeados de hermosos paisajes naturales.</p>
                    <p class="my-3 text-white child_second">Al haber existido en estas tierras, importantes civilizaciones 
                    en el pasado, esto hace del lugar, un destino interesante, lleno de diversidad y cultura.</p>
                    <div class="ml-auto">
                        <a href="attractive-list.php" class="text-capitalize text-dark w3_pvt-link-bnr btn bg-light mt-sm-4">ver atractivos</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img src="images/horca.jpg" alt="" class="img-fluid rounded" />
                </div>
            </div>
        </div>
    </div>
    <!-- about bottom -->
    <!-- pricing plans -->
    <section class="py-lg-5 py-4" id="paquetes">
        <div class="container py-md-5">
            <div class="title-desc text-right pb-sm-3">
                <h3 class="main-title-w3pvt  text-capitalize">paquetes</h3>
                <p>Disfruta nuestros paquetes con costo variado</p>
            </div>
            <div class="row price-row">

            <div class="col-lg-4 col-sm-6 column mb-lg-0 mb-4">
                    <div class="box" data-blast="borderColor">
                        <div class="title">
                            <i class="fa fa-plane" data-blast="color"></i>
                            <h5 data-blast="color">Circuito</h5>
                        </div>
                        <div class="price">
                        <?php
                        $tp=1;
                        $sqlp="select min(precio) precio from paquete where tipopaq=$tp";
                        $queryp=$dbh->prepare($sqlp);
                        $queryp->execute();
                        $resultp=$queryp->fetchAll(PDO::FETCH_OBJ);
                        foreach($resultp as $resp):
                        ?>
                            <h4><sup>Desde</sup><?= htmlentities($resp->precio);?> Bs</h4>
                        <?php endforeach ?>
                        </div>
                        <div class="option">
                            <ul>
                                <li><i class="fa fa-check"></i> Visita a Atractivos</li>
                                <li><i class="fa fa-check"></i> Guias Especializados</li>
                                <li><i class="fa fa-check"></i> Seguridad</li>
                                <li><i class="fa fa-check"></i> Souvenirs</li>
                            </ul>
                        </div>
                        <a href="package-list.php?pid=1"><button type="button" class="btn w3ls-btn bg-theme  d-block"  aria-pressed="false"
                             data-blast="bgColor">
                            ver paquetes
                        </button></a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-sm-6 column mb-lg-0 mb-4">
                    <div class="box" data-blast="borderColor">
                        <div class="title">
                            <i class="fa fa-paper-plane" data-blast="color"></i>
                            <h5 data-blast="color">Programa de Estancia</h5>
                        </div>
                        <div class="price">
                        <?php
                            $tp=2;
                            $sqlp="select min(precio) precio from paquete where tipopaq=$tp";
                            $queryp=$dbh->prepare($sqlp);
                            $queryp->execute();
                            $resultp=$queryp->fetchAll(PDO::FETCH_OBJ);
                            foreach($resultp as $resp):
                            ?>
                                <h4><sup>Desde</sup><?= htmlentities($resp->precio);?> Bs</h4>
                            <?php endforeach ?>
                        </div>
                        <div class="option">
                            <ul>
                                <li><i class="fa fa-check"></i> Transporte</li>
                                <li><i class="fa fa-check"></i> Alimentación</li>
                                <li><i class="fa fa-check"></i> Hotel</li>
                                <!--<li><i class="fa fa-paper-times"></i> Live Support</li>-->
                            </ul>
                        </div>
                        <a href="package-list.php?pid=2"><button type="button" class="btn w3ls-btn bg-theme  d-block"  aria-pressed="false"
                             data-blast="bgColor">
                            ver paquetes
                        </button></a>
                    </div>
                </div>
                

                <div class="col-lg-4 col-sm-6  mx-auto mt-lg-0 mt-4 column">
                    <div class="box" data-blast="borderColor">
                        <div class="title">
                            <i class="fa fa-rocket" data-blast="color"></i>
                            <h5 data-blast="color">Premium</h5>
                        </div>
                        <div class="price">
                            <?php
                            $tp=3;
                            $sqlp="select min(precio) precio from paquete where tipopaq=$tp";
                            $queryp=$dbh->prepare($sqlp);
                            $queryp->execute();
                            $resultp=$queryp->fetchAll(PDO::FETCH_OBJ);
                            foreach($resultp as $resp):
                            ?>
                                <h4><sup>Desde</sup><?= htmlentities($resp->precio);?> Bs</h4>
                            <?php endforeach ?>
                        </div>
                        <div class="option">
                            <ul>
                                <li><i class="fa fa-check"></i> Transporte</li>
                                <li><i class="fa fa-check"></i> Hospedaje</li>
                                <li><i class="fa fa-check"></i> Alimentacion</li>
                                <li><i class="fa fa-check"></i> Recorrido por atractivos</li>
                            </ul>
                        </div>
                        <a href="package-list.php?pid=3"><button type="button" class="btn w3ls-btn bg-theme  d-block"  aria-pressed="false"
                             data-blast="bgColor">
                            ver paquetes
                        </button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- //pricing plans -->
        <!-- team -->
                            <?php $sc="select * from events";
                            $queryc=$dbh->prepare($sc);
                            $queryc->execute();
                            //$res=$queryc->fetchAll();
                            $cantidad=$queryc->rowCount();
                            $op=$cantidad/2;
                            ?>
                            

        <section class="team-wthree py-3  position-relative bg-theme" data-blast="bgColor" id="actividades">
        <div class="container py-lg-5">
            <div class="title-desc text-left pb-3">
                <h3 class="main-title-w3pvt  text-capitalize text-white">Festividades</h3>
                <p class="text-white">Al ser un centro de peregrinaje religioso, el municipio lleva periodicamente una serie de</p> 
                <p class="text-white">festividades, las cuales no debes perdertelas</p>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div id="carouselExampleIndicators" class="carousel slide py-lg-5" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <?php for ($i=1;$i<$op;$i++): ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?=$i;?>"></li>
                            <?php endfor?>
                        </ol>

                    <?php
                    $sql="select * from events";
                    $query=$dbh->prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount()>0)
                    {
                        $c=0;
                        ?>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                        <?php
                        foreach($results as $result)
                        {
                            $ide=htmlentities($result->id);
                            $img=htmlentities($result->img);
                            $title=htmlentities($result->title);
                            $color=htmlentities($result->color);
                            $descripcion=htmlentities($result->descripcion);
                            $start=htmlentities($result->start);
                            $end=htmlentities($result->end);
                            $start2=obtenerFechaEnLetra($start);
                            $video=htmlentities($result->videoUrl);
                            if($color=='#008000'){
                                $status='activo';
                            }
                            else{
                                $status='inactivo';
                            }
                            $datosF=$ide."||".
                            $img."||".
                            $status."||".
                            $descripcion."||".
                            $title."||".
                            $start2."||".
                            $end;
                            ?>
                                <div class="col-md-6">
                                    <div class="box5">
                                        <img src="admin/festividadimg/<?= $img;?>" alt="" class=" img-fluid img-thumbnail img-emb" />
                                        <ul class="icon">
                                            <li><a href="#" data-toggle="modal" data-target="#FestividadModal" class="fa fa-search" title="Ver" onclick="enviarDatosF('<?= $datosF; ?>')"></a>

                                            <input type="hidden" name="id" value=<?= $ide; ?>>
                                            </li>
                                        <?php
                                        if($video!=null){
                                            ?>
                                                <li><a href="#" class="fas fa-video" title="Video" data-toggle="modal" data-target="#modalVideoFestividad" onclick="agregaDatosVideo('<?php echo $video ?>')"></a></li>
                                            <?php
                                        }
                                        ?>
                                        </ul>
                                        <div class="box-content">
                                            <h3 class="title"><?= $title;?></h3>
                                            <span class="post"><?= obtenerFechaEnLetra($start);?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $c=$c+1;
                                if($c%2==0){
                                    ?>
                                    </div>
                                    </div>
                                <div class="carousel-item">
                                <div class="row">
                                <?php
                                 }
                        }
                        ?>
                        </div>
                            </div>
                        </div>
                        <?php

                    }?>            
                    </div>
                </div>
                <div class="col-lg-4 team-right-grid position-absolute p-0 mx-auto">
                    <a href=""><img src="admin/activitieimages/virgen.jpg" alt="" class="img-fluid img-thumbnail" /></a>
                </div>
            </div>
        </div>
    </section>
    <!-- //team -->
    <!-- galeria -->
    <section class="wthree-row w3-gallery cliptop-portfolio-wthree pt-lg-5" id="galeria">
        <div class="container-fluid">
            <div class="title-desc  pb-3">
                <h3 class="main-title-w3pvt  text-capitalize">galeria</h3>
                <p>Conoce más del santuario</p>
            </div>
            <ul class="demo row py-lg-5 py-sm-4 pb-4">
            <?php
            $sql5="select * from experiencia e where estado=1 order by idexp desc LIMIT 12";

                $query5=$dbh->prepare($sql5);
                $query5->execute();
                $results5=$query5->fetchAll(PDO::FETCH_OBJ);

                if($query5->rowCount() > 0)
                {
                foreach($results5 as $result5)
                {	
            ?>
                <li class="col-lg-3 col-sm-6">
                    <div class="gallery-grid1">
                        <img src="images/experiencias/<?php echo htmlentities($result5->img);?>" alt=" " class="img-fluid img-thumbnail img-emb2" />
                    </div>
                </li>
                <?php 
                }
            }
            else {
                echo "No hay imagenes para mostrar";
            }
                    ?>
            </ul>
        </div>
    </section>
    <!-- //galeria-->
    <!-- blog -->
    <section class="blog_w3ls py-lg-5" id="posts">
        <div class="container py-sm-5 py-4">
            <div class="title-desc text-right pb-sm-3">
                <h3 class="main-title-w3pvt  text-capitalize">Últimas Reseñas</h3>
                <p>Comparte tu experiencia y ayuda a cientos de personas que pretenden visitar el lugar</p>
            </div>
            <div class="row space-sec">
                <!-- blog grid -->
                <?php

                $sql3="select * from experiencia e, usuario u where estado=1 and u.id=e.idvisitante order by idexp desc LIMIT 3";

                $query2=$dbh->prepare($sql3);
                $query2->execute();
                $results=$query2->fetchAll(PDO::FETCH_OBJ);

                if($query2->rowCount() > 0)
                {
                foreach($results as $result)
                {	
                    $img=htmlentities($result->img);
                    $asunto=htmlentities($result->asunto);
                    $exp=htmlentities($result->experiencia);
                    $nombrecom=htmlentities($result->nombrecom);
                    $fechapub=htmlentities($result->fechapub);
                    $datos=$img."||".
                        $asunto."||".
                        $exp."||".
                        $nombrecom."||".
                        $fechapub;
                ?>
                <div class="col-lg-4 col-md-6 mt-sm-0 mt-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="#exampleModal2" data-toggle="modal" aria-pressed="false" data-target="#exampleModal2"
                                role="button" onclick="agregaformResena('<?php echo $datos ?>')" >
                                <img class="img-fluid img-thumbnail img-emb2" src="images/experiencias/<?php echo $img;?>" alt="Card image cap">
                                <span class="fa fa-user post-icon bg-theme" data-blast="bgColor" aria-hidden="true"></span>
                            </a>
                        </div>
                        <div class="card-body">
                        
                            <h5 class="blog-title card-title font-weight-bold">
                                <?php echo strtoUpper($asunto);?>
                            </h5>
                            <p class="h3 text-white badge bg-info text-right" id="fechap">
                            PUBLICADO EN: <?php echo $fechapub;?>
                            </p>
                            <span class="text-justify">
                            <p><?= substr($exp, 0, 120);?>...</p>
                            </span>
                            <hr>
                            <p class="text-info text-right h5">
                            <?php echo $nombrecom;?>
                            </p>
                            
                        </div>
                    </div>
                </div>
                <?php }} ?>
                <!-- //blog grid -->
                <div class="mx-2">
                <a href="experiencias.php"><div class="text-white btn btn-info px-2 py-2" style="width:220px;" data-blast="bgColor"><i class="fas fa-pencil-alt h4"></i><span class="h4"> Escribir Reseña</span></div></a>
                </div>
            </div>
        </div>
    </section>
    <!-- //blog -->

    <!-- contact -->
    <div class="contact-wthree pt-lg-5" id="contact">
        <div class="container py-md-5 py-4">
            <div class="title-desc text-left pb-3">
                <h3 class="main-title-w3pvt  text-capitalize">Escríbenos</h3>
                <p>Para nosotros, es importante comunicarnos con nuestros visitantes</p>
            </div>
            <div class="row py-lg-5 py-sm-4">
                <div class="col-lg-12">
                    <div class="w3_pvt-contact-top">
                        <h2>Camara Hotelera de Copacabana</h2>
                        <ul class="d-flex header-wthreelayouts pt-0 flex-column">
                            <li>
                                <span class="fa fa-home" data-blast="color"></span>
                                <p class="d-inline">Plaza 2 de Febrero, Copacabana - Bolivia.</p>
                            </li>
                            <li class="my-3">
                                <span class="fa fa-envelope-open" data-blast="color"></span>
                                <a href="mailto:example@email.com" class="text-secondary">chcopacabana@gmail.com</a>
                            </li>
                            <li>
                                <span class="fa fa-phone" data-blast="color"></span>
                                <p class="d-inline">+591 258 6522</p>
                            </li>
                        </ul>
                    </div>
                    <hr>
                    
                    <div class="col-lg-12 mt-4">
                        <!-- register form grid -->
                        <!--<div class="register-top1">
                            <form action="#" method="post" class="register-wthree">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3 pl-lg-0">
                                            <label>
                                                Nombre Completo
                                            </label>
                                            <input class="form-control" type="text" placeholder="Nombre" name="email"
                                                required="" data-blast="borderColor">
                                        </div>
                                        <div class="col-lg-3 my-lg-0 my-4">
                                            <label>
                                                Email
                                            </label>
                                            <input class="form-control" type="email" placeholder="example@email.com"
                                                name="email" required="" data-blast="borderColor">
                                        </div>
                                        <div class="col-lg-3">
                                            <label>
                                                Telefono
                                            </label>
                                            <input class="form-control" type="text" placeholder="xxx xxxxxxx" name="email"
                                                required="" data-blast="borderColor">
                                        </div>
                                        <div class="col-lg-3 d-flex align-items-end pr-lg-0 mt-lg-0 mt-4">
                                            <button type="submit" data-blast="bgColor" class="btn btn-w3_pvt btn-block w-100 text-white font-weight-bold text-uppercase bg-theme"
                                                >Enviar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>-->
                        <!--  //register form grid ends here -->
                    </div>
                </div>
            </div>
        </div>
        <!-- map -->
        <div class="map p-2">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5346.558114376866!2d-69.08967504740527!3d-16.162912092112784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915dcd7e020a5f2f%3A0x5ff56029fdb79a4a!2sCopacabana!5e0!3m2!1ses!2sbo!4v1604618196392!5m2!1ses!2sbo" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <!--// map-->
    </div>
    <!-- //contact -->
    <!-- footer -->
 
    <!-- //footer -->
    <!-- login  -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" data-blast="bgColor">
                    <h5 class="modal-title" id="exampleModalLabel">Ingresar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" class="p-3">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Usuario</label>
                            <input type="text" class="form-control" placeholder="" name=" name" id="recipient-name"
                                required="">
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Contraseña</label>
                            <input type="password" class="form-control" placeholder="" name="Password" id="password"
                                required="">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Unirse">
                        </div>
                        <div class="row sub-w3l my-3">
                            <div class="col sub-w3_pvt">
                                <input type="checkbox" id="brand1" value="">
                                <label for="brand1">
                                    <span></span>Recordar Contraseña?</label>
                            </div>
                            <div class="col forgot-w3l text-right">
                                <a href="#" class="text-secondary">Olvidaste la contraseña?</a>
                            </div>
                        </div>
                        <p class="text-center dont-do">No tienes una cuenta?
                            <a href="#" data-toggle="modal" data-target="#exampleModal1" class="text-secondary">
                                Registrarse Ahora</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //login -->
    <!-- register -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" data-blast="bgColor">
                    <h5 class="modal-title" id="exampleModalLabel1">Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" class="p-3">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Usuario</label>
                            <input type="text" class="form-control" placeholder="" name=" name" id="recipient-rname"
                                required="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" placeholder="" name="Email" id="recipient-email"
                                required="">
                        </div>
                        <div class="form-group">
                            <label for="password1" class="col-form-label">Contraseña</label>
                            <input type="password" class="form-control" placeholder="" name="Password" id="password1"
                                required="">
                        </div>
                        <div class="form-group">
                            <label for="password2" class="col-form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control" placeholder="" name="Confirm Password" id="password2"
                                required="">
                        </div>
                        <div class="sub-w3l">
                            <div class="sub-w3_pvt">
                                <input type="checkbox" id="brand2" value="">
                                <label for="brand2" class="mb-3">
                                    <span></span> Acepto los terminos y condiciones</label>
                            </div>
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Registrarse">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- // register -->
    <!-- blog modal1 -->
        <!-- modal como llegar -->

        <div class="modal fade" id="ComoLlegarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-theme">
                    <h5 class="modal-title" id="exampleModalLabel2">Cómo llegar a Copacabana?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-justify">
                <div class="row">
                <div class="col-md-6 border-right">
                    <video src="videos/terminal.mp4" controls width="350"></video>
                </div>
                <div class="col-md-6">
                <span class="badge bg-theme text-white" style="font-size:17px;">Buses y Minibuses</span>
                    <p class="text-justify">        
                        En la ciudad de La Paz, la parada de buses y minibuses se encuentra en la zona del Cementerio, calle xxx , si usted se encuentra en la ciudad de El Alto, dirijase a la terminal Interprovincial ubicada en la zona Rio Seco. Las empresas de transporte autorizadas son: Manco Kapac, 2 de Febrero y 6 de Junio.
                    </p>
                    <span class="badge bg-theme text-white" style="font-size:17px;">Salidas Diarias y Costos</span>
                    <p class="text-justify">
                        Las salidas de movilidades comienzan a partir de las 05:00 am hasta las 18:30 pm, el costo oficial de pasaje es de 20 Bs. para buses y 25 Bs. para minibuses.
                    </p>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //modal como llegar -->
        <!-- blog modal1 -->
        <!-- modal video -->

        <div class="modal fade" id="exampleModalVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalVideo"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                    <video src="videos/invitacion.mp4" controls></video>
            </div>
        </div>
    </div>
    <!-- //modal video -->
    <!-- modal video festividad -->

            <div class="modal fade" id="modalVideoFestividad" tabindex="-1" role="dialog" aria-labelledby="modalVideoFestividad"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                    <video id="videoF" src="" controls></video>
            </div>
        </div>
    </div>
    <!-- //modal video festividad-->
            <!-- modal festividad -->
            <div class="modal fade" id="FestividadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-theme">
                <div class="col-md-12">
                <div class="row">
                    <div class="modal-title h3" id="tituloF"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="row" id="fechaF"></div>
                </div>
                </div>
                <div class="modal-body text-justify">
                    <img src="images/a4.jpg" class="img-fluid" id="imgF" width="500px"/>
                    <div class="py-2">
                    <span class="badge bg-theme text-white" style="font-size:17px;">Información</span>
                    <p class="text-justify" id="descripcionF">        
                    </p>
                    <div class="mt-2 text-right">
                    <span class="text-dark"><strong> Estado debido a la Pandemia: </strong></span><span class="badge bg-theme text-white text-uppercase" style="font-size:17px;" id="status"></span>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //modal festividad -->
             <!-- modal reporte covid -->
             <div class="modal fade" id="modalReporteCovid" tabindex="-1" role="dialog" aria-labelledby="modalReporteCovid"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                <div class="col-md-12">
                <div class="row">
                    <!--<div class="modal-title h3" id="tituloF"></div>-->
                    <span class="text-white text-center">Indice de Alerta Temprana  </span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <!--<div class="row" id="fechaF"></div>-->
                    <span class="text-white text-center">REPORTE 22 (del 18/04/21 al 24/04/21) Semana Epidemiológica 16</span>
                </div>
                </div>
                <div class="modal-body text-justify">
                    <img src="images/covid.jpg" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //modal reporte covid -->
    <!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- script for password match -->
    <script>
        window.onload = function () {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
            }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script>
    <!-- script for password match -->
    <!-- Banner  Responsiveslides -->
    <script src="js/responsiveslides.min.js"></script>
    <script src="js/funciones.js"></script>
    <script>
        // You can also use"$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider3").responsiveSlides({
                auto: true,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
    <!-- //Banner  Responsiveslides -->
    <!-- portfolio -->
    <script src="js/jquery.picEyes.js"></script>
    <script>
        $(function () {
            //picturesEyes($('.demo li'));
            $('.demo li').picEyes();
        });
    </script>
    <!-- //portfolio -->
    <!-- start-smooth-scrolling -->
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function () {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
            };
            */
            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>

    <script src="js/SmoothScroll.min.js"></script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- color switch -->
    <script src="js/blast.min.js"></script>
    <!-- //color switch -->
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
<?php include('includes/modalIndex.php');?>
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/registro.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/ingresar.php');?>			
<!-- //signin -->

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
</body>

</html>