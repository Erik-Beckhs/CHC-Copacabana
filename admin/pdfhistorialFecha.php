<?php
include('includes/config.php');
session_start();
error_reporting(0);

if(strlen($_SESSION['alogin'])==0)
{
	header("Location:index.php");
}
else {

$sesion=$_SESSION['alogin'];

$sql="select nombrecom from usuario u where email=?";
$query = $dbh->prepare($sql);
$query->execute([$sesion]);
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
	$ida=htmlentities($result->id);
	$name=htmlentities($result->nombrecom);
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
{
	border: 0;
	box-sizing: content-box;
	color: inherit;
	font-family: inherit;
	font-size: 20px;
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

table { font-size: 100%; table-layout: fixed; width: 100%; }
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
header address { float: left; font-size: 100%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0; }
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

table.inventory { clear: both; width: 100%; margin:auto;}
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
	font-size: .16rem;
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
.cabecera{
	color:white;
}
    </style>
</head>
<body>
	<div>
	
	<div class="cabecera" style="background-color:black">
		<h1>HISTORIAL</h1>
	</div>
	<h5>CAMARA HOTELERA DE COPACABANA</h5>
	<h6>Resolución Prefectural No 207</h6>

	<h6>Fecha y Hora: <?php echo date("j/n/Y  G:i"); ?></h6>
	<h6>Usuario: <?= $name; ?></h6>
    
	<table class="inventory">
						<thead>
						  <tr>
						  <th>#</th>
							<th >Usuario</th>
							<th>Tipo</th>
							<th>Ingreso a Sistema</th>
							<th>Salida de Sistema</th>
						  </tr>
						</thead>
						<tbody>

<?php 

$sql = "select * from historial where ingreso like '%$fecha%'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
	$cnt=1;
	foreach($results as $result)
	{
		$id=htmlentities($result->idhistorial);
		$idusuario=htmlentities($result->idusuario);
		$tipo=htmlentities($result->tipo);
		$ingreso=htmlentities($result->ingreso);
		$salida=htmlentities($result->salida);

		$sql2="select * from usuario where id=$idusuario";
		$query2=$dbh->prepare($sql2);
		$query2->execute();
		$results2=$query2->fetchAll(PDO::FETCH_OBJ);
		foreach($results2 as $result2){
			$nombrecom=htmlentities($result2->nombrecom);
		}

		$sql3="select * from tipous where idt=$tipo";
		$query3=$dbh->prepare($sql3);
		$query3->execute();
		$results3=$query3->fetchAll(PDO::FETCH_OBJ);
		foreach($results3 as $result3)
		{
			$t=htmlentities($result3->tipous);
		}
		
		?>	
	
						  <tr>
							<td><?php echo $cnt;?></td>
							<td><?php echo $nombrecom;?></td>
							<td><?php echo $t;?></td>
							<td><?php echo $ingreso;?></td>
							<td><?php echo $salida;?></td>
							
						  </tr>
						 <?php $cnt=$cnt+1;
						} }?>
						</tbody>
					  </table>
					  </div>					  
</body>
<?php } ?>
</html>