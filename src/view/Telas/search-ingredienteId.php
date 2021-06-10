<?php
$id = $_POST["id"];

$curl = curl_init();


curl_setopt_array($curl, [
	CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/lookup.php?iid=$id",
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
    <title> Pesquisar ingrediente por id </title>
	<link rel="stylesheet" href="../style.css">
</head>

<?php include("../nav.html");?>

<body>

<table>
	<thead>
		<th> Id </th>
		<th> Nome </th>
		<th style="width:70%;"> Descrição </th>
		<th> Tipo </th>

	</thead>
	<Tbody>
		
        <?php
            if(isset($resultado)){
                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    foreach ($resultado->ingredients as $ing) {
                        echo "
                        <tr>
                            <td style='text-align:center;'>$ing->idIngredient</td>
                            <td>$ing->strIngredient</td>
                            <td>$ing->strDescription</td>
                            <td>$ing->strType</td>
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

<a class="btn btn-outline-danger" href="search_cocktailId.php"> Pesquisar novamente </a>

</body>
</html>