<?php
session_start();
if(isset($_POST['email']) && isset($_POST['senha'])){
        include_once('../conexao.php');
        $email=$_POST["email"];
        $senha=$_POST["senha"];
        $sql="SELECT * FROM usuario WHERE email ='$email' and senha = '$senha'";
        $result = $conexao->query($sql);
        
        if(mysqli_num_rows($result) < 1){
            header('location: login_form.php');
        }else{
            $linha = mysqli_fetch_assoc($result);
            $_SESSION["iduser"] = $linha["idusuario"];
            $_SESSION["idacesso"] = $linha["idacesso"];
            header('location: ../home.php');
        }
 
}else{
        header('location: login.php');
    }

?>