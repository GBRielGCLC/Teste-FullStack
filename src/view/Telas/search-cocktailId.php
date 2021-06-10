<?php
    $id = $_POST["id"];

	include_once("../../model/conexao.php");
	$url = "https://the-cocktail-db.p.rapidapi.com/lookup.php?i=$id";
	$resultado = conexao($url);
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Pesquisar coquetel por id </title>
    <link rel="stylesheet" href="../style.css">
</head>

<?php include("../nav.html");?>

<body>

<table>
	<thead>
		<th> Id </th>
		<th> Imagem </th>
		<th> Nome </th>
		<th> Copo </th>
		<th> Filtro alcoólico </th>
		<th style="width:40%"> Instruções </th>
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
                            <td>$drink->strGlass</td>
                            <td>$drink->strAlcoholic</td>
                            <td>$drink->strInstructions</td>
                        </tr>
                        ";
                    }
                }
            }
            else{
                echo "<tr>
                <td colspan='6'> Não há bebidas com esse filtro </td>
                </tr>
                ";
            }
        ?>
	</Tbody>
</table>

<a class="btn btn-outline-danger" href="search_cocktailId.php"> Pesquisar novamente </a>
</body>
</html>