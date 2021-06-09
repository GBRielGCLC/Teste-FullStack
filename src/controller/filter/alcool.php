<?php
$alcool = $_POST["alcool"];

$curl = curl_init();


curl_setopt_array($curl, [
	CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/filter.php?a=$alcool",
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
	<title> Filtrar por álcool </title>
    <link rel="stylesheet" href="../../view/style.css">
<!-------------------------------------------------------------------------------------- Booststrap -------------------------------------------------------------------------------------->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
</head>

<body>
<a class="btn btn-outline-danger" href="../../view/Telas/filter_alcool.php"> Filtrar novamente </a>
<table>
	<thead>
		<th> Id </th>
		<th> Imagem </th>
		<th> Nome </th>
		<th> Categoria </th>
	</thead>
	<Tbody>
		
        <?php
        if(isset($resultado)){
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                foreach ($resultado->drinks as $drink) {
                    echo "
                    <tr>
                        <td style='text-align:center;'>$drink->idDrink</td>
                        <td style='text-align:center; width:160px;'> <img src='$drink->strDrinkThumb' alt='Foto não carregada'> </td>
                        <td>$drink->strDrink</td>
                        <td>$alcool</td>
                    </tr>
                    ";
                }
            }
        }
        else{
            echo "<tr>
            <td colspan='4'> Não há bebidas com esse filtro </td>
            </tr>
            ";
        }
        ?>
	</Tbody>
</table>

</body>
</html>