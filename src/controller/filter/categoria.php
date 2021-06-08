<?php
$categoria = $_POST["categorias"];

$curl = curl_init();


curl_setopt_array($curl, [
	CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/filter.php?c=$categoria",
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
	<title> Filtrar por categoria </title>
<!-------------------------------------------------------------------------------------- Booststrap -------------------------------------------------------------------------------------->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
</head>
<style>
	body{
            text-align: center;
        }
        table{
			margin-top:40px;
            margin-left: auto;
            margin-right: auto;
            width: 80%;
            border: 1px solid #adadad;
            border-spacing: 1px;
        }
        th{
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

        img{
            width:150px;
        }

        a{
            margin-top:50px;
        }
</style>
<body>
<a class="btn btn-outline-danger" href="../../view/Telas/filter_categoria.php"> Filtrar novamente </a>
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
                        <td>$categoria</td>
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