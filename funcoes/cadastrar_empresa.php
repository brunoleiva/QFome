<?php
require_once 'conect.php';
session_start();

$conn = Connection();

function CadastrarEmpresa($nome, $cnpj, $tel, $senha, $cep, $num, $complemento, $link, $email, $conn){
    if(ValidaEmail($email, $conn)){
        header("Location: ../cadastro.php?msg=1");
    }
    else{
        $result = $conn->prepare("INSERT INTO empresa (nome_empresa, cod_ident_empresa, tel_empresa, site_empresa, senha_empresa, cod_status_empresa, desc_empresa, cod_cep, num_end, compl_end, link_maps, email_empresa) 
        VALUES('$nome', '$cnpj', '$tel', '', '$senha', 'A', '', '$cep', '$num', '$complemento', '$link', '$email')");
      $result->execute();
    }
    
}
function ValidaEmail ($email, $conn){
    $result = $conn->prepare("SELECT * FROM empresa WHERE email_empresa = '$email'");
    $result->execute();
    $count=$result->rowCount();
    if($count == 1){
        return true;
    }else{
        return false;
    }
}

function CadastrarLogradouro($cep, $logradouro, $bairro, $cidade, $conn){
        $result = $conn->prepare("INSERT INTO logradouro (cod_cep, nome_logra, nome_bairro, nome_cidade) VALUES('$cep', '$logradouro', '$bairro', '$cidade')");
        $result->execute();
}


function CadastrarArquivos($img, $conn){
    $codEmpresa = $conn->prepare("SELECT * FROM empresa where cod_empresa=(SELECT MAX(cod_empresa) from empresa)");
    $codEmpresa->execute();
    $resultCodEmpresa = $codEmpresa->fetch();
    /*var_dump($resultadoSql);*/
    $cod_empresa = $resultCodEmpresa['cod_empresa'];

 $pasta  = "../img_empresa/";
 $pastamsm = "img_empresa/";
 $nome = sha1(microtime());
 //echo $nome;
 if(!file_exists($pasta . $nome)){
    $file = $pasta . basename($_FILES["$img"]['name']);
    $extensao_arqe = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $types = array("jpg", "png", "gif", "jpeg");
    if(in_array($extensao_arqe, $types)){
        if(move_uploaded_file($_FILES["$img"]['tmp_name'], $pasta . $nome . '.' . $extensao_arqe)){
         $novoNome = 'img_empresa/' . $nome;
         
        $result = $conn->prepare("INSERT INTO arquivos_emp (nome_arqe, extensao_arqe, cod_status_arqe, legenda_arqe, cod_empresa) VALUES('$novoNome', '$extensao_arqe','A','','$cod_empresa')");
        $result->execute();

        }
        else{
            echo 'NÃO FUNCIONOU !';
        }
    }
    else{
        echo 'TIPO NÃO PERMITIDO';
    }
 } else{
    echo "ERRO TENTE NOVAMENTE !";
 }

}


function CadastrarCategorias($cod_cat, $conn){
    $codEmpresa = $conn->prepare("SELECT * FROM empresa where cod_empresa=(SELECT MAX(cod_empresa) from empresa)");
    $codEmpresa->execute();

    $resultCodEmpresa = $codEmpresa->fetch();
    /*var_dump($resultadoSql);*/
    $cod_empresa = $resultCodEmpresa['cod_empresa'];

    
    $result = $conn->prepare("INSERT INTO categoria_empresa (cod_cat,cod_empresa) VALUES('$cod_cat','$cod_empresa')");
    $result->execute();
}




if(isset($_POST["cep"])){

    $cep = $_POST['cep'];
    $logradouro = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    CadastrarLogradouro($cep, $logradouro, $bairro, $cidade, $conn);

    if (isset($_POST["nome_empresa"])) {
    $cep = $_POST['cep'];
    $nome = $_POST['nome_empresa'];
    $cnpj = $_POST['cnpj'];
    $tel = $_POST['telefone'];
    $senha = $_POST['senha_empresa'];
    $num = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $link = $_POST['link'];
    $email = $_POST['email'];

     CadastrarEmpresa($nome, $cnpj, $tel, $senha, $cep, $num, $complemento, $link,$email, $conn);
    } 
    if(isset($_POST["hamburgueria"])) {
        $cod_cat = $_POST['hamburgueria'];
        CadastrarCategorias($cod_cat, $conn);
    }
    if(isset($_POST["temakeria"])) {
        $cod_cat = $_POST['temakeria'];
        CadastrarCategorias($cod_cat, $conn);
    }
    if (isset($_POST["pizzaria"])) {
        $cod_cat = $_POST['pizzaria'];
        CadastrarCategorias($cod_cat, $conn);
    }
    if (isset($_POST["mexicana"])) {
        $cod_cat = $_POST['mexicana'];
        CadastrarCategorias($cod_cat, $conn);
    }
    if (isset($_POST["restaurante"])) {
        $cod_cat = $_POST['restaurante'];
        CadastrarCategorias($cod_cat, $conn);
    }
    if (isset($_POST["vegetariano"])) {
        $cod_cat = $_POST['vegetariano'];
        CadastrarCategorias($cod_cat, $conn);
    }
    if (isset($_POST["churrascaria"])) {
        $cod_cat = $_POST['churrascaria'];
        CadastrarCategorias($cod_cat, $conn);
    }
    if (isset($_POST["cafeteria"])){
        $cod_cat = $_POST['cafeteria'];
        CadastrarCategorias($cod_cat, $conn);
    }
    if (isset($_POST["bares"])){
        $cod_cat = $_POST['bares'];
        CadastrarCategorias($cod_cat, $conn);
    }
    if (isset($_POST["arabe"])){
        $cod_cat = $_POST['arabe'];
        CadastrarCategorias($cod_cat, $conn);
    }
    if (!empty($_FILES['img']['name'])){
        $img = 'img';
        CadastrarArquivos($img, $conn);
    }
    
    if (!empty($_FILES['img1']['name'])){
        $img = 'img1';
        CadastrarArquivos($img, $conn);
    }
    if (!empty($_FILES['img2']['name'])){
        $img = 'img2';
        CadastrarArquivos($img, $conn);
    }
    if (!empty($_FILES['img3']['name'])){
        $img = 'img3';
        CadastrarArquivos($img, $conn);
    }
    
    header("Location: ../login.php");

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
    header("Location: ../cadastro.php?msg=2");
    
}
