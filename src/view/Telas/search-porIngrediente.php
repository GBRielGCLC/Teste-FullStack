<?php
	$nome = $_POST["nome"];

	include_once("../../model/conexao.php");
	$url = "https://the-cocktail-db.p.rapidapi.com/filter.php?i=$nome";
	$resultado = conexao($url);
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Pesquisar por ingrediente </title>
    <link rel="stylesheet" href="../style.css">

</head>

<?php include("../nav.html");?>

<body>

<a class="btn btn-outline-danger" href="search_porIngrediente.php"> Pesquisar novamente </a>

<table>
	<thead>
        <th> Id </th>
		<th> Nome </th>
		<th> Imagem </th>
	</thead>
	<Tbody>
		
        <?php
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            foreach ($resultado->drinks as $drink) {
                echo "
                <tr>
                    <td>$drink->idDrink</td>
                    <td>$drink->strDrink</td>
                    <td><img src='$drink->strDrinkThumb' alt='Foto não carregada'></td>
                </tr>
                ";
            }
        }
        ?>
	</Tbody>
</table>


</body>
</html>