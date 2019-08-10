<?php
require_once 'conect.php';
require 'restricao_empresa.php';
$conn = Connection();

    
function AtualizarInfos($nome, $cep, $bairro, $cidade, $logradouro, $num, $complemento, $cnpj, $tel, $site, $conn){
    $codEmpresa = $_SESSION['codEmpresa'];
        $result = $conn->prepare("INSERT INTO logradouro (cod_cep, nome_logra, nome_bairro, nome_cidade) VALUES('$cep', '$logradouro', '$bairro', '$cidade')");
        $result->execute();
       
        $result1 = $conn->prepare("UPDATE empresa set nome_empresa='$nome', cod_cep='$cep', num_end='$num', compl_end='$complemento', cod_ident_empresa='$cnpj',
        tel_empresa='$tel', site_empresa='$site' where cod_empresa='$codEmpresa'");
        $result1->execute();

        $_SESSION['nomeEmpresa'] = $nome;
        $_SESSION['codIdent'] = $cnpj;
        $_SESSION['telefone'] = $tel;
        $_SESSION['site'] = $site;
        $_SESSION['cep'] = $cep;
        $_SESSION['numEnd'] = $num;
        $_SESSION['complemento'] = $complemento;
        $_SESSION['bairro'] = $bairro;
        $_SESSION['logradouro'] = $logradouro;
        $_SESSION['cidade'] = $cidade;

        header("Location: ../alterar_restaurante.php");
    }


function ValidaEmail ($email2, $conn){
    $result = $conn->prepare("SELECT * FROM empresa WHERE email_empresa = '$email2'");
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
      //  header("Location: ../alterar_normal.php");
    }
    else{
        $codEmpresa = $_SESSION['codEmpresa'];
        $sql="UPDATE empresa set email_empresa='$email2' where cod_empresa='$codEmpresa'";
   $result = $conn->prepare("$sql");
   $result->execute();
   $_SESSION['email'] = $email2;   
   header("Location: ../alterar_restaurante.php");
    }
    
}
function AtualizarSenha($senha2,$conn){
         
    $codEmpresa = $_SESSION['codEmpresa'];
    $sql="UPDATE empresa set senha_empresa='$senha2' where cod_empresa='$codEmpresa'";
   $result = $conn->prepare("$sql");
   $result->execute();
   $_SESSION['senhaEmpresa'] = $senha2;
  header("Location: ../alterar_restaurante.php");
}
function AtualizarDesc($descricao,$conn){
         
    $codEmpresa = $_SESSION['codEmpresa'];
    $sql="UPDATE empresa set desc_empresa='$descricao' where cod_empresa='$codEmpresa'";
   $result = $conn->prepare("$sql");
   $result->execute();
   $_SESSION['descricao'] = $descricao;
  header("Location: ../alterar_restaurante.php");
}
function AtualizarLink($link,$conn){
         
    $codEmpresa = $_SESSION['codEmpresa'];
    $sql="UPDATE empresa set link_maps='$link' where cod_empresa='$codEmpresa'";
   $result = $conn->prepare("$sql");
   $result->execute();
   $_SESSION['link'] = $link;
  header("Location: ../alterar_restaurante.php");
}

function CadastrarArquivos($img, $conn){

    if ($img == "img0") {
        $cod_arqe = $_POST['codigo0'];
    } else {
        if ($img == "img1") {
            $cod_arqe = $_POST['codigo1'];
        } else {
            if ($img == "img2") {
                $cod_arqe = $_POST['codigo2'];
            } else {
                if ($img == "img3") {
                    $cod_arqe = $_POST['codigo3'];
                } else {
                }
            }
        }
    }
    
 $pasta  = "../img_empresa/";
 $pastamsm = "img_empresa/";
 $nome = sha1(microtime());
 //echo $nome;
 if(!file_exists($pasta . $nome)){
    $file = $pasta . basename($_FILES["$img"]['name']);
    $extensao_arqe = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $types = array("jpg", "png", "gif");
    if(in_array($extensao_arqe, $types)){
        if(move_uploaded_file($_FILES["$img"]['tmp_name'], $pasta . $nome . '.' . $extensao_arqe)){
         $novoNome = 'img_empresa/' . $nome;
         $string="UPDATE arquivos_emp SET nome_arqe='$novoNome', extensao_arqe='$extensao_arqe' 
         WHERE cod_arqe='$cod_arqe'";
        $result = $conn->prepare("$string");
        $result->execute();
            echo $string;
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


if(isset($_POST["nome"])){
    $cep = $_POST['cep'];
    $nome = $_POST['nome'];
    $bairro = $_POST['bairro'];
    $logradouro = $_POST['rua'];
    $cidade = $_POST['cidade'];
    $num = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $cnpj = $_POST['cnpj'];
    $tel = $_POST['telefone'];
    $site = $_POST['site_empresa'];

    AtualizarInfos($nome, $cep, $bairro, $cidade, $logradouro, $num, $complemento, $cnpj, $tel, $site, $conn);

}else{  
    if (isset($_POST["email"])) {
        $email = $_POST['email'];
        $email1 = $_POST['email1'];
        $email2 = $_POST['email2'];
        if($email1 == $email2){
        AtualizarEmail($email2,$conn);
        }else{
    header("Location: ../alterar_restaurante.php?msg=1");  
        }
    } else {
        if (isset($_POST["senha"])) {
            $senha = $_POST['senha'];
            $senha1 = $_POST['senha1'];
            $senha2 = $_POST['senha2'];
            if($senha1 == $senha2){
                AtualizarSenha($senha2,$conn);
                }else{
            header("Location: ../alterar_restaurante.php?msg=2");  
                }
            }else{
                if (isset($_POST["descricao"])) {
                    $descricao = $_POST['descricao'];
                        AtualizarDesc($descricao,$conn);       
                    }else{
                        if (!empty($_FILES['img0']['name'])){
                            $img = 'img0';
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
                        
                                                    
            }
        }
    }
}