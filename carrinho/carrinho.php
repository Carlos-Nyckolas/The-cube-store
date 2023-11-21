<?php 
session_start();
require "../conexao.php"; 
$iduser = $_SESSION["iduser"];
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
    
    <body class="bg-blue-200 ">
    <header>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
                    <div class="w-screen flex flex-row items-center p-2 justify-between bg-white shadow-xs">
                        <div class="ml-8 text-lg text-gray-700 hidden md:flex">
                            <a href="../home.php">
                                <div class="flex items-center gap-3">
                                    <img src="../imagens/logo.png" class="w-[60px] h-[60px] ">
                                    <span class="font-bold text-blue-900 hover:text-red-500">Cube Store</span>
                                </div>
                            </a>
                        </div>
                                <form class="w-screen md:w-1/3 h-10 bg-gray-200 cursor-pointer border border-gray-300 text-sm rounded-full flex" action="../pesquisar.php" method="post">
                                    <input type="search" name="busca" placeholder="Search"
                                    class="flex-grow px-4 rounded-l-full rounded-r-full text-sm focus:outline-none">
                                    <button type="submit"><i class="fas fa-search m-3 mr-5 text-lg text-gray-700 w-4 h-4"></i></button>
                                </form>
                                <div class="flex flex-row-reverse mr-4 ml-4 md:hidden">
                                <i class="fas fa-bars"></i>
                            </div >
                            <?php if($_SESSION["idacesso"]==1){?>
                            <div class="flex flex-row-reverse mr-8 hidden md:flex">
                                <a href="./modificarprods/todosprod.php" class="text-gray-900 hover:text-white text-center px-4 py-2 m-2">Produtos</a>
                            </div>
                            <?php }elseif($_SESSION["idacesso"]==2){?>
                            <div class="flex flex-row-reverse mr-8 hidden md:flex">
                              <a href="../usuario/usuario.php" class="text-gray-900 hover:text-white text-center px-4 py-2 m-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                  <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                                </svg>
                              </a>
                            </div>
                            <?php } ?>
                </div>
            </header>
      <div class="m-[2vh]">
        <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
            <div class="rounded-lg md:w-2/3">
              <?php
                  $soma = 0;
                  $frete = 10;
                  $x = count($_SESSION["carrinho"]["iduser"]);
                  for($i=0; $i<=$x; $i++){
                    $comando = "Select*FROM produto where idproduto = $i";
                    require "../query.php";
                  $linha=mysqli_fetch_assoc($query) 
                  $soma = $soma + ($linha["preco"]*$linha["quantidade"]);
                ?>
              <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex ">
                  <img src="../<?= $linha["img"]?>" alt="product-image" class="w-full rounded-lg sm:w-40" />
                  <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                    <div class="mt-5 sm:mt-0">
                      <h2 class="text-lg font-bold text-gray-900"><?= $linha["titulo"] ?></h2>
                      <p class="mt-1 text-xs text-gray-700"><?= $linha["descricao"]?></p>
                    </div>
                    <div class="px-2.5 py-0.25 h-[2vh] text-xs text-blue-600 bg-blue-100 dark:bg-gray-700 rounded-xl dark:text-gray-200">
                      <a href="editar_form.php?qnt=<?=$linha["quantidade"]?>&id=<?=$linha["idcarrinho"]?>">Editar</a>
                    </div>
                    <div class="mt-4 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                      <div class="flex items-center border-gray-100">
                        <span class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"> - </span>
                        <input class="h-8 w-8 border bg-white text-center text-xs outline-none" type="number" value="<?=$linha["quantidade"]?>" disabled />
                        <span class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50"> + </span>
                      </div>
                      <div class="flex items-center space-x-4">
                        <p class="text-sm"><?= $linha["preco"]*$linha["quantidade"]?></p>
                        <a href="deletar_carrinho.php?id=<?= $linha["idcarrinho"]?>">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                        </a>
                      </div>
                    </div>
                  </div>
              </div>
              <?php } ?>
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
                  <form action="venda/add.php" method="post">
                    <input type="hidden" value="<?= $soma ?>">
                    <?php
                    while (mysqli_fetch_assoc($query)){
                      
                    }
                    ?>
                    <button class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Compre agora</button>
                  </form>
            </div>
        </div>
      </div>
    </body>
</html>