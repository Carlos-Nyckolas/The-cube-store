<?php

    session_start();
    if ($_SESSION["idacesso"]!= 1){
        header('location: ../../home.php');
    }

$id =$_POST["id"];
$titulo =$_POST["titulo"];
$descricao =$_POST["descricao"];
$preco =$_POST["preco"];

if($_FILES["img"]["size"]>0){
    $img =$_FILES["img"];
    $nome = $img["name"];
    $tmp_name = $img["tmp_name"];
    $caminho = "../../imagens/";
    move_uploaded_file($tmp_name, $caminho.$nome);
    $caminho = "imagens/$nome";
}else{
    require "../../conexao.php";
    $comando = "SELECT*FROM produto where idproduto = $id";
    require "../../query.php";
    $linha=mysqli_fetch_assoc($query);
    $caminho =$linha["img"];
    echo 2;
}


require "../../conexao.php"; 
$comando = "UPDATE produto SET titulo='$titulo', descricao='$descricao', img='$caminho', preco='$preco' WHERE idproduto = $id"; 
require "../../query.php";
if($query == true){
    echo "editado com sucesso!!! <br>"; ?>
    <a href="../../home.php">Voltar</a><?php } ?>