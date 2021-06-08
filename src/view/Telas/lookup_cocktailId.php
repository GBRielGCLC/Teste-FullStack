<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Pesquisar coquetel por id </title>
</head>

<style>
    body{
        height:100%;
        width:100%;
    }
    form{
        width:50%;
        height: 50px;
        margin-top:auto;
        margin-bottom:auto;
        margin-left:auto;
        margin-right:auto;
    }
    input{
        width:70%;
    }
    button{
        width:20%;
    }
</style>

<body>
    <?php include("../nav.html");?>
    

    <form action="..\..\controller\lookup\coktailId.php" method="POST">
        <input type="number" name="id">
        <button type="submit" class="btn btn-outline-success">Pesquisar</button>

    </form>
</body>
</html>