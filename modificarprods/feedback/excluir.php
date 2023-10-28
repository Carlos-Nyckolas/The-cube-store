<?php

require "../../conexao.php";
$id = $_GET["id"];
$comando = "delete from feedback where idfeedback=$id";
require "../../query.php";
if($query){
    header("location:../todosprod.php");
}else{
    echo 'erro <a href="../todosprod.php">Voltar</a>'; 
}

?>