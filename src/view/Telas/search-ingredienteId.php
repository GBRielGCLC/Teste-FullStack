<?php
    $id = $_POST["id"];

	include_once("../../model/conexao.php");
	$url = "https://the-cocktail-db.p.rapidapi.com/lookup.php?iid=$id";
	$resultado = conexao($url);
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