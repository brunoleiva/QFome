<?php
session_start();
if(isset($_SESSION['codEmpresa']) == true && isset($_SESSION['senhaEmpresa']) == true && isset($_SESSION['nomeEmpresa']) == true){
    $cod = $_SESSION['codEmpresa'];
    
    header("Location: alterar_restaurante.php");
}else{
    if(isset($_SESSION['usuario']) == true && isset($_SESSION['senha']) == true){
    $logado = $_SESSION['usuario'];
    $logado_nivel = $_SESSION['tipo'];
    
    
    }else{
        unset($_SESSION['codEmpresa']);
        unset($_SESSION['usuario']);
        unset($_SESSION['senhaEmpresa']);
        unset($_SESSION['nomeEmpresa']);
        unset($_SESSION['codIdent']);
        unset($_SESSION['telefone']);
        unset($_SESSION['site']);
        unset($_SESSION['descricao']);
        unset($_SESSION['numEnd']);
        unset($_SESSION['complemento']);
        unset($_SESSION['link']);
        unset($_SESSION['email']);
        unset($_SESSION['cep']);
        unset($_SESSION['bairro']);
        unset($_SESSION['logradouro']);
        unset($_SESSION['cidade']);
    unset($_SESSION['status']);  
    unset($_SESSION['cod']);
    unset($_SESSION['usuario']);
    unset($_SESSION['nome']);
    unset($_SESSION['senha']);
    unset($_SESSION['url']);
    unset($_SESSION['tipo']);
    unset($_SESSION['email']);
            session_destroy();
            header("Location: login.php");
    }
}
   