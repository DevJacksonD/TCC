<?php
	include_once('json.php')
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie-edge" />
		<link rel="stylesheet" href="./style.css" />
		<title>Gráficos</title>
		<script src="https://code.highcharts.com/highcharts.js"></script>
	</head>
	<body>
		<header class="header">
			<a href="/">Logo</a>
			<nav>
				<ul class="menu">
					<li><a href="tabeladados.php">Tabela de dados</a></li>
					<li><a href="/">Gráficos</a></li>
					<li><a href="/">Análise</a></li>
				</ul>
			</nav>
		</header>
		<section class="flex">
		<div id="chart-accx" class="container" style="width: 450px; height: 250px">
		</div>
		<div id="chart-accy" class="container" style="width: 450px; height: 250px">
		</div>
		<div id="chart-accz" class="container" style="width: 450px; height: 250px">
		</div >
		<div id="chart-rmsx" class="container" style="width: 450px; height: 250px">
		</div>
		<div id="chart-rmsy" class="container" style="width: 450px; height: 250px">
		</div >
		<div id="chart-rmsz" class="container" style="width: 450px; height: 250px">
		</div>
		</section>
		<script>

		var accx = <?php echo $accx; ?>;
		var accy = <?php echo $accy; ?>;
		var accz = <?php echo $accz; ?>;
		var rmsx = <?php echo $rmsx; ?>;
		var rmsy = <?php echo $rmsy; ?>;
		var rmsz = <?php echo $rmsz; ?>;
		var id = <?php echo $id; ?>;
		var reading_time = <?php echo $reading_time; ?>;

		var chartX = new Highcharts.Chart({
			chart:{ renderTo : 'chart-accx' },
			title: { text: 'AccX' },
			series: [{
				showInLegend: false,
				data: accx
			}],

			plotOptions: {
				line: { animation: false,
						dataLabels: { enabled: true }
				},
				series: { color: '#059e8a' }
			},
	  
			xAxis: { 
				type: '',
				categories: id
			},
			yAxis: {
				title: { text: 'AccX (g)' }
			},
			credits: { enabled: false }
		});
		
		var chartY = new Highcharts.Chart({
			chart:{ renderTo : 'chart-accy' },
			title: { text: 'AccY' },
			series: [{
				showInLegend: false,
				data: accy
			}],

			plotOptions: {
				line: { animation: false,
						dataLabels: { enabled: true }
				},
				series: { color: '#059e8a' }
			},
	  
			xAxis: { 
				type: '',
				categories: id
			},
			yAxis: {
				title: { text: 'AccY (g)' }
			},
			credits: { enabled: false }
		});
		
		
		var chartZ = new Highcharts.Chart({
			chart:{ renderTo : 'chart-accz' },
			title: { text: 'AccZ' },
			series: [{
				showInLegend: false,
				data: accz
			}],

			plotOptions: {
				line: { animation: false,
						dataLabels: { enabled: true }
				},
				series: { color: '#059e8a' }
			},
	  
			xAxis: { 
				type: '',
				categories: id
			},
			yAxis: {
				title: { text: 'AccZ (g)' }
			},
			credits: { enabled: false }
		});
		
		var chartrmsX = new Highcharts.Chart({
			chart:{ renderTo : 'chart-rmsx' },
			title: { text: 'RmsX' },
			series: [{
				showInLegend: false,
				data: rmsx
			}],

			plotOptions: {
				line: { animation: false,
						dataLabels: { enabled: true }
				},
				series: { color: '#059e8a' }
			},
	  
			xAxis: { 
				type: '',
				categories: id
			},
			yAxis: {
				title: { text: 'RmsX (g)' }
			},
			credits: { enabled: false }
		});
		
		var chartrmsy = new Highcharts.Chart({
			chart:{ renderTo : 'chart-rmsy' },
			title: { text: 'RmsY' },
			series: [{
				showInLegend: false,
				data: rmsy
			}],

			plotOptions: {
				line: { animation: false,
						dataLabels: { enabled: true }
				},
				series: { color: '#059e8a' }
			},
	  
			xAxis: { 
				type: '',
				categories: id
			},
			yAxis: {
				title: { text: 'RmsY (g)' }
			},
			credits: { enabled: false }
		});
		
		var chartrmsZ = new Highcharts.Chart({
			chart:{ renderTo : 'chart-rmsz' },
			title: { text: 'RmsZ' },
			series: [{
				showInLegend: false,
				data: rmsz
			}],

			plotOptions: {
				line: { animation: false,
						dataLabels: { enabled: true }
				},
				series: { color: '#059e8a' }
			},
	  
			xAxis: { 
				type: '',
				categories: id
			},
			yAxis: {
				title: { text: 'RmsZ (g)' }
			},
			credits: { enabled: false }
		});
		setTimeout(function(){
			window.location.reload(1);
		},3000);
		
		</script>
			
	</body>
<html>
			