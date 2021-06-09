<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Pesquisar ingrediente por nome </title>
    <link rel="stylesheet" href="../style.css">
</head>

<style>0%;
    }
</style>

<body>
    <?php include("../nav.html");?>
    

    <form action="..\..\controller\pesquisar\ingredientePorNome.php" method="POST">
        <input type="text" name="nome">
        <button type="submit" class="btn btn-outline-success">Pesquisar</button>

    </form>
</body>
</html>