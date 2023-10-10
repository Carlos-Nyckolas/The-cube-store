<?php 
session_start();
require "../conexao.php"; 
$comando = "SELECT*FROM produto"; 
require "../query.php";
?> 
<!DOCTYPE html>
<html lang="PT-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script>tailwind.config = {theme: {extend: {colors: {clifford: '#da373d',}}}}</script>
        <title>Document</title>
    </head>
    <body class="bg-[url('../imagens/fundo_site.png')]">
    <div class="">
    <h1 class="mb-10 text-center text-2xl font-bold">Carrinho</h1>
    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
      <div class="rounded-lg md:w-2/3">
        <?php while($linha=mysqli_fetch_assoc($query)): 
            $soma = 0;
            $frete = 10;
            $soma = $soma + $linha["preco"]?>
        <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
          <img src="../<?= $linha["img"]?>" alt="product-image" class="w-full rounded-lg sm:w-40" />
          <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
            <div class="mt-5 sm:mt-0">
              <h2 class="text-lg font-bold text-gray-900"><?= $linha["titulo"] ?></h2>
              <p class="mt-1 text-xs text-gray-700"><?= $linha["descricao"]?></p>
            </div>
            <div class="mt-4 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
              <div class="flex items-center border-gray-100">
                <span class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"> - </span>
                <input class="h-8 w-8 border bg-white text-center text-xs outline-none" type="number" value="2" min="1" />
                <span class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50"> + </span>
              </div>
              <div class="flex items-center space-x-4">
                <p class="text-sm"><?= $linha["preco"]?></p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </div>
            </div>
          </div>  
        </div>
        <?php endwhile; ?>
      </div>
      <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
        <div class="mb-2 flex justify-between">
          <p class="text-gray-700">Subtotal</p>
          <p class="text-gray-700"><?= 'R$' . number_format($soma, 2, ',', '.');?></p>
        </div>
        <div class="flex justify-between">
          <p class="text-gray-700">Frete</p>
          <p class="text-gray-700"><?= 'R$' . number_format($frete, 2, ',', '.');?></p>
        </div>
        <hr class="my-4" />
        <div class="flex justify-between">
          <p class="text-lg font-bold">Total</p>
          <div class="">
            <p class="mb-1 text-lg font-bold"><?='R$' . number_format($soma+$frete, 2, ',', '.');?></p>
          </div>
        </div>
        <button class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Compre agora</button>
      </div>
    </div>
  </div>
    </body>
</html>