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
				text: 'Llamadas por hora'
			},
			subtitle: {
				text: document.ontouchstart === undefined ?
					'Clickear y arrastrar en el grafico para hacer zoom in' :
					'Arrastrar el dedo para zoom in'
			},
			xAxis: {
				type: 'datetime',
				maxZoom:  5 * 24 * 3600000, // one day
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
					fillColor: {
						linearGradient: [0, 0, 0, 300],
						stops: [
							[0, Highcharts.getOptions().colors[0]],
							[1, 'rgba(2,0,0,0)']
						]
					},
					lineWidth: 1,
					marker: {
						enabled: false,
						states: {
							hover: {
								enabled: true,
								radius: 5
							}
						}
					},
					shadow: true,
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
				name: 'Llamadas',
				pointInterval: 24 * 3600 * 1000,
				pointStart: Date.UTC(2011, 8, 15),
				data: [
				3,
				1,
				136,
				325,
				137,
				18,
				7,
				12,
				7,
				3,
				2,
				7,
				14,
				206,
				487,
				585,
				642,
				506,
				363,
				408,
				458,
				344,
				72,
				18,
				14,
				7,
				7,
				3,
				2,
				3,
				2,
				1,
				3,
				2,
				5,
				12,
				2,
				1,
				1,
				1,
				1,
				8,
				6,
				3,
				5,
				2,
				1,
				2,
				1,
				2,
				2,
				2,
				2,
				1,
				1,
				3,
				7,
				3,
				3,
				4,
				37,
				232,
				399,
				596,
				584,
				602,
				327,
				542,
				496,
				433,
				106,
				30,
				9,
				7,
				10,
				6,
				6,
				1,
				3,
				25,
				209,
				531,
				692,
				830,
				571,
				402,
				603,
				635,
				370,
				79,
				41,
				17,
				7,
				2,
				2,
				2,
				2,
				1,
				28,
				260,
				538,
				660,
				767,
				537,
				462,
				509,
				525,
				354,
				55,
				35,
				9,
				5,
				3,
				1,
				2,
				1,
				1,
				1,
				16,
				195,
				467,
				490,
				557,
				159
				]
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
	            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
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
	                  return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
	               }
	            }
	         }
	      },
	       series: [{
	         type: 'pie',
	         name: 'Porcentaje de llamadas',
	         data: [
	            ['OK',   70.0],
	            ['Fallidas',    22.5],
	            ['Sospechosas',   7.5]
	         ]
	      }]
	   });
	
	});
	//Llamadas graphic end

</script>

<div>
	<div id="mainGraphic" style="width: 800px; height: 400px; margin: 10 auto">	</div>
	<div id="llamadasGraphic" style="width: 300px; height: 300px; margin: 10 auto"> </div>
	<!--table>
		<tr>
			<td>Usuarios</td>
			<td>324</td>
		</tr>
		<tr>
			<td>Llamadas totales</td>
			<td>234243</td>
		</tr>
		<tr>
			<td>Llamadas ok</td>
			<td>3242</td>
		</tr>
		<tr>
			<td>Llamadas fallidas</td>
			<td>6342</td>
		</tr>
		<tr>
			<td>Llamadas sospechosas</td>
			<td>1005</td>
		</tr>
	</table-->
</div>