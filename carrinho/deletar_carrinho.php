<?php
require "../conexao.php";
$id=$_GET["id"];

$comando="DELETE  FROM carrinho WHERE idcarrinho = $id";

require "../query.php";
 if($query){
    header('Location: carrinho.php');
 }else{
    echo "FATAL ERROR";
    echo '<a href="carrinho.php">Voltar</a>';
 }

?>