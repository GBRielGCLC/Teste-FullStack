<?php
$curl = curl_init();


curl_setopt_array($curl, [
	CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/latest.php",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: the-cocktail-db.p.rapidapi.com",
		"x-rapidapi-key: 09d8e86b69msh367d3917d7092d8p152d35jsnbed02402c430"
	],
]);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$err = curl_error($curl);
$resultado = json_decode(curl_exec($curl));

curl_close($curl);

?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Listar últimos </title>
</head>

<style>
	body{
            text-align: center;
        }
        table{
			margin-top:40px;
            margin-left: auto;
            margin-right: auto;
            width: 98%;
            border: 1px solid #adadad;
            border-spacing: 1px;
        }
        th{
            text-align: left;
            background-color: #4caf50;
            color: white;
        }

        th, td{
            padding: 5px;
        }

        tr:nth-child(even){
            background-color: #f2f2f2;
        }
        tr:nth-child(odd){
            background-color: white;
        }

        tr:hover{
            background-color: #d1cccc;
        }
</style>

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
			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
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
			}
			?>
		</Tbody>
	</table>
</body>
</html>