<?php if($_SESSION['login'])
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