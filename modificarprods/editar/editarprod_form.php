<?php

    session_start();
    if ($_SESSION["idacesso"]!= 1){
        header('location: ../../home.php');
    }

$id=$_GET["id"];
require "../../conexao.php"; 
$comando = "SELECT*FROM produto where idproduto=$id"; 
require "../../query.php";
$linha = mysqli_fetch_assoc($query)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="editar.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label for="">Título</label><br>
        <input type="text" name="titulo" value="<?= $linha["titulo"]?>"><br><br>
        
        <label for="">Descrição</label><br>
        <input type="text" name="descricao" value="<?= $linha["descricao"]?>"><br><br>
        
        <label for="">Imagem</label><br>
        <input type="file" name="img" value="<?= $linha["img"]?>"><br><br>
        
        <label for="">Preço</label><br>
        <input type="text" name="preco" value="<?= $linha["preco"]?>"><br><br>
        
        <button type="submit">Editar</button>

    </form>
</body>
</html>