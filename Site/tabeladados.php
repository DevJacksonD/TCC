<?php
    include_once('esp-database.php');
	
    if ($_GET["readingsCount"]){
      $data = $_GET["readingsCount"];
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      $readings_count = $_GET["readingsCount"];
    }
	
    else {
      $readings_count = 20;
	  }

    $last_reading = getLastReadings();
    $last_reading_time = $last_reading["reading_time"];

    $last_reading_time = date("d/m/Y H:i:s", strtotime("$last_reading_time - 3 hours"));

?>

<!DOCTYPE html>
<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Monitoramento de Vibrações</title>
        <link rel="stylesheet" type="text/css" href="styletabela.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script type="text/javascript">
			
			setTimeout(function(){
				window.location.reload(1);
			},5000);
			
		</script>
	</head>
    <header class="header">

		<a href="index.php">📊 Monitoramento de Vibrações</a>
			<nav>
				<ul class="menu">
					<li><a href="tabeladados.php">Tabela de dados</a></li>
					<li><a href="grafico.php">Gráficos</a></li>
					<li><a href="/">Análise</a></li>
				</ul>
			</nav>	
	</header>
	<body>
		<form class="form"method="get">
            <input type="number" name="readingsCount" min="1" placeholder="Número de leituras (<?php echo $readings_count; ?>)">
            <input type="submit" value="ATUALIZAR">
		</form>
		
		<?php
			echo   '<h1> Últimas ' . $readings_count . ' Leituras</h1>
            <table cellspacing="5" cellpadding="5" id="tableReadings">
			<tr>
			<th>ID</th>
			<th>AccX</th>
			<th>AccY</th>
			<th>AccZ</th>
			<th>RmsX</th>
			<th>RmsY</th>
			<th>RmsZ</th>
			<th>Timestamp</th>
			</tr>';
			
			$result = getAllReadings($readings_count);
			if ($result) {
				while ($row = $result->fetch_assoc()) {
					$row_id = $row["id"];
					$row_accx = $row["accx"];
					$row_accy = $row["accy"];
					$row_accz = $row["accz"];
					$row_rmsx = $row["rmsx"];
					$row_rmsy = $row["rmsy"];
					$row_rmsz = $row["rmsz"];
					$row_reading_time = $row["reading_time"];
					$row_reading_time = date("d/m/Y H:i:s", strtotime("$row_reading_time - 3 hours"));
					
					echo '<tr>
                    <td>' . $row_id . '</td>
                    <td>' . $row_accx . '</td>
                    <td>' . $row_accy . '</td>
                    <td>' . $row_accz . '</td>
					<td>' . $row_rmsx . '</td>
                    <td>' . $row_rmsy . '</td>
                    <td>' . $row_rmsz . '</td>
                    <td>' . $row_reading_time . '</td>
					</tr>';
				}
				echo '</table>';
				$result->free();
			}
		?>
		
	</body>
</html>
