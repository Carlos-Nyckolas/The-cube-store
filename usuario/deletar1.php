<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = {theme: {extend: {colors: {clifford: '#da373d',}}}}</script>
    <title>página do usuario</title>
</head>
<body class="bg-blue-200">
    <div class="h-[100vh] flex flex-col justify-center items-center">
        <div class="flex flex-col justify-around bg-gray-400 p-[5vh] rounded-xl">
            <span class="text-red-700 text-xl font-bold">VOCÊ TEM CERTEZA QUE DESEJA EXCLUIR PERMANENTEMENTE SUA CONTA?</span>
        </div>
        <div class="flex">
            <div class="m-[5vh] flex flex-col text-red-700 justify-around bg-gray-400 p-[5vh] rounded-xl">
                <a href="deletar2.php">EXCLUIR PERMANENTEMENTE</a>
            </div>
            <div class="m-[5vh] flex flex-col text-blue-800 justify-around bg-gray-400 p-[5vh] rounded-xl">
                <a href="../home.php">CANCELAR</a>
            </div>
        </div>
        
    </div>
</body>
</html>