<?php 
session_start();
?> 
<?php
$id = $_GET["id"];
$titulo = $_GET["titulo"];
$preco = $_GET["preco"];
$descricao = $_GET["descricao"];
$img = $_GET["img"];
require "../conexao.php";
$comando = "SELECT*FROM produto where idproduto=$id"; 
require "../query.php";
$comando2 = "SELECT*FROM imgprod where idproduto=$id";
$query = mysqli_query($conexao,$comando2);
?> 
<!DOCTYPE html>
<html lang="PT-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script>tailwind.config = {theme: {extend: {colors: {clifford: '#da373d',}}}}</script>
        <title>Document</title>
    </head>
    <body class="bg-[url('../imagens/fundo_site.png')]">
        <header>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
                    <div class="w-screen flex flex-row items-center p-2 justify-between bg-gray-400 shadow-xs">
                        
                        <div class="ml-8 text-lg text-gray-700 hidden md:flex">
                            <a href="../home.php">
                                <div class="flex items-center gap-3">
                                    <img src="../imagens/cubo-logo.jpg" class="w-[60px] h-[60px] ">
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
                            </div>
                            <?php }elseif($_SESSION["idacesso"]==2){?>
                            <div class="flex flex-row-reverse mr-8 hidden md:flex">
                                <a href="./carrinho/carrinho.php" class="text-gray-900 hover:text-white text-center px-4 py-2 m-2"><img src="imagens/carrinho.png" class="w-[40px] h-[40px] "></a>
                                
                            </div>
                            <?php } ?>
                </div>
            </header>
        <section class="py-10 font-poppins dark:bg-gray-800">
            <div class="  bg-gray-200/90 p-5 rounded-3xl max-w-6xl px-4 mx-auto">
                <div class="flex flex-wrap mb-24 -mx-4">
                    <div class="w-full px-4 mb-8 md:w-1/2 md:mb-0">
                        <div class="sticky top-0 overflow-hidden ">
                            <div class="relative mb-6 lg:mb-10 lg:h-96">
                                <a class="absolute left-0 transform lg:ml-2 top-1/2 translate-1/2" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5 text-blue-500 bi bi-chevron-left dark:text-blue-200" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z">
                                    </path>
                                    </svg>
                                </a>

                                <img class="object-contain w-full lg:h-full" src="../<?php echo $img ?>" alt="">

                                <a class="absolute right-0 transform lg:mr-2 top-1/2 translate-1/2" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5 text-blue-500 bi bi-chevron-right dark:text-blue-200" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                    </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4 md:w-1/2">
                        <div class="lg:pl-20">
                            <div class="mb-6 ">
                                <span class="px-2.5 py-0.5 text-xs text-blue-600 bg-blue-100 dark:bg-gray-700 rounded-xl dark:text-gray-200">Cubos</span>
                                    <h1 class="mt-6 mb-6 font-bold leading-loose tracking-wide text-gray-700 md:text-5xl dark:text-gray-300">
                                        <?php echo $titulo; ?>
                                    </h1>
                                    <h2 class="max-w-xl mt-6 mb-6 font-semibold leading-loose tracking-wide text-gray-700 md:text-2xl dark:text-gray-300">
                                        <?php echo $descricao?>
                                    </h2>
                                    <p class="inline-block text-2xl font-semibold text-gray-700 dark:text-gray-400 ">
                                    <span>
                                        R$<?php echo $preco?>
                                    </span>
                            </div>
                                <div class="flex flex-wrap items-center mb-6">
                                    <div class="mb-4 mr-4 lg:mb-0">
                                        <div class="w-28">
                                            <div class="relative flex flex-row w-full h-10 bg-transparent rounded-lg">
                                                <button class="w-20 h-full text-gray-600 bg-gray-100 border-r rounded-l outline-none cursor-pointer dark:border-gray-700 dark:hover:bg-gray-700 dark:text-gray-400 hover:text-gray-700 dark:bg-gray-900 hover:bg-gray-300">
                                                    <span class="m-auto text-2xl font-thin">-</span>
                                                </button>
                                                    <input type="number" class="flex items-center w-full font-semibold text-center text-gray-700 placeholder-gray-700 bg-gray-100 outline-none dark:text-gray-400 dark:placeholder-gray-400 dark:bg-gray-900 focus:outline-none text-md hover:text-black" value="1">
                                                    <button class="w-20 h-full text-gray-600 bg-gray-100 border-l rounded-r outline-none cursor-pointer dark:border-gray-700 dark:hover:bg-gray-700 dark:text-gray-400 dark:bg-gray-900 hover:text-gray-700 hover:bg-gray-300">
                                                    <span class="m-auto text-2xl font-thin">+</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                        <a href="#" class="w-full px-4 py-3 text-center text-blue-600 bg-blue-100 border border-blue-600 dark:hover:bg-gray-900 dark:text-gray-400 dark:border-gray-700 dark:bg-gray-700 hover:bg-blue-600 hover:text-gray-100 lg:w-1/2 rounded-xl">Adicionar ao carrinho</a>
                            </div>
                            <div class="flex gap-4 mb-6">
                                    <a href="#" class="w-full px-4 py-3 text-center text-gray-100 bg-blue-600 border border-transparent dark:border-gray-700 hover:border-blue-500 hover:text-blue-700 hover:bg-blue-100 dark:text-gray-400 dark:bg-gray-700 dark:hover:bg-gray-900 rounded-xl">Compre agora</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>