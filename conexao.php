<?php
$conexao = mysqli_connect("localhost","root","nyckolas.2007","the-cube-store");
if (!$conexao){
    die("ERRO". mysqli_connect_error());
}
?>