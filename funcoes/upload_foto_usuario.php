<?php
include 'conect.php';
include 'restricao.php';



 $pasta  = "../img_usuarios/";
 $pastamsm = "img_usuarios/";
 $nome = sha1(microtime());
 //echo $nome;

 $cod = $_SESSION['cod'];

 if(!file_exists($pasta . $nome)){
    $file = $pasta . basename($_FILES['img']['name']);
    $fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $types = array("jpg", "png", "gif", "jpeg");
    if(in_array($fileType, $types)){
        if(move_uploaded_file($_FILES['img']['tmp_name'], $pasta . $nome . '.' . $fileType)){
            $novoNome = 'img_usuarios/' . $nome . '.' . $fileType;
            $str = "UPDATE usuario set url_foto_usu = '$novoNome' where cod_usu = $cod";
            $conn = Connection();
            $result = $conn->prepare($str);
            if($result->execute()){
                $_SESSION['url'] = $pastamsm . $nome . '.' . $fileType;
                header('Location: ../perfil_usuario_normal.php');
            }
           // echo $str;
            
        }
        else{
            header("Location: ../alterar_normal.php?msg=1");
        }
    }
    else{
        header("Location: ../alterar_normal.php?msg=1");
    }
 }
 else
 {
    header("Location: ../alterar_normal.php?msg=1");
 }