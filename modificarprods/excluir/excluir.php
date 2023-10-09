<?php

session_start();
    if ($_SESSION["idacesso"]!= 1){
        header('location: ../../home.php');
    }
    
$id = $_GET["id"];
require "../../conexao.php"; 
$comando2 = "DELETE FROM imgprod WHERE idproduto = $id";
$query2 = mysqli_query($conexao,$comando2);
$comando = "DELETE FROM produto WHERE idproduto = $id "; 
require "../../query.php";
if(!$query){
   echo "ocorreu um erro";
}else{
    echo "excluido com sucesso!!! <br>"; ?>
    <a href="../../home.php">Voltar</a>
<?php } ?>