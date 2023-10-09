<?php
    session_start();
    if ($_SESSION["idacesso"]!= 1){
        header('location: ../../home.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="addprod.php" method="POST" enctype="multipart/form-data">
        
        <label for="">Título</label><br>
        <input type="text" name="titulo"><br><br>
        
        <label for="">Descrição</label><br>
        <input type="text" name="descricao"><br><br>
        
        <label for="">Imagem</label><br>
        <input type="file" name="imagem"><br><br>
        
        <label for="">Preço</label><br>
        <input type="text" name="preco"><br><br>
        
        <button type="submit">Editar</button>

    </form>
</body>
</html>