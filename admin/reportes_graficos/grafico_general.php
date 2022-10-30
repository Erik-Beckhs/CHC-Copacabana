
<?php
//include('../includes/config.php');
$sql="select * from atractivo";
$query=$dbh->prepare($sql);
$query->execute();
$atractivo=$query->rowCount();

$sql="select * from usuario";
$query=$dbh->prepare($sql);
$query->execute();
$usuario=$query->rowCount();

$sql="select * from reserva";
$query=$dbh->prepare($sql);
$query->execute();
$reserva=$query->rowCount();

$sql="select * from paquete";
$query=$dbh->prepare($sql);
$query->execute();
$paquete=$query->rowCount(); 

$sql="select * from institucion";
$query=$dbh->prepare($sql);
$query->execute();
$institucion=$query->rowCount();

$sql="select * from experiencia";
$query=$dbh->prepare($sql);
$query->execute();
$experiencia=$query->rowCount();
 
$sql="select * from festividad";
$query=$dbh->prepare($sql);
$query->execute();
$festividad=$query->rowCount();

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
--> 
<!--permite jquery inferior a 1.9 y ello hace que no se muestra la lista desplegable del header para el usuario-->
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
            text: 'Registros en el sistema'
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
                'Atractivos', <?= $atractivo;?>
            ],
            [
                'Usuarios', <?= $usuario;?>
            ],
            [
                'Reservas', <?= $reserva;?>
            ],
            [
                'Paquetes', <?= $paquete;?>
            ],
            [
                'Instituciones', <?= $institucion;?>
            ],
            [
                'Reseñas', <?= $experiencia;?>
            ],
            [
                'Festividades', <?= $festividad;?>
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
