<?php
$nome=$_POST["nome"];
$email=$_POST["email"];
$senha=$_POST["senha"];

require_once "../conexao.php";
$comando = "INSERT INTO usuario(nome,senha,email) VALUES('$nome','$senha','$email')";
require_once "../query.php";
if($query == false) {
    echo mysqli_error();
} else{
    header ('location: ../login/login_form.php');
}
?>

