<?php
require "../conexao.php";
$qnt=$_POST["qnt"];
$id=$_POST["id"];
$comando="UPDATE carrinho SET quantidade=$qnt WHERE idcarrinho = $id";

require "../query.php";
if($query){
    header('Location: carrinho.php');
}else{
    echo "FATAL ERROR";
    echo '<a href="carrinho.php">Voltar</a>';
}
?>
