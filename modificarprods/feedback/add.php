<?php

require "../../conexao.php";
$titulo=$_POST["titulo"];
$msg=$_POST["mensagem"];
$comando="INSERT INTO feedback(titulo, mensagem) VALUES('$titulo', '$msg')";
require "../../query.php";
if($query){
    header("location:feedback.php");
}else{
    echo "erro!";
    echo '<a href="feedback.php">Voltar</a>';
}

?>