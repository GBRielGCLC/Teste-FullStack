<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Pesquisar coquetel por id </title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include("../nav.html");?>
    

    <form action="search-cocktailId.php" method="POST">
        <input type="number" name="id">
        <button type="submit" class="btn btn-outline-success">Pesquisar</button>

    </form>
</body>
</html>