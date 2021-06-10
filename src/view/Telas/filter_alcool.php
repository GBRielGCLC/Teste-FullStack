<?php
	include_once("../../model/conexao.php");
	$url = "https://the-cocktail-db.p.rapidapi.com/list.php?a=list";
	$resultado = conexao($url);
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Filtrar por álcool </title>
    <link rel="stylesheet" href="../style.css">
</head>
 
<body>
    <?php include("../nav.html");?>
    

    <form action="filter-alcool.php" method="POST">
        <select class="form-control" id="exampleFormControlSelect1" name="alcool">
            <option hidden selected> Selecione </option>
            <?php
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                foreach ($resultado->drinks as $drink) {
                    echo "
                    <option value='$drink->strAlcoholic'>$drink->strAlcoholic</option>
                    ";
                }
            }
            ?>
        </select>

        <button type="submit" class="btn btn-outline-success">Filtrar</button>

    </form>
</body>
</html>