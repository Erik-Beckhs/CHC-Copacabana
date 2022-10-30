
<?php
//include('../includes/config.php');
$sql="select count(*) cantidad from usuario where idtipou = 1";
$query=$dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount()>0)
{
    foreach($results as $result)
    {
        $administrador=htmlentities($result->cantidad);
    }
}
$sql="select count(*) cantidad from usuario where idtipou=2";
$query=$dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount()>0)
{
    foreach($results as $result)
    {
        $encargado=htmlentities($result->cantidad);
    }
}
$sql="select count(*) cantidad from usuario where idtipou=3";
$query=$dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount()>0)
{
    foreach($results as $result)
    {
        $cliente=htmlentities($result->cantidad);
    }
}
$sql="select count(*) cantidad from usuario where idtipou=4";
$query=$dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount()>0)
{
    foreach($results as $result)
    {
        $superAdmin=htmlentities($result->cantidad);
    }
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Gráfico Usuarios</title>

		<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
-->
        <style type="text/css">
${demo.css}
        </style>

		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Usuarios del sistema'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Porcentaje',
            data: [
            [
                'Administradores', <?= $administrador;?>
            ],
            [
                'Encargados', <?= $encargado;?>
            ],
            [
                'Clientes', <?= $cliente;?>
            ],
            [
                'Super Admin', <?= $superAdmin;?>
            ]
            ]
        }]
    });
});

		</script>
	</head>
	<body>
<script src="reportes_graficos/Highcharts-4.1.5/js/highcharts.js"></script>
<script src="reportes_graficos/Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

	</body>
</html>
