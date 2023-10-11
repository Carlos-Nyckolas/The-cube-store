<?php 
    session_start();
    require "conexao.php"; $comando = "SELECT*FROM produto"; require "query.php";
?> 
<!doctype html>
<html lang="PT-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script>tailwind.config = {theme: {extend: {colors: {clifford: '#da373d',}}}}</script>
        </head>
    <body class="bg-[url('imagens/fundo_site.png')] overflow-x-hidden overflow-y-auto ">
        <header>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
                <div class="w-screen flex flex-row items-center p-2 justify-between bg-gray-400 shadow-xs">
                    <div class="ml-8 text-lg text-gray-700 hidden md:flex">
                        <a href="home.php">
                            <div class="flex items-center gap-3">
                                <img src="imagens/logo.png" class="w-[60px] h-[60px] ">
                                <span class="font-bold text-blue-900 hover:text-blue-100">Cube Store</span>
                            </div>
                        </a>
                    </div>
                        <form class="w-screen md:w-1/3 h-10 bg-gray-200 cursor-pointer border border-gray-300 text-sm rounded-full flex" action="pesquisar.php" method="post">
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
                        <a href="./sair.php" class="text-gray-900 hover:text-white text-center px-4 py-2 m-2">Sair</a>
                    </div>
                        <?php }elseif($_SESSION["idacesso"]==2){?>
                    <div class="flex flex-row-reverse mr-8 hidden md:flex">
                        <a href="./carrinho/carrinho.php" class="text-gray-900 hover:text-white text-center px-4 py-2 m-2"><img src="imagens/carrinho.png" class="w-[40px] h-[40px] "></a>
                        <a href="./sair.php" class="text-gray-900 hover:text-white text-center px-4 py-2 m-2">Sair</a>
                    </div>
                        <?php } ?>
                </div>
        </header>
        <main class="flex flex-wrap">
                <?php while($linha = mysqli_fetch_assoc($query)): ?>
            <div class="m-3 bg-gray-100/75">
                <div class=" m-3  w-[25vw]">
                    <div class="group relative">
                        <div class="aspect-h-1 aspect-w-1 w-full rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                            <img src="<?php  echo $linha["img"];?>"  class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-700">
                            <a href="./verprod/vizuprod.php?id=<?= $linha["idproduto"];?>&titulo=<?=$linha["titulo"];?>&preco=<?=$linha["preco"];?>&descricao=<?=$linha["descricao"]?>&img=<?=$linha["img"]?>">
                                <span aria-hidden="true" class=" absolute inset-0"></span>
                                <span class="font-bold"><?php echo $linha["titulo"];?></span>
                            </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500"><?php echo $linha["descricao"]; ?></p>
                        </div>
                            <p class="text-sm font-medium text-gray-900">$<?php echo $linha["preco"]; ?></p>
                        </div>
                    </div>
                </div>
            </div>
                <?php endwhile;?>
        </main>
        <footer class="bg-white dark:bg-gray-900">
            <div class="mx-auto w-full max-w-screen-2xl p-4 py-6 lg:py-8">
                <div class="md:flex md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <a href="#" class="flex items-center">
                            <img src="./imagens/logo.png" class="h-10 mr-3" alt="The cube store Logo" />
                            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">The-cube-store</span>
                        </a>
                    </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
            <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Siga-nos</h2>
                  <ul class="text-gray-500 dark:text-gray-400 font-medium">
                      <li class="mb-4">
                          <a href="https://github.com/Carlos-Nyckolas" class="hover:underline ">Github: Carlos Nyckolas</a>
                      </li>
                      <li class="mb-4">
                          <a href="https://github.com/melisssa-caf" class="hover:underline ">Github: Melissa de Jesus</a>
                      </li>
                      <li class="mb-4">
                          <a href="./sobre/sobre-nos.php" class="hover:underline ">Sobre</a>
                      </li>
                  </ul>
            </div>
            </div>
            </div>
        </footer>
    </body>
</html>
