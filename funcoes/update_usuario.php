<?php
require_once 'conect.php';
require 'restricao.php';
$conn = Connection();

    
function AtualizarNome($nome,$conn){
         
         $codUsuario = $_SESSION['cod'];
        $result = $conn->prepare("UPDATE usuario set nome_usu='$nome' where cod_usu='$codUsuario'");
        $result->execute();
        $_SESSION['nome'] = $nome;   

        header("Location: ../perfil_usuario_normal.php");
    }

function ValidaEmail ($email2, $conn){
    $result = $conn->prepare("SELECT * FROM usuario WHERE email_usu = '$email2'");
    $result->execute();
    $count=$result->rowCount();
    if($count == 1){
        return true;
    }else{
        return false;
    }
}
function AtualizarEmail($email2,$conn){
    if(ValidaEmail($email2, $conn)){
        header("Location: ../alterar_normal.php?msg=2");
    }
    else{
        $codUsuario = $_SESSION['cod'];
   $result = $conn->prepare("UPDATE usuario set email_usu='$email2' where cod_usu='$codUsuario'");
   $result->execute();
   $_SESSION['email'] = $email2;     
   header("Location: ../perfil_usuario_normal.php");
    }
    
}
function AtualizarSenha($senha2,$conn){
         
    $codUsuario = $_SESSION['cod'];
   $result = $conn->prepare("UPDATE usuario set senha_usu='$senha2' where cod_usu='$codUsuario'");
   $result->execute();
   $_SESSION['senha'] = $senha2;
   header("Location: ../perfil_usuario_normal.php");
}



if(isset($_POST["nome"])){
    $nome = $_POST['nome'];

    AtualizarNome($nome, $conn);
    header("Location: ../perfil_usuario_normal.php");  

}else{  
    if (isset($_POST["email"])) {
        $email = $_POST['email'];
        $email1 = $_POST['email1'];
        $email2 = $_POST['email2'];
        if($email1 == $email2){
        AtualizarEmail($email2,$conn);
        }else{
            header("Location: ../alterar_normal.php?msg=3");  
        }
    } else {
        if (isset($_POST["senha"])) {
            $senha = $_POST['senha'];
            $senha1 = $_POST['senha1'];
            $senha2 = $_POST['senha2'];
            if($senha1 == $senha2){
                AtualizarSenha($senha2,$conn);
                header("Location: ../perfil_usuario_normal.php");  
                }else{
                    header("Location: ../alterar_normal.php?msg=4");  
                }

            }else{
            header("Location: ../alterar_normal.php"); 
            }
    }
}
