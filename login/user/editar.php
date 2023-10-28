<?php

require "../../conexao.php";
$email = $_POST["email"];
$senha = $_POST["senha"];
$comando = "update usuario set senha='$senha' where email='$email'";
require "../../query.php";
if($query){
    header("location:../login_form.php");
}else{
    echo 'erro <a href="../login_form.php">Voltar</a>'; 
}

?>