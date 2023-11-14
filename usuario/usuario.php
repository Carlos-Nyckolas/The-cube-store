<?php

require "../conexao.php";
session_start();
$id=$_SESSION["iduser"];
$comando = "SELECT*FROM usuario WHERE idusuario=$id";
require "../query.php";
if(!$query){
    die('ERRO');
}
$linha=mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = {theme: {extend: {colors: {clifford: '#da373d',}}}}</script>
    <title>página do usuario</title>
</head>
<body class="bg-[url('../imagens/fundo_site.png')]">
    <div class="h-[100vh] flex justify-center items-center">
        <div class="flex flex-col justify-around bg-gray-300 p-[5vh] rounded-xl">
            <span class="font-bold">Nome: </span><span class="text-blue-700 font-semibold"><?=$linha["nome"]?></span>
            <span class="font-bold">Email: </span><span class="text-blue-700 font-semibold"><?=$linha["email"]?></span>
            <?php
            $idacesso = $_SESSION["idacesso"];
            if($idacesso==2){
            ?>
            <a class="flex" href="deletar1.php">
                <div class="mt-[3vh] bg-red-300 rounded-xl w-[15vw] p-[2vh] flex flex-row items-center justify-between">
                    <span class="text-red-800 ">DELETAR CONTA</span>
                    <img class="h-[7vh]" src="../imagens/X.png" alt="X vermelho">
                </div>
            </a>
            <?php
            }
            ?>
            <a href="../sair.php">
                <div class="mt-[3vh] bg-yellow-300 rounded-xl w-[15vw] p-[2vh] flex flex-row items-center justify-between">
                    <span class="text-red-800 ">SAIR DA CONTA</span>
                    <img class="h-[7vh]" src="../imagens/X.png" alt="X vermelho">
                </div>
            </a>
        </div>
    </div>
</body>
</html>