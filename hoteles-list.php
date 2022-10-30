<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(!isset($_GET['pagina']))
{
  if(isset($_GET['ord']))
  {
    header("location:hoteles-list.php?pagina=1&ord=".$_GET['ord']);
  }
  else{
    header("location:hoteles-list.php?pagina=1&ord=1");
  } 
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Camara Hotelera de Copacabana</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/modern-business.css" rel="stylesheet">

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
<style>
  .card-body{
    height:100%;
  }
  .list{
    font-size: 12px;
    padding-left:10px;
  }
  .italic{
    font-style: italic;
  }
  .valoracion{
    position:absolute;
    font-size:1em;
    top:5px;
    right:5px;
    width:60px;
    height:40px;
    background-color:orange;
    z-index:10;
    border-radius:5px;
  }
  img{
    width:100%;
    position:relative;
  }

</style>

<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
</head>
<body>
 <!-- Navigation -->
 <?php include('includes/header2.php');?>

<!-- Page Content -->
<div class="container">

  <div class="row" style="margin-top: 4%">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <!-- Blog Post -->
      
<?php 
    $no_registros_pagina = 5;

    $total_p="select * from institucion i, hotel h where i.idinst=h.idinst and i.bioseguridad=1";
    $result=$dbh->prepare($total_p);
    $result->execute();
    $total=$result->rowCount();
    $total_paginas = ceil($total / $no_registros_pagina);

    $iniciar=($_GET['pagina']-1)*$no_registros_pagina;

$sql2="select * from institucion i, hotel h where i.idinst=h.idinst and i.bioseguridad=1 order by i.idinst desc limit $iniciar, $no_registros_pagina";
if(isset($_GET['ord']))
{
    $ord=$_GET['ord'];
    if($ord==1)
    {
      $sql2="select tmp2.idinst idinst, tmp2.nombre nombre, h.tarifa tarifa, tmp2.telefono telefono, tmp2.direccion direccion, tmp2.imgInst imgInst, tmp2.bioseguridad bioseguridad, tmp2.val val, h.idcat idcat
      from hotel h, (select i.idinst, i.nombre, i.telefono, i.direccion, i.imgInst, i.bioseguridad, tmp.val from institucion i left join (select idinst, avg(valoracion) val from calificai group by idinst) tmp on i.idinst=tmp.idinst
      order by tmp.val) tmp2
      where h.idinst=tmp2.idinst and tmp2.bioseguridad=1 order by tmp2.val desc limit $iniciar, $no_registros_pagina";
    }
    elseif ($ord==2)
    {
      $sql2="select i.idinst idinst, i.nombre nombre, h.tarifa tarifa, i.telefono telefono, i.direccion direccion, i.imgInst imgInst, i.bioseguridad bioseguridad, h.idcat idcat from institucion i, hotel h where i.idinst=h.idinst and i.bioseguridad=1 order by h.idcat desc limit $iniciar, $no_registros_pagina";
    }
    elseif($ord==3)
    {
      $sql2="select i.idinst idinst, i.nombre nombre, h.tarifa tarifa, i.telefono telefono, i.direccion direccion, i.imgInst imgInst, i.bioseguridad bioseguridad, h.idcat idcat from institucion i, hotel h where i.idinst=h.idinst and i.bioseguridad=1 order by h.tarifa desc limit $iniciar, $no_registros_pagina";
    }
}    
$query=$dbh->prepare($sql2);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{	
$inst=htmlentities($result->idinst);
$sqlv="select idinst, avg(valoracion) val from calificai where idinst='$inst' group by idinst";
$queryv=$dbh->prepare($sqlv);
$queryv->execute();
$r=$queryv->fetchAll(PDO::FETCH_OBJ);
if($queryv->rowCount()>0)
{
  foreach($r as $re)
  {
    $val=htmlentities($re->val);
  }
}
else{
  $val=0;
}
?>
      <div class="card mb-3" style="max-width: 750px;">
        <div class="row no-gutters">
          <div class="col-md-4">
          <h4><span class="valoracion text-right text-white pr-2 py-1" style="width:75px;">
              <?= number_format($val,2);?>
          </span></h4>
            <img src="admin/instimages/<?php echo htmlentities($result->imgInst);?>" alt="<?php echo htmlentities($result->nombre);?>" class="card-img" width="500" height="250">

          </div>
          <div class="col-md-4">
            <div class="card-body">
           <div class = "badge badge-success text-wrap" style="width: 13rem">

           <a href="hotel-details.php?hid=<?php echo htmlentities($result->idinst)?>"><span class="card-title text-white h6"><i class="fas fa-h-square"></i><?php echo " ".htmlentities($result->nombre);?></span>
</a>
            </div>

            <p class="text-warning text-center">
            <?php
              $star=htmlentities($result->idcat);
              $starwhite=5-$star;
              for($i=0; $i<$star; $i++)
              {
                ?>
                  <i class="fas fa-star"></i>
                <?php
              }
              for($j=0; $j<$starwhite; $j++)
              {

            ?>
            <i class="fa fa-star text-white"></i>
            <?php
            }
            ?>
            </p>


            <p class="text-info text-center"><span class="h6 text-dark"> Desde:</span><b><span class="h5"><?php echo htmlentities($result->tarifa);?></b></span><span class="h6 text-dark"> Bs</span></p>

              <p class="text-center text-dark h6">Telefono(s): <span class="text-info"> <?php echo htmlentities($result->telefono);?></span></p>
              <div class="py-4 text-center">
              <a href="hotel-details.php?hid=<?php echo htmlentities($result->idinst)?>" class="btn btn-primary"> Ver Más  &rarr;</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-body">
            
              <h6 class="card-title badge badge-info text-wrap" style="width: 13rem;"><p class="text-white text-center"><i class="fa fa-utensils"></i> Servicios:</p></h6>
              
              <p class="card-text">
              <ul>
              <?php 
               $sql="select * from instserv ise, servicio s where ise.idservicio=s.idserv and ise.idinst=? limit 8";
               $query=$dbh->prepare($sql);
                $query->execute([$inst]);
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                if($query->rowCount() > 0)
                {
                foreach($results as $result2)
                {	
              ?><div class="display"></div><li class="text-capitalize list"><i class="fa fa-check fa-sm"></i>
              <?= htmlentities($result2->detalle);?></li>
              <?php
              }}
              ?>
              </ul>
              </p>
              
            </div>
          </div>
        </div>
        <div class="card-footer text-muted italic bg-info">
          <span class="text-white"> Dirección: <?php echo htmlentities($result->direccion);?></span>
        </div>
      </div>
<?php }} ?>
   
      <!-- Pagination -->
<nav aria-label="page navigation example">
<ul class="pagination ml-5 mb-3">
    <?php
      if(!isset($_GET['ord']))
      {
    ?>
      <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled':'' ?>"><a class="page-link" href="hoteles-list.php?pagina=<?= $_GET['pagina']-1;?>">Anterior</a></li>
      <?php for($i=0;$i<$total_paginas;$i++):?>
      <li class="page-item 
      <?php echo $_GET['pagina']==$i+1 ? 'active': '' ?> ">
      <a href="hoteles-list.php?pagina=<?= $i+1; ?>" class="page-link">
      <?= $i+1;?></a>
      </li>
      <?php endfor ?>
      <li class="page-item <?php echo $_GET['pagina']>=$total_paginas? 'disabled':'' ?>"><a href="hoteles-list.php?pagina=<?= $_GET['pagina']+1;?>" class="page-link">Siguiente</a></li>
    <?php    
      }
      else{
        ?>
          <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled':'' ?>"><a class="page-link" href="hoteles-list.php?pagina=<?= $_GET['pagina']-1;?>&ord=<?= $_GET['ord'];?>">Anterior</a></li>
          <?php for($i=0;$i<$total_paginas;$i++):?>
          <li class="page-item 
          <?php echo $_GET['pagina']==$i+1 ? 'active': '' ?> ">
          <a href="hoteles-list.php?pagina=<?= $i+1; ?>&ord=<?= $_GET['ord'];?>" class="page-link">
          <?= $i+1;?></a>
          </li>
          <?php endfor ?>
          <li class="page-item <?php echo $_GET['pagina']>=$total_paginas? 'disabled':'' ?>"><a href="hoteles-list.php?pagina=<?= $_GET['pagina']+1;?>&ord=<?= $_GET['ord'];?>" class="page-link">Siguiente</a></li>
        <?php
      }
    ?> 
</ul>
</nav>

    </div>

    <div class="fixed-bottom mb-4">
<div class="btn btn-danger mx-4 py-2">
	<h3 class="text-right"><a href="index.php" style="color:white;"><i class="fas fa-arrow-circle-left"></i> Volver</a></h3>
</div>	
</div>	

    <!-- Sidebar Widgets Column -->
  <?php include('includes/sidebarhotel.php');?>
  </div>
  <!-- /.row -->

</div>

<!-- /.container -->

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/registro.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/ingresar.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>			
<!-- //write us -->
</body>
</html>