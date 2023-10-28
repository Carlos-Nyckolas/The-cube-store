
<?php

require "../../conexao.php";
$id = $_POST["id"];
$titulo = $_POST["titulo"];
$mensagem = $_POST["mensagem"];
$comando = "update feedback set titulo='$titulo', mensagem='$mensagem' where idfeedback=$id";
require "../../query.php";
if($query){
    header("location:../todosprod.php");
}else{
    echo 'erro <a href="../todosprod.php">Voltar</a>'; 
}

?>