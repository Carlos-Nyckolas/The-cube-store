<?php
$conexao = mysqli_connect("localhost","root","","the-cube-store");
if (!$conexao){
    die("ERRO". mysqli_connect_error());
}
?>