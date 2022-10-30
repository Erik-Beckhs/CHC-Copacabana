<?php 
session_start();
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Comprobante</title>
		<link rel="stylesheet" href="style.css">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css'/>
		<link href="css/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="css/fontawesome/css/brands.css" rel="stylesheet">
  <link href="css/fontawesome/css/solid.css" rel="stylesheet">
		<script src="script.js"></script>
		<style>
		/* reset */

*
{
	border: 0;
	box-sizing: content-box;
	color: inherit;
	font-family: inherit;
	font-size: 13px;
	font-style: inherit;
	font-weight: inherit;
	line-height: inherit;
	list-style: none;
	margin: 0;
	padding: 0;
	text-decoration: none;
	vertical-align: top;
}

/* content editable */

*[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

*[contenteditable] { cursor: pointer; }

*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

span[contenteditable] { display: inline-block; }

/* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #CEE8F4; border-color: #BBB; }
td { border-color: #DDD; }

/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 3em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th { font-weight: bold; text-align: center; }

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: right; width: 12%; }
table.inventory td:nth-child(4) { text-align: right; width: 12%; }
table.inventory td:nth-child(5) { text-align: right; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }

/* javascript */

.add, .cut
{
	border-width: 1px;
	display: block;
	font-size: .8rem;
	padding: 0.25em 0.5em;	
	float: left;
	text-align: center;
	width: 0.6em;
}

.add, .cut
{
	background: #9AF;
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
	background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
	border-radius: 0.5em;
	border-color: #0076A3;
	color: #FFF;
	cursor: pointer;
	font-weight: bold;
	text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
}

.add { margin: -2.5em 0 0; }

.add:hover { background: #00ADEE; }

.cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
.cut { -webkit-transition: opacity 100ms ease-in; }

tr:hover .cut { opacity: 1; }

@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
	.add, .cut { display: none; }
}

@page { margin: 0; }
		</style>
		
	</head>
	<body>
	
	<?php
	ob_start();	
	

	include ('includes/config.php');

	$rid = $_GET['rid'];

	$asql="select * from institucion where idinst = (select p.idagencia from paquete p, reserva r where r.idpaq=p.idpaq and r.idres=$rid)";
	$aquery=$dbh->prepare($asql);
	$aquery->execute();
	$age=$aquery->fetchAll(PDO::FETCH_OBJ);
	if($aquery->rowCount()>0)
	{
		foreach($age as $ages)
		{
			$nombrea=htmlentities($ages->nombre);
			$correoa=htmlentities($ages->correo);
			$direcciona=htmlentities($ages->direccion);
			$telefonoa=htmlentities($ages->telefono);
			$imagena=htmlentities($ages->imgInst);
		}
	}
	
	$sql ="select * from paquete p, usuario u, reserva r where r.idres = ? and r.idpaq=p.idpaq and r.idus=u.id";
	$query=$dbh->prepare($sql);
	$query->execute([$rid]);
	$results=$query->fetchAll(PDO::FETCH_OBJ);

	if($query->rowCount()>0)
	{
		foreach($results as $result)
		{
			$fechares=htmlentities($result->fechareserva);
			$nombreper=htmlentities($result->nombrecom);
			$telefonoper=htmlentities($result->telefono);
			$email=htmlentities($result->email);
			$nombrepaq=htmlentities($result->nombre);
			$idpaq=htmlentities($result->idpaq);
			$cantidad=htmlentities($result->cantper);
			$precio=htmlentities($result->precio);
			$fechasal=htmlentities($result->fechasol);
			$total=htmlentities($result->total);
			$item=1;

			$sqlpromo="select * from promocion where idpaquete=$idpaq";
			$querypromo=$dbh->prepare($sqlpromo);
			$querypromo->execute();
			$resultspromo=$querypromo->fetch(PDO::FETCH_OBJ);

			if($querypromo->rowCount() == 1)
			{
				$precio=htmlentities($resultspromo->preciopromo);
			}
		}
	}
	
	?>
		<header>
			<h1>Comprobante</h1>
			<address >
				<p class="bg-primary text-white text-center"><b> <?= $nombrea; ?> </b></p>
				<p class="text-center"><?= $correoa; ?><br></p>
				<h5 class="text-dark"><i class="fas fa-map-marker-alt"></i> <?= $direcciona; ?></h5>
				<h5 class="text-center"><i class="fas fa-phone-alt"></i> <?= $telefonoa; ?></h5>
			</address>
			<span><img alt="" src="admin/instimages/<?= $imagena; ?>" style="width:200px; height:100px;"></span>
		</header>

		<article>
			<h1>Recipiente</h1>
			<div>
				<strong><h2 class="text-capitalize text-weight" style="font-size:20px;"><?php echo $nombreper; ?></h2></strong>
			</div>
<br>
			
			<h5 class="text-left"><?php echo $email; ?></h5>
			
			<table class="meta">
				<tr>
					<th><span >Nro. Reserva</span></th>
					<td><span ><?php echo $rid; ?></span></td>
				</tr>
				<tr>
					<th><span >Fecha de Reserva</span></th>
					<td><span ><?php echo $fechares; ?> </span></td>
				</tr>
				<tr>
					<th><span >Fecha de Salida</span></th>
					<td><span ><?php echo $fechasal; ?> </span></td>
				</tr>
				
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span >Item</span></th>
						<th><span >Nombre del Paquete</span></th>
						<th><span >Cantidad</span></th>
						<th><span >Precio U.</span></th>
						<th><span >Total</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><span ><?php echo $item; ?></span></td>
						<td><span ><?php echo $nombrepaq; ?> </span></td>
						<td><span ><?php echo $cantidad;?> </span></td>
						<td><span data-prefix>Bs.</span><span ><?php  echo $precio;?></span></td>
						<td><span data-prefix>Bs.</span><span><?php echo $total; ?></span></td>
					</tr>
				</tbody>
			</table>
		</article>
		<aside class="py-4">
			<h1><span >Importante</span></h1>
			<div >
				<p align="center">Debido a la alta demanda de nuestros paquetes, nuestro personal se comunicará con su persona hasta 48 horas antes del evento para la validación de la misma </p>

			<br>
			<p class="text-right">Gracias por confiar en nosotros</p>
			</div>
		</aside>

		<div class="fixed-top">
		<div class="badge badge-info text-right my-2 mx-4" style="width:6rem; background-color:#E82A56">
			<a href="<?= $_SESSION['login']?'index.php':'javascript:history.back()'?>"><h3 class="text-white px-2"><i class="fas fa-arrow-circle-left"></i>
				Volver
			</h3></a>
		</div>
		</div>
	</body>
</html>
<?php

ob_end_flush();

?>