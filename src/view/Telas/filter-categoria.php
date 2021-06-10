<?php
    $categoria = $_POST["categorias"];

	include_once("../../model/conexao.php");
	$url = "https://the-cocktail-db.p.rapidapi.com/filter.php?c=$categoria";
	$resultado = conexao($url);
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Filtrar por categoria </title>
    <link rel="stylesheet" href="../../view/style.css">
</head>

<?php include("../nav.html");?>

<body>
<a class="btn btn-outline-danger" href="filter_categoria.php"> Filtrar novamente </a>
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