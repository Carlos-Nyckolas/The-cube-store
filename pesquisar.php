<?php 
session_start();
?> 
<?php
$pesquisar=$_POST["busca"];
if(!isset($pesquisar)){
    header('location: home.php');
}
require "conexao.php";
$comando = "SELECT * FROM produto WHERE titulo LIKE '%$pesquisar%' OR descricao LIKE '%$pesquisar%'";
require "query.php";?>
<html lang="PT-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script>tailwind.config = {theme: {extend: {colors: {clifford: '#da373d',}}}}</script>
        </head>
        <body class="bg-blue-200 overflow-x-hidden overflow-y-auto">
        <header>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
                <div class="w-screen flex flex-row items-center p-2 justify-between bg-white shadow-xs">
                    <div class="ml-8 text-lg text-gray-700 hidden md:flex">
                        <a href="home.php">
                            <div class="flex items-center gap-3">
                                <img src="imagens/logo.png" class="w-[60px] h-[60px] ">
                                <span class="font-bold text-blue-700 hover:text-red-500">Cube Store</span>
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
                    <div class="flex flex-row-reverse items-center mr-8 hidden md:flex">
                        <a href="./modificarprods/todosprod.php" class="text-gray-900 hover:text-white text-center font-semibold px-4 py-2 m-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path d="M17.004 10.407c.138.435-.216.842-.672.842h-3.465a.75.75 0 01-.65-.375l-1.732-3c-.229-.396-.053-.907.393-1.004a5.252 5.252 0 016.126 3.537zM8.12 8.464c.307-.338.838-.235 1.066.16l1.732 3a.75.75 0 010 .75l-1.732 3.001c-.229.396-.76.498-1.067.16A5.231 5.231 0 016.75 12c0-1.362.519-2.603 1.37-3.536zM10.878 17.13c-.447-.097-.623-.608-.394-1.003l1.733-3.003a.75.75 0 01.65-.375h3.465c.457 0 .81.408.672.843a5.252 5.252 0 01-6.126 3.538z" />
                                <path fill-rule="evenodd" d="M21 12.75a.75.75 0 000-1.5h-.783a8.22 8.22 0 00-.237-1.357l.734-.267a.75.75 0 10-.513-1.41l-.735.268a8.24 8.24 0 00-.689-1.191l.6-.504a.75.75 0 10-.964-1.149l-.6.504a8.3 8.3 0 00-1.054-.885l.391-.678a.75.75 0 10-1.299-.75l-.39.677a8.188 8.188 0 00-1.295-.471l.136-.77a.75.75 0 00-1.477-.26l-.136.77a8.364 8.364 0 00-1.377 0l-.136-.77a.75.75 0 10-1.477.26l.136.77c-.448.121-.88.28-1.294.47l-.39-.676a.75.75 0 00-1.3.75l.392.678a8.29 8.29 0 00-1.054.885l-.6-.504a.75.75 0 00-.965 1.149l.6.503a8.243 8.243 0 00-.689 1.192L3.8 8.217a.75.75 0 10-.513 1.41l.735.267a8.222 8.222 0 00-.238 1.355h-.783a.75.75 0 000 1.5h.783c.042.464.122.917.238 1.356l-.735.268a.75.75 0 10.513 1.41l.735-.268c.197.417.428.816.69 1.192l-.6.504a.75.75 0 10.963 1.149l.601-.505c.326.323.679.62 1.054.885l-.392.68a.75.75 0 101.3.75l.39-.679c.414.192.847.35 1.294.471l-.136.771a.75.75 0 101.477.26l.137-.772a8.376 8.376 0 001.376 0l.136.773a.75.75 0 101.477-.26l-.136-.772a8.19 8.19 0 001.294-.47l.391.677a.75.75 0 101.3-.75l-.393-.679a8.282 8.282 0 001.054-.885l.601.504a.75.75 0 10.964-1.15l-.6-.503a8.24 8.24 0 00.69-1.191l.735.268a.75.75 0 10.512-1.41l-.734-.268c.115-.438.195-.892.237-1.356h.784zm-2.657-3.06a6.744 6.744 0 00-1.19-2.053 6.784 6.784 0 00-1.82-1.51A6.704 6.704 0 0012 5.25a6.801 6.801 0 00-1.225.111 6.7 6.7 0 00-2.15.792 6.784 6.784 0 00-2.952 3.489.758.758 0 01-.036.099A6.74 6.74 0 005.251 12a6.739 6.739 0 003.355 5.835l.01.006.01.005a6.706 6.706 0 002.203.802c.007 0 .014.002.021.004a6.792 6.792 0 002.301 0l.022-.004a6.707 6.707 0 002.228-.816 6.781 6.781 0 001.762-1.483l.009-.01.009-.012a6.744 6.744 0 001.18-2.064c.253-.708.39-1.47.39-2.264a6.74 6.74 0 00-.408-2.308z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="./usuario/usuario.php" class="text-gray-900 hover:text-white text-center px-4 py-2 m-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                            </svg>

                        </a>
                    </div>
                        <?php }elseif($_SESSION["idacesso"]==2){?>
                    <div class="flex flex-row-reverse items-center mr-8 hidden md:flex ">
                        <a href="./usuario/usuario.php" class="text-gray-900 hover:text-white text-center px-4 py-2 m-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="./carrinho/carrinho.php" class="text-gray-900 hover:text-white text-center px-4 py-2 m-2"><img src="imagens/carrinho.png" class="w-[25px] h-[25px] "></a>
                    </div>
                        <?php } ?>
                </div>
        </header>
        <main class="grid grid-cols-6 p-4">
                <?php while($linha = mysqli_fetch_assoc($query)): ?>
            <div class="m-3 bg-gray-100/75">
                <div class=" m-3  w-[14vw]">
                    <div class="group relative">
                        <div class="aspect-h-1 aspect-w-1 w-full rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-[30vh]">
                            <img src="<?php  echo $linha["img"];?>"  class="h-full w-full object-cover object-center">
                        </div>
                        <div>
                            <h3 class="text-lg text-gray-700">
                            <a href="./verprod/vizuprod.php?id=<?= $linha["idproduto"];?>">
                                <span aria-hidden="true" class=" absolute inset-0"></span>
                                <span class="font-bold"><?php echo $linha["titulo"];?></span>
                            </a>
                            </h3>
                            <p class="mt-1 text-lg text-gray-500"><?php echo $linha["descricao"]; ?></p>
                        </div>
                            <p class="text-lg font-medium text-gray-900">R$<?php echo $linha["preco"]; ?></p>
                        </div>
                    </div>
                </div>
            </div>
                <?php endwhile;?>
        </main>
        <footer class="bg-white dark:bg-gray-900 w-[100vw]">
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
                            <a class="font-bold text-blue-900 hover:text-red-500" href="modificarprods/feedback/feedback.php">Deixe seu feedback!</a>
                        </div>  
                        <div flex flex-col>
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
            </div>
        </footer>
    </body>
</html>
