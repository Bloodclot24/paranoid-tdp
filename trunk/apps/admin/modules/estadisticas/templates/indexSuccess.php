<?php

	/*** mysql hostname ***/
	$hostname = '10.200.200.95';

	/*** mysql username ***/
	$username = 'root';

	/*** mysql password ***/
	$password = 'my123';
	
	try {
	    $dbh = new PDO("mysql:host=$hostname;dbname=asteriskcdrdb", $username, $password);
	    /*** echo a message saying we have connected ***/
	    $sql = "SELECT datos.fecha, SUM(datos.cantidad) FROM (SELECT CONCAT(SUBSTRING(asteriskcdrdb.cdr.calldate, 1, 15), '0:00') AS fecha, COUNT(*) AS cantidad FROM asteriskcdrdb.cdr GROUP BY 1 UNION SELECT datefield AS fecha, 0 AS cantidad FROM asteriskcdrdb.calendar ) AS datos WHERE datos.fecha < NOW() GROUP BY 1";

	    foreach ($dbh->query($sql) as $row)
		{
	    	$datos[] = $row[1];
		}
	
    	  //  echo join($datos, ', ');
	    /*** close the database connection ***/
	    $dbh = null;
	    }
	catch(PDOException $e)
	    {
	    echo $e->getMessage();
	    }
	?>
<script type="text/javascript">

	//Main graphic begin
	var mainGraphicChart;
	$(document).ready(function() {
		mainGraphicChart = new Highcharts.Chart({
			chart: {
				renderTo: 'mainGraphic',
				zoomType: 'x',
				spacingRight: 20
			},
			title: {
				text: 'Llamadas por intervalo de tiempo'
			},
			subtitle: {
				text: document.ontouchstart === undefined ?
					'Clickear y arrastrar en el grafico para hacer zoom in' :
					'Arrastrar el dedo para zoom in'
			},
			xAxis: {
				type: 'datetime',
				maxZoom:   3600000, 
				title: {
					text: null
				}
			},
			yAxis: {
				title: {
					text: 'Llamadas'
				},
				min: 0.6,
				startOnTick: false,
				showFirstLabel: false
			},
			tooltip: {
				shared: true
			},
			legend: {
				enabled: false
			},
			plotOptions: {
				area: {
					
					lineWidth: 1,
					marker: {
						enabled: false,
						states: {
							hover: {
								enabled: true,
								radius: 3
							}
						}
					},
					shadow: false,
					states: {
						hover: {
							lineWidth: 2
						}
					}
				}
			},
			credits: {
			    enabled: false
			},
			series: [{
			 type: 'area',
			 name: 'Llamadas cada 10 minutos',
			 pointInterval: 600 * 1000,
		       	 pointStart: Date.UTC(2012, 01, 08),
			 data: [<?php echo join($datos, ', ');?>]
      			}]
		
		});

	});
	//Main graphic end

	//Llamadas graphic begin
	var llamadasGraphicChart;
	$(document).ready(function() {
	   llamadasGraphicChart = new Highcharts.Chart({
	      chart: {
	         renderTo: 'llamadasGraphic',
	         plotBackgroundColor: null,
	         plotBorderWidth: null,
	         plotShadow: false
	      },
	      credits: {
		    enabled: false
		  },
	      title: {
	         text: 'Estado de llamadas'
	      },
	      tooltip: {
	         formatter: function() {
	            return '<b>'+ this.point.name +'</b>: '+ this.percentage.toFixed(2) +' %';
	         }
	      },
	      plotOptions: {
	         pie: {
	            allowPointSelect: true,
	            cursor: 'pointer',
	            dataLabels: {
	               enabled: true,
	               color:  '#000000',
	               connectorColor: '#000000',
	               formatter: function() {
	                  return '<b>'+ this.point.name +'</b>: '+ this.percentage.toFixed(1) +' %';
	               }
	            }
	         }
	      },
	       series: [{
	         type: 'pie',
	         name: 'Porcentaje de llamadas',
	         data: [
	            ['OK',   <?php echo $estadisticas[0]->getOk(); ?>],
	            ['Fallidas',    <?php echo $estadisticas[0]->getFallidas(); ?>],
	            ['Sospechosas',   <?php echo $estadisticas[0]->getSospechosas(); ?>]
	         ]
	      }]
	   });
	
	});
	//Llamadas graphic end

</script>
<style>
	.titulo { font-size: 18px; }
	.indicador { font-size: 35px; color:#6699FF }
</style>
<div>
	<div id="mainGraphic" style="width: 800px; height: 400px; margin: 10 auto">	</div>
	<div id="llamadasGraphic" style="width: 500px; height: 400px; margin: 10 auto;margin-left:30px;float:left"> </div>
	<div id="indicadores" style="width: 300px; height: 400px; margin: 10 auto;margin-left:20px;float:left">
		<table>
        <?php foreach ($estadisticas as $estadistica) { ?>
		<tr>
			<td class="titulo">Usuarios</td>
		</tr><tr>
			<td class="indicador"><?php echo $estadistica->getUsuarios() ?></td>
		</tr>

		<tr>
			<td class="titulo">Llamadas totales</td>
		</tr><tr>
			<td class="indicador"><?php echo $estadistica->getTotales() ?></td>
		</tr>
		<tr>
			<td class="titulo">Llamadas ok</td>
		</tr><tr>
			<td class="indicador"><?php echo $estadistica->getOk() ?></td>
		</tr>
		<tr>
			<td class="titulo">Llamadas fallidas</td>
		</tr><tr>
			<td class="indicador"><?php echo $estadistica->getFallidas() ?></td>
		</tr>
		<tr>
			<td class="titulo">Llamadas sospechosas</td>
		</tr><tr>
			<td class="indicador"><?php echo $estadistica->getSospechosas() ?></td>
		</tr>
        <?php } ?>
	
	</table>
	</div>
</div>

