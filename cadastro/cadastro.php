<?php
$nome=$_POST["nome"];
$email=$_POST["email"];
$senha=$_POST["senha"];

require "../conexao.php";
$comando = "SELECT email FROM usuario where email = '$email'";
require "../query.php";

$qtd =  mysqli_num_rows($query);

if($qtd > 0){
 header("Location: ../index.php?n=1");
}else {
    $comando = "INSERT INTO usuario(nome,senha,email) VALUES('$nome','$senha','$email')";
    require "../query.php";
    if($query == false) {
        echo mysqli_error();
    } else{
        header ('location: ../login/login_form.php');
    }
}

?>

