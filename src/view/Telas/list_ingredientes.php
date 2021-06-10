<?php
	include_once("../../model/conexao.php");
	$url = "https://the-cocktail-db.p.rapidapi.com/list.php?i=list";
	$resultado = conexao($url);
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
            foreach ($resultado->drinks as $drink) {
                echo "
                <tr>
                    <td>$drink->strIngredient1</td>
                </tr>
                ";
            }
        ?>
	</Tbody>
</table>
</body>
</html>
