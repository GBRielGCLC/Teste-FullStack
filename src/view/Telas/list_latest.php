<?php
	include_once("../../model/conexao.php");
	$url = "https://the-cocktail-db.p.rapidapi.com/latest.php";
	$resultado = conexao($url);
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Listar últimos </title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
	<?php include("../nav.html");?>
	
	<table>
		<thead>
			<th> Nome </th>
			<th> Copo </th>
			<th> Filtro alcoólico </th>
			<th style="width:40%"> Instruções </th>
		</thead>
		<Tbody>
			
			<?php
				foreach ($resultado->drinks as $drink) {
					echo "
					<tr>
						<td>$drink->strDrink</td>	
						<td>$drink->strGlass</td>
						<td>$drink->strAlcoholic</td>
						<td>$drink->strInstructions</td>
					</tr>
					";
				}
			?>
		</Tbody>
	</table>
</body>
</html>