<?php

session_start();
$_SESSION["carrinho"]= array();
$idprod=$_POST["id"];
$quantidade=$_POST["quantidade"];

if (isset($_SESSION["iduser"])){
$iduser=$_SESSION["iduser"];
    $_SESSION["carrinho"]["iduser"] = $iduser;
}else{
    $_SESSION["carrinho"]["iduser"] = 'default';
}
$x = count($_SESSION["carrinho"]["iduser"]);
$_SESSION["carrinho"]["iduser"][$x] = $idprod;
$n = count($_SESSION["carrinho"]["iduser"][$x]);
$_SESSION["carrinho"]["iduser"][$x][$n] = $quantidade;

header('location: carrinho.php');

?>