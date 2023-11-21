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
<body class="bg-blue-200 ">
    <div class="flex justify-center items-center">
    <div class="w-[25vw] bg-gray-300 rounded-lg overflow-hidden shadow-lg mt-[20vh]">
            <div class="border-b px-4 pb-6">
                <div class="text-center my-4">
                    <img class="h-32 w-32 rounded-full border-4 border-white dark:border-white mx-auto my-4"
                        src='<?=$linha["imgperfil"]?>' alt="">
                    <div class="py-2">
                        <h3 class="font-bold text-2xl text-gray-800 dark:text-white mb-1"><?=$linha["nome"]?></h3>
                        <div class="inline-flex text-gray-700 dark:text-gray-300 items-center">
                            <span>
                                <?=$linha["email"]?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 px-2">
                    <button class="flex-1 rounded-full bg-blue-600 dark:bg-blue-800 text-white dark:text-white antialiased font-bold hover:bg-blue-800 dark:hover:bg-blue-900 px-4 py-2">
                        <a href="editar1.php?id=<?=$linha["idusuario"]?>">Editar perfil</a>  
                    </button>
                    <button class="flex-1 rounded-full bg-blue-600 dark:bg-blue-800 text-white dark:text-white antialiased font-bold hover:bg-blue-800 dark:hover:bg-blue-900 px-4 py-2">
                        <a href="../home.php">voltar</a>  
                    </button>
                </div>
            </div>
        </div>
</div>
</div>

</body>
</html>