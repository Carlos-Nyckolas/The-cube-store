<?php
$qnt=$_GET["qnt"];
$id=$_GET["id"];
?>
<!DOCTYPE html>
<html lang="PT-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script>tailwind.config = {theme: {extend: {colors: {clifford: '#da373d',}}}}</script>
        <title>editar</title>
    </head>
    <body class="h-[100vh] bg-[url('../imagens/fundo_site.png')] p-[2vh] flex justify-center items-center">
        <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex">
            <form action="editar_carrinho.php" method="post">
                <input type="hidden" name="id" value="<?=$id?>">
                <input class="border-[1px] border-blue-500 rounded-lg" type="number" name="qnt" value="<?=$qnt?>">
                <button class="px-2.5 py-0.25 h-[2vh] text-xs text-blue-600 bg-blue-100 rounded-xl" type="submit">Editar</button>
            </form>
        </div>
    </body>
</html>