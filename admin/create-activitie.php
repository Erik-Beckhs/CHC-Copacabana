<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin'])==0)
{	
header('location:index.php'); 
}
else{
if(isset($_POST['submit']))
{
$aname=$_POST['activitiename'];
$adetail=$_POST['detail'];	
$aplace=$_POST['place'];
$adate=$_POST['date'];	
$adateend=$_POST['dateend'];
$idadmin=$_POST['idadmin'];

$sql = "SELECT * from admin WHERE usuario= ?";
$query = $dbh -> prepare($sql);
$query->execute([$idadmin]);
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() == 1)
{
foreach($results as $result)
{				
$id=htmlentities($result->id);
}
}

$aimage=$_FILES["activitieimage"]["name"];
move_uploaded_file($_FILES["activitieimage"]["tmp_name"],"activitieimages/".$_FILES["activitieimage"]["name"]);
$sql="INSERT INTO actividad (nombre,detalle,lugar,fechaini,fechafin,idadmin,img) VALUES(:aname,:adetail,:aplace,:adate,:adateend, :idusu, :aimage)";
$query = $dbh->prepare($sql);
$query->bindParam(':aname',$aname,PDO::PARAM_STR);
$query->bindParam(':adetail',$adetail,PDO::PARAM_STR);
$query->bindParam(':aplace',$aplace,PDO::PARAM_STR);
$query->bindParam(':adate',$adate,PDO::PARAM_STR);
$query->bindParam(':adateend',$adateend,PDO::PARAM_STR);
$query->bindParam(':idusu',$id,PDO::PARAM_INT);
$query->bindParam(':aimage',$aimage,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg=" Registro de Actividad exitoso";
}
else 
{
$error="Algo salió mal. intentalo de nuevo";
}

}

	?>
<!DOCTYPE HTML>
<html>
<head>
<title>CHC | Gestión de Actividades</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
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
                <li class="breadcrumb-item"><a href="index.html">Inicio</a><i class="fa fa-angle-right"></i>Gestión </li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 
<!---->
  <div class="grid-form1">
  	       <h3>Registrar Actividad</h3>
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>INFORMACIÓN</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="actividad" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Nombre</label>
									<div class="col-sm-6">
										<input type="text" class="form-control1" name="activitiename" id="packagename" placeholder="Nombre de la Actividad" required>
									</div>
								</div>
<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Detalle</label>
									<div class="col-sm-6">
										<input type="text" class="form-control1" name="detail" id="packagetype" placeholder="Mas información" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Lugar</label>
									<div class="col-sm-6">
										<input type="text" class="form-control1" name="place" id="packagelocation" placeholder="Lugar en donde se llevara la actividad, de ser virtual indicar la plataforma streaming" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Fecha de Inicio</label>
									<div class="col-sm-6">
										<input type="date" class="form-control1" name="date" id="packageprice"  required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Fecha de Finalización</label>
									<div class="col-sm-6">
										<input type="date" class="form-control1" name="dateend" id="packagefeatures" required>
									</div>
								</div>		
														
<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Imagen</label>
									<div class="col-sm-6">
										<input type="file" name="activitieimage" id="image" required>
									</div>
								</div>	
								<input type="hidden" value="<?php echo $_SESSION['alogin'];?>" name="idadmin">
								<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" name="submit" class="btn-primary btn">Crear</button>

				<button type="reset" class="btn-inverse btn">Reestablecer</button>
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