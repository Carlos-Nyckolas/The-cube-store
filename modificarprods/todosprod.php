<?php
require "../conexao.php"; 
$comando = "SELECT*FROM produto"; 
require "../query.php";
echo '<a href="./addprod/addprod_form.php">ADD NOVO PRODUTO<br><br></a>';
while($linha = mysqli_fetch_assoc($query)){
    echo $linha["titulo"];
    echo $linha["descricao"],"<a href=".'./editar/editarprod_form.php?id='.$linha['idproduto'].">[editar]</a>
    <a href=".'./excluir/excluir.php?id='.$linha['idproduto'].">[excluir]</a>","<br><br>";
}


echo "<br><br>FEEDBACKS<br><br>";

$comando = "SELECT*FROM feedback"; 
require "../query.php";
while($linha = mysqli_fetch_assoc($query)){
    echo $linha["titulo"];
    echo "<a href=".'./feedback/editarform.php?id='.$linha['idfeedback'].">[editar]</a>
    <a href=".'./feedback/excluir.php?id='.$linha['idfeedback'].">[excluir]</a>","<br><br>";
}

echo '<a href="../home.php">voltar</a>';
?>
