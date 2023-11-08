<?php
$email = $_POST["email"];
$nome = $_POST["nome"];

$arquivo = "
    <html>
        <p><b>Nome:</b>$nome</p>
        <p><b>E-mail:</b>$email</p>
        <p><b>Mensagem:</b><a href='http://localhost/The-cube-store2.4/The-cube-store/login/user/editarform2.php?email=$email'>clique aqui para mudar sua senha</a></p>";

$destino = $email;
$assunto = "Troca de senha";

$headers = "MIME-version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: $nome <$email>";

mail($destino, $assunto, $arquivo, $headers);


?>
<html>
    <form action="editarform2.php" method="post">
        <input type="hidden" name="email" value="$email">
    </form>
</html>