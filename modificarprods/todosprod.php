    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script>tailwind.config = {theme: {extend: {colors: {clifford: '#da373d',}}}}</script>
        <title>página do usuario</title>
    </head>
    <body class="bg-blue-200 m-[2vw]">
    <header class="h-[3vh]">
        <?= '<a href="./addprod/addprod_form.php" class="bg-blue-300 rounded-xl p-[0.5vw] text-blue-700">ADD NOVO PRODUTO</a><br><br>';?>
    </header>
    <main class="grid grid-cols-6 p-4">
    <?php
        require "../conexao.php"; 
        $comando = "SELECT*FROM produto"; 
        require "../query.php";
        while($linha = mysqli_fetch_assoc($query)): ?>
        <div class="m-3 bg-gray-100/75">
                <div class=" m-3  w-[13.5   vw]">
                    <div class="group relative">
                        <div class=" w-full rounded-md bg-gray-200  group-hover:opacity-75 lg:h-[30vh]">
                            <img src="<?= '../'.$linha["img"];?>"  class=" w-full ">
                        </div>
                            <p class="text-lg font-medium text-gray-900 mt-2"><?=" <a href=".'./editar/editarprod_form.php?id='.$linha['idproduto'].' class="font-bold text-blue-700"0>[editar]</a>
                            <a href='.'./excluir/excluir.php?id='.$linha['idproduto'].' class="font-bold text-blue-700">[excluir]</a><br><br>';?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile;?>
        </main>
    </body>
    </html>

<?php
echo '<br><br><span class="bg-blue-300 font-semibold p-[0.5vw] rounded-xl">FEEDBACKS</span><br><br>';

$comando = "SELECT*FROM feedback"; 
require "../query.php";
while($linha = mysqli_fetch_assoc($query)): ?>
    <div class="flex flex-col bg-gray-200 p-[1vw] rounded-lg w-[40vw] m-[1vw]">
        <p><?= $linha["titulo"]." ";?></p>
        <p><?= $linha["mensagem"]." ";?></p>
        <div>
            <a href=".'./feedback/editarform.php?id=<?=$linha['idfeedback']?>" class="font-bold text-blue-700">[editar]</a>
            <a href=".'./feedback/excluir.php?id=<?=$linha['idfeedback']?>" class="font-bold text-blue-700">[excluir]</a><br>
        </div>
    </div>
<?php
endwhile;
echo '<a href="../home.php" class="bg-blue-300 rounded-xl w-[7vw] p-[0.5vw] font-semibold">voltar</a>';
?>
