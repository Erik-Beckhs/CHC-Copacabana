<?php 

if(isset($_SESSION['login']))
{?>
<div class="top-header" data-blast="bgColor">
	<div class="container">
		<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
			<li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
			<li class="prnt"><a href="profile.php">Mi Perfil</a></li>
			
			<li class="prnt"><a href="mis_reservas.php">Mis reservas</a></li>
			<!--<li class="prnt"><a href="issuetickets.php">Issue Tickets</a></li>-->
		</ul>
		<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s"> 
			<li class="tol">Bienvenido :</li>				
			<li class="sig"><?php echo htmlentities($_SESSION['login']);?></li> 
			<li class="sig"><a href="logout.php" >/ Salir</a></li>
        </ul>
		<div class="clearfix"></div>
	</div>
</div><?php } else {?>
<div class="top-header" data-blast="bgColor">
	<div class="container">
		<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
			<li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
				<li class="hm"><a href="admin/index.php">Admin Login</a></li>
		</ul>
		<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s"> 
			<li class="tol">chcopacabana@gmail.com</li>				
			<li class="sig"><a href="#" data-toggle="modal" data-target="#myModal">Registrarse</a></li> 
			<li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4" >/ Ingresar</a></li>
        </ul>
		<div class="clearfix"></div>
	</div>
</div>
<?php }?>
    <!-- header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
                <h2>
                    <a class="navbar-brand text-white" href="index.php">
                        Copacabana
                    </a>
                </h2>
                <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-lg-auto text-center" style="font-size:16px;">
                        <li class="nav-item active  mr-lg-3 mt-lg-0 mt-sm-3">
                            <a class="nav-link" href="index.php" data-blast="color">Inicio
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item  mr-lg-3 mt-lg-0 mt-3">
                            <a class="nav-link scroll" href="#atractivos">Atractivos Turísticos</a>
                        </li>
                        <li class="nav-item  mt-lg-0 mt-3">
                            <a class="nav-link scroll" href="#paquetes">Paquetes</a>
                        </li>
                        <li class="nav-item  mt-lg-0 mt-3">
                            <a class="nav-link" href="hoteles-list.php">Hoteles</a>
                        </li>
                        
                        <li class="nav-item  mt-lg-0 mt-3">
                            <a class="nav-link scroll" href="#actividades">Festividades</a>
                        </li>
                        <li class="nav-item  mt-lg-0 mt-3">
                            <a class="nav-link scroll" href="#galeria">Galeria</a>
                        </li>
                        <li class="nav-item dropdown mr-lg-3 mt-lg-0 mt-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Nosotros
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="chc.php">Cámara Hotelera</a>
                                <a class="dropdown-item scroll" href="#contact">Contacto</a>
                            </div>
                        </li>
                    </ul>
                </div>

            </nav>
            
        <!--header-->