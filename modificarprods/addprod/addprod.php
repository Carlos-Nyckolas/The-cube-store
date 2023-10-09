<?php

    session_start();
    if ($_SESSION["idacesso"]!= 1){
        header('location: ../../home.php');
    }

$titulo =$_POST["titulo"];
$descricao =$_POST["descricao"];
$img =$_FILES["imagem"];
$preco =$_POST["preco"];

$nome = $img["name"];
$tmp_name = $img["tmp_name"];
$caminho = "../../imagens/";
move_uploaded_file($tmp_name, $caminho.$nome);
$caminho = "imagens/$nome";

require "../../conexao.php"; 
$comando = "INSERT INTO produto(titulo,descricao,img,preco) VALUES('$titulo','$descricao','$caminho','$preco')"; 
require "../../query.php";
if($query == true){
    echo "editado com sucesso!!! <br>";?>
    <a href="../../home.php">Voltar</a> 
<?php }?>
