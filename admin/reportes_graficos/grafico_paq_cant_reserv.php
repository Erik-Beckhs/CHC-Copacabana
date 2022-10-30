<?php

?>
<!DOCTYPE HTML>
<html>
	<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Highcharts Example</title>

		<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		-->
        <style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Cantidad de Reservas por Paquete'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
<?php
$sql="select p.nombre, count(r.idpaq) cantidad
from paquete p left join reserva r
on r.idpaq=p.idpaq
group by p.nombre
order by cantidad desc";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$array=$results;
if($query->rowCount()>0)
{
    foreach($results as $result)
    {    
        $nombre=utf8_decode(htmlentities($result->nombre));
?>   
            ['<?= $nombre;?>'],
<?php
}
} 
?>
            ],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Reservas (unidades)',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' unidades'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Cantidad de Reservas',
            data: [
<?php
$sql="select p.nombre, count(r.idpaq) cantidad
from paquete p left join reserva r
on r.idpaq=p.idpaq
group by p.nombre
order by cantidad desc";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$array=$results;
if($query->rowCount()>0)
{
    foreach($results as $result)
    {    
?>  
                [<?= htmlentities($result->cantidad);?>],
<?php
}}
?>
            ]       
        }]
    
    });
});
		</script>
	</head>
	<body>
<script src="reportes_graficos/Highcharts-4.1.5/js/highcharts.js"></script>
<script src="reportes_graficos/Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
