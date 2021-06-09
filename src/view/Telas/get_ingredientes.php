<?php


$curl = curl_init();


curl_setopt_array($curl, [
	CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/list.php?i=list",
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
    <title> Listar ingredientes </title>
    <link rel="stylesheet" href="../style.css">
</head>

<style>
    table{
        width: 50%;
    }
</style>

<body>

<?php include("../nav.html");?>

<table>
	<thead>
		<th> Ingredientes </th>
	</thead>
	<Tbody>
		
        <?php
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            foreach ($resultado->drinks as $drink) {
                echo "
                <tr>
                    <td>$drink->strIngredient1</td>
                </tr>
                ";
            }
        }
        ?>
	</Tbody>
</table>
</body>
</html>
