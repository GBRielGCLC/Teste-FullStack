<?php
	$nome = $_POST["nome"];

	include_once("../../model/conexao.php");
	$url = "https://the-cocktail-db.p.rapidapi.com/search.php?i=$nome";
	$resultado = conexao($url);
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Pesquisar ingrediente por nome </title>
    <link rel="stylesheet" href="../../view/style.css">

</head>

<?php include("../nav.html");?>

<body>

<a class="btn btn-outline-danger" href="search_ingredientePorNome.php"> Pesquisar novamente </a>

<table>
	<thead>
        <th> Id </th>
		<th> Nome </th>
		<th style="width:70%;"> Descrição </th>
		<th> Tipo </th>
	</thead>
	<Tbody>
		
        <?php
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
        ?>
	</Tbody>
</table>


</body>
</html>