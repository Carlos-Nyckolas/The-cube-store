<?php
session_start();
require "../conexao.php";
$idprod=$_POST["id"];
$quantidade=$_POST["quantidade"];
$iduser=$_SESSION["iduser"];

$comando = "INSERT INTO carrinho(idproduto, quantidade, idusuario) VALUES($idprod, $quantidade, $iduser)";
require "../query.php";
if (!$query){
    die("ERRO");
}
echo "compra efetuada com sucesso!";

?>