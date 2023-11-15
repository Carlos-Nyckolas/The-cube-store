<?php

    session_start();
    if ($_SESSION["idacesso"]!= 1){
        header('location: ../home.php');
    }

$id=$_POST["id"];
$nomep =$_POST["nome"];    

if($_FILES["img"]["size"]>0){
    $img =$_FILES["img"];
    $nome = $img["name"];
    $tmp_name = $img["tmp_name"];
    $caminho = "../imagens/";
    move_uploaded_file($tmp_name, $caminho.$nome);
    $caminho = "../imagens/$nome";
}else{
    require "../conexao.php";
    $comando = "SELECT*FROM usuario WHERE idusuario = $id";
    require "../query.php";
    $linha=mysqli_fetch_assoc($query);
    $caminho =$linha["imgperfil"];
    echo 2;
}


require "../conexao.php"; 
$comando = "UPDATE usuario SET nome='$nomep', imgperfil='$caminho' WHERE idusuario = $id"; 
require "../query.php";
if($query == true){
    header("Location: ./usuario.php");
    } ?>