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
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = {theme: {extend: {colors: {clifford: '#da373d',}}}}</script>
    <title>página do usuario</title>
</head>
<body class="bg-blue-200 ">
    <div class="flex justify-center items-center">
    <div class="w-[35vw] bg-gray-300 rounded-lg overflow-hidden shadow-lg mt-[20vh]">
            <div class="border-b px-4 pb-6">
                <div class="text-center my-4">
                    <form action="editar2.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=$linha["idusuario"]?>">
                       <input type="file" name="img" value='<?=$linha["imgperfil"]?>'>
                    <div class="py-2">
                        <input type="text" name="nome" value='<?=$linha["nome"]?>'>
                    </div>
                </div>
                <div class="flex gap-2 px-2">
                <button class="flex-1 rounded-full bg-blue-600 dark:bg-blue-800 text-white dark:text-white antialiased font-bold hover:bg-blue-800 dark:hover:bg-blue-900 px-4 py-2">
                        <a href="editar2.php?id=<?=$id?>">Editar</a>  
                    </button>
                    <button class="flex-1 rounded-full bg-blue-600 dark:bg-blue-800 text-white dark:text-white antialiased font-bold hover:bg-blue-800 dark:hover:bg-blue-900 px-4 py-2">
                        <a href="../sair.php">sair da conta</a>  
                    </button>
                    <button class="flex-1 rounded-full bg-blue-600 dark:bg-blue-800 text-white dark:text-white antialiased font-bold hover:bg-blue-800 dark:hover:bg-blue-900 px-4 py-2">
                        <a href="../home.php">voltar</a>  
                    </button>
                    <?php $idacesso = $_SESSION["idacesso"];?>
                    <?php if($idacesso==2){?>
                    <button class="flex-1 rounded-full bg-blue-600 dark:bg-blue-800 text-white dark:text-white antialiased font-bold hover:bg-blue-800 dark:hover:bg-blue-900 px-4 py-2">
                        <a href="deletar1.php">Excluir conta</a> 
                    </button>
                    <?php }?>
                </div>
            </div>
        </div>
</div>
</div>
</body>
</html>