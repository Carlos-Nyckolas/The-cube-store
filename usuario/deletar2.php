<?php

require "../conexao.php";
session_start();

$comando='DELETE FROM carrinho WHERE idusuario='.$_SESSION["iduser"];
require "../query.php";
$comando='DELETE FROM usuario WHERE idusuario='.$_SESSION["iduser"];
require "../query.php";
if($query){
    session_destroy();
    header('Location:../index.php');
}else{
    echo 'Ocorreu um erro<br>';
    echo '<a href="usuario.php">Voltar</a>';
}

?>