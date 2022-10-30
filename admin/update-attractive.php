<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
$aid=intval($_GET['aid']);	
if(isset($_POST['submit']))
{
$aname=$_POST['attractivename'];
$alocation=$_POST['location'];	
$adifficulty=$_POST['difficulty'];
$adescription=$_POST['description'];	
$aseason=$_POST['season'];
$aarrive=$_POST['arrive'];	
$acategory=$_POST['category'];
$astatus=$_POST['status'];
$aimage=$_FILES["attractiveimage"]["name"];

$sql="update atractivo set nombre=:aname,ubicacion=:alocation,dificultad=:adifficulty,descripcion=:adescription,temporadaideal=:aseason,llegada=:aarrive, idcat=:acategory, activo=:astatus where ID=:aid";
$query = $dbh->prepare($sql);
$query->bindParam(':aname',$aname,PDO::PARAM_STR);
$query->bindParam(':alocation',$alocation,PDO::PARAM_STR);
$query->bindParam(':adifficulty',$adifficulty,PDO::PARAM_STR);
$query->bindParam(':adescription',$adescription,PDO::PARAM_STR);
$query->bindParam(':aseason',$aseason,PDO::PARAM_STR);
$query->bindParam(':aarrive',$aarrive,PDO::PARAM_STR);
$query->bindParam(':acategory',$acategory,PDO::PARAM_INT);
$query->bindParam(':astatus',$astatus,PDO::PARAM_BOOL);
$query->bindParam(':aid',$aid,PDO::PARAM_INT);
$query->execute();
$msg="Atractivo actualizado exitosamente";
}

	?>
<!DOCTYPE HTML>
<html>
<head>
<title>CHC | Admin Gestión de Atractivos</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="css/fontawesome/css/brands.css" rel="stylesheet">
  <link href="css/fontawesome/css/solid.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
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
		</style>

</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
              <!--header start here-->
<?php include('includes/header.php');?>
							
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
	<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a><i class="fa fa-angle-right"></i>Actualizar atractivo </li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 
<!---->
  <div class="grid-form1">
  	       <h3>Actualizar</h3>
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>INFORMACIÓN</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						
<?php 
$aid=intval($_GET['aid']);
$sql = "SELECT * from atractivo where ID=:aid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':aid', $aid, PDO::PARAM_INT);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

							<form class="form-horizontal" name="attractive" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Nombre</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="attractivename" id="attractivename" placeholder="Crear Atractivo" value="<?php echo htmlentities($result->nombre);?>" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Ubicación</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="location" id="location" placeholder="Distancia y referencias" value="<?php echo htmlentities($result->ubicacion);?>" required>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Dificultad</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="difficulty" id="difficulty" placeholder="Dificultad Ej. Baja, Moderada, Alta" value="<?php echo htmlentities($result->dificultad);?>"required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Descripción</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="description" id="description" placeholder="Informacion del atractivo" value="<?php echo htmlentities($result->descripcion);?>" required>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Temporada Ideal</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="season" id="season" placeholder="Temporada ideal de visita al lugar" value="<?php echo htmlentities($result->temporadaideal);?>" required>
									</div>
								</div>		
				<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Como llegar</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="arrive" id="arrive" placeholder="descripcion de como llegar al atractivo" value="<?php echo htmlentities($result->llegada);?>" required>
									</div>
						</div>	
						<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Categoría</label>
									<div class="col-sm-8">
									<select name="category" class="form-control">
									<option value="<?php echo htmlentities($result->idcat);?>" required>
<?php 
$cid=intval(htmlentities($result->idcat));
$sqll = "SELECT * from categoria where idcat=:cid";
$query = $dbh -> prepare($sqll);
$query -> bindParam(':cid', $cid, PDO::PARAM_INT);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $resultt)
{	
	echo htmlentities($resultt->nombrecat);
}
}
?>
								</option>
									<?php
									$sql1 = "SELECT * from categoria";
									$query = $dbh->prepare($sql1);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									foreach($results as $result1)
									{
										if(htmlentities($result1->idcat) != htmlentities($result->idcat))
										{
									?>
									<option value="<?php echo htmlentities($result1->idcat);?>"><?php echo htmlentities($result1->nombrecat);?></option>
								<?php
							}}
							?>
							</select>
									</div>
						</div>
						<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Activo</label>
									<div class="col-sm-8">
									<select name="status" class="form-control">
									<option value="<?php
										echo htmlentities($result->activo);
									?>">
									<?php
									$valor=htmlentities($result->activo);
									if($valor)
									{
										echo "SI";
									}
									else{
										echo "NO";
									}
									?>
									</option>
									<?php 
									if(!$valor)
									{ ?>
										<option value="1">SI</option>
									<?php
									}
									else{
										?>
										<option value="0">NO</option>
									<?php
										}
										?>
									</select>
									</div>
						</div>															
<div class="form-group">
<label for="focusedinput" class="col-sm-2 control-label">Imagen</label>
<div class="col-sm-8">
<img src="attractiveimages/<?php echo htmlentities($result->img);?>" width="200">&nbsp;&nbsp;&nbsp;<a href="change-image.php?imgid=<?php echo htmlentities($result->ID);?>">Cambiar Imagen</a>
</div>
</div>		
								<?php }} else {
								
								echo "<h4> No se encontró ningun registro</h4>";
							}
									?>

								<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" name="submit" class="btn-primary btn">Modificar</button>
			</div>
		</div>
						
					
						
						
						
					</div>
					
					</form>

     
      

      
      <div class="panel-footer">
		
	 </div>
    </form>
  </div>
 	</div>
 	<!--//grid-->

<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include('includes/footer.php');?>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
		<!--/sidebar-menu-->
					<?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>
<?php } ?>