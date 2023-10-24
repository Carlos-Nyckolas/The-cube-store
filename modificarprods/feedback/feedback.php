<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = {theme: {extend: {colors: {clifford: '#da373d',}}}}</script>
    <title>feedback</title>
</head>
<body class="bg-[url('../../imagens/fundo_site.png')] p-[2.5vw] flex">
<div class="flex">
<div class="bg-gray-300 w-[30vw] h-[40vh] p-[1.5vw] rounded-lg m-[2vh]">
    <form class="flex flex-col items-start" action="add.php" method="post">
        <h2 class="m-[0.5vh] font-bold text-blue-900">Envie seu Feedback</h2>
        <input class="m-[0.5vh] w-[15vw] p-[2.5px] border-[1px] border-blue-700 rounded-lg" type="text" name="titulo" placeholder="Título">
        <textarea rows="8" cols="60" class="m-[0.5vh] p-[2.5px] border-[1px] border-blue-700 rounded-lg" name="mensagem" placeholder="Mensagem"></textarea>
        <button class="m-[0.5vh] w-[3.5vw] border-[1px] border-blue-700 rounded-xl h-[2.5vh] text-xs text-blue-600 bg-blue-100" type="submit">Enviar</button>
    </form>
</div>

<?php
require "../../conexao.php"; 
$comando = "SELECT*FROM feedback"; 
require "../../query.php";
?>
<div class="bg-gray-300 w-[30vw] p-[1.5vw] rounded-lg m-[2vh]">
    <h1 class="m-[0.5vh] font-bold text-blue-900">Feedbacks</h2>
    <?php
    while($linha = mysqli_fetch_assoc($query)){
    ?>
    <div class="bg-white flex flex-col flex-wrap p-[1.5vh] rounded-lg m-[1vh]">
        <span class="font-semibold text-blue-900"><?=$linha["titulo"]?></span>
        <span class="text-indigo-900"><?=$linha["mensagem"]?></span>
        <span class="text-gray-600 text-xs">Postado: <?=$linha["datahora"]?></span>
    </div>    
    
    <?php
    }
    ?>
</div>
</div>
</body>
</html>