<?php
require_once 'conect.php';
session_start();

$conn = Connection();

function Logando($usuario, $senha, $conn){
    $result = $conn->prepare("SELECT * FROM usuario WHERE email_usu = '$usuario' and senha_usu = '$senha' and cod_status_usu='A'");
    $result->execute();
    $count=$result->rowCount();
    if($count == 1){
        while ($linha = $result->fetch(PDO::FETCH_ASSOC)) {
            $codUsuario = $linha['cod_usu'];
            $nomeUsuario = $linha['nome_usu'];
            $tipoUsuario = $linha['cod_tipo_usu'];
            $url = $linha['url_foto_usu'];
            $status = $linha['cod_status_usu'];
            $email = $linha['email_usu'];
        }
        $_SESSION['cod'] = $codUsuario;
        $_SESSION['status'] = $status;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
        $_SESSION['url'] = $url;  
        $_SESSION['nome'] = $nomeUsuario;   
        $_SESSION['tipo'] = $tipoUsuario;   
        $_SESSION['email'] = $email;   
        if($tipoUsuario == 1){
            header("Location: ../perfil_usuario_normal.php");
        }else
        {
            header("Location: ../pagina_adm.php");
        }
        
    }
    else{
        if ($count == 0) {
    $resultEmpresa = $conn->prepare("SELECT * FROM empresa 
    INNER JOIN logradouro ON (logradouro.cod_cep = empresa.cod_cep) 
    WHERE email_empresa = '$usuario' and senha_empresa = '$senha' and cod_status_empresa='A'");
    $resultEmpresa->execute();
    $count1=$resultEmpresa->rowCount();
    if($count1 == 1){
        while ($linhaEmpresa = $resultEmpresa->fetch(PDO::FETCH_ASSOC)) {
            $codEmpresa = $linhaEmpresa['cod_empresa'];
            $nomeEmpresa = $linhaEmpresa['nome_empresa'];
            $codIdent = $linhaEmpresa['cod_ident_empresa'];
            $telefone = $linhaEmpresa['tel_empresa'];
            $site = $linhaEmpresa['site_empresa'];
            $senhaEmpresa = $linhaEmpresa['senha_empresa'];
            $descricao = $linhaEmpresa['desc_empresa'];
            $cep = $linhaEmpresa['cod_cep'];
            $numEnd = $linhaEmpresa['num_end'];
            $complemento = $linhaEmpresa['compl_end'];
            $link = $linhaEmpresa['link_maps'];
            $email = $linhaEmpresa['email_empresa'];
            $bairro = $linhaEmpresa['nome_bairro'];
            $logradouro = $linhaEmpresa['nome_logra'];
            $cidade = $linhaEmpresa['nome_cidade'];

        }
        $_SESSION['codEmpresa'] = $codEmpresa;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senhaEmpresa'] = $senhaEmpresa;
        $_SESSION['nomeEmpresa'] = $nomeEmpresa;
        $_SESSION['codIdent'] = $codIdent;
        $_SESSION['telefone'] = $telefone;
        $_SESSION['site'] = $site;
        $_SESSION['descricao'] = $descricao;
        $_SESSION['cep'] = $cep;
        $_SESSION['numEnd'] = $numEnd;
        $_SESSION['complemento'] = $complemento;
        $_SESSION['link'] = $link;
        $_SESSION['email'] = $email;
        $_SESSION['bairro'] = $bairro;
        $_SESSION['logradouro'] = $logradouro;
        $_SESSION['cidade'] = $cidade;

        header("Location: ../alterar_restaurante.php");
        } else {
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
        header("Location: ../login.php?msg=1");
        }

        }
    }
}


if(isset($_POST["email"])){
    $senha = $_POST["senha"];
    $user = $_POST["email"];

    Logando($user, $senha, $conn);
}
else{
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
    unset($_SESSION['status']);
    unset($_SESSION['cod']);
    unset($_SESSION['usuario']);
    unset($_SESSION['nome']);
    unset($_SESSION['senha']);
    unset($_SESSION['url']);
    unset($_SESSION['tipo']);
    unset($_SESSION['email']);
    session_destroy();
    header("Location: ../login.php?msg=1");
}

