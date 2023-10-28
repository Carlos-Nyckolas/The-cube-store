<?php

require "../../conexao.php";
$id=$_GET["id"];
$comando="SELECT *FROM feedback WHERE idfeedback=$id";
require "../../query.php";
$linha=mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar comentário</title>
</head>
<body>
    <form action="editar.php" method="post">
        <input type="hidden" name="id" value="<?=$id?>">
        <input type="text" name="titulo" value="<?=$linha["titulo"]?>">
        <input type="text" name="mensagem" value="<?=$linha["mensagem"]?>">
        <button type="submit">editar</button>
    </form>
</body>
</html>