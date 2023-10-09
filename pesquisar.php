<?php
$pesquisar=$_POST["busca"];
require "conexao.php";
$comando = "SELECT * FROM produto WHERE titulo LIKE '%$pesquisar%' OR descricao LIKE '%$pesquisar%'";
require "query.php";?>
<!doctype html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = {theme: {extend: {colors: {clifford: '#da373d',}}}}</script>
    </head>
    <body class="overflow-x-hidden overflow-y-auto">
        <header>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
                <div class="w-screen flex flex-row items-center p-2 justify-between bg-gray-400 shadow-xs">
                    
                    <div class="ml-8 text-lg text-gray-700 hidden md:flex">
                        <a href="index.php">
                            <div class="flex items-center gap-3">
                                <img src="https://icon-library.com/images/rubik-icon/rubik-icon-16.jpg" class="w-[60px] h-[60px] ">
                                <span>Cube Store</span>
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
                        <div class="flex flex-row-reverse mr-8 hidden md:flex">
                            <a href="./modificarprods./todosprod.php" class="text-gray-900 hover:text-white text-center px-4 py-2 m-2">Produtos</a>
                        </div>
            </div>
        </header>
        <main class="flex flex-wrap">
        <?php while($linha = mysqli_fetch_assoc($query)):?>
            <div class="bg-white">
                <div class=" m-3  w-[300px]">
                    <div class="group relative">
                        <div class="aspect-h-1 aspect-w-1 w-full rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                            <img src="<?php  echo $linha["img"];?>"  class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-700">
                            <a href="./verprod/vizuprod.php?id=<?= $linha["idproduto"];?>&titulo=<?=$linha["titulo"];?>&preco=<?=$linha["preco"];?>&descricao=<?=$linha["descricao"]?>&img=<?=$linha["img"]?>">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                <span><?php echo $linha["titulo"];?></span>
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
    </body>
</html>
