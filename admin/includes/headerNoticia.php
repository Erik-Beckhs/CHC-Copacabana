<?php
if(!isset($sw))
{
	$sw=0;
}
$email=$_SESSION['alogin'];
$sql="select u.id id, i.nombre nombrei, u.idtipou tipou, i.idinst idinst from usuario u, institucion i  where i.idencargado=u.id and u.email = '$email'";
$query=$dbh->prepare($sql);
$query->execute();
$results=$query->fetch(PDO::FETCH_OBJ);
if($query->rowCount()>0){
	$idU=htmlentities($results->id);
	$nombreI=htmlentities($results->nombrei);
	$tipoU=htmlentities($results->tipou);
	$idinst=htmlentities($results->idinst);
	$_SESSION['nombreI']=$nombreI;
}
//$cant=$query->rowCount();
$title='Copacabana Turística';
if(isset($tipoU)){
	if($tipoU == 2){
		$title=$nombreI;
		$_SESSION['inst']=$idinst;
	}
}

?>
<div class="header-main">
					<div class="logo-w3-agile">
								<h1><span class="text-uppercase text-white">
								<?= $title;?></span></h1>
							</div>
				
						<div class="profile_details w3l">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="<?php echo $sw==1?'../../images/user-icon.png':'images/User-icon.png'?>" alt=""> </span> 
												<div class="user-name">
													<p>Bienvenido</p>
													<span style="font-size:12px;"><?= $_SESSION['alogin'];?></span>
												</div>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="<?php echo $sw==1?'../../change-password.php':'change-password.php'?>"><i class="fa fa-user"></i> Perfil</a> </li> 
											<li> <a href="<?php echo $sw==1?'../../logout.php':'logout.php'?>"><i class="fa fa-sign-out"></i> Cerrar Sesión</a> </li>
										</ul>
									</li>
								</ul>
						</div>
							
				     <div class="clearfix"> </div>	
				</div>