<?php
require_once 'conect.php';
require 'restricao_adm.php';
$conn = Connection();

function Excluir($cod_usu, $conn){
    $string="SELECT * FROM usuario where cod_usu='$cod_usu' and cod_status_usu='A'";
      $Excluir = $conn->prepare("$string");
      $Excluir->execute();
      $count=$Excluir->rowCount();
      if($count == 0){
        $stg = "UPDATE usuario set cod_status_usu='A' where cod_usu='$cod_usu'";
        $result = $conn->prepare($stg);
        $result->execute();
      }else{
        $stg = "UPDATE usuario set cod_status_usu='I' where cod_usu='$cod_usu'";
        $result = $conn->prepare($stg);
        $result->execute();
      }

         header("Location: ../gerenciamento_usuario_normal.php");
        
}
function ExcluirEmpresa($cod_empresa, $conn){
    $string="SELECT * FROM empresa where cod_empresa='$cod_empresa' and cod_status_empresa='A'";
      $Excluir = $conn->prepare("$string");
      $Excluir->execute();
      $count=$Excluir->rowCount();
      if($count == 0){
        $stg = "UPDATE empresa set cod_status_empresa='A' where cod_empresa='$cod_empresa'";
        $result = $conn->prepare($stg);
        $result->execute();
      }else{
        $stg = "UPDATE empresa set cod_status_empresa='I' where cod_empresa='$cod_empresa'";
        $result = $conn->prepare($stg);
        $result->execute();
      }

         header("Location: ../gerenciamento_usuario_empresa.php");
        
}

if (isset($_GET['cod'])) {
    $cod_usu = $_GET['cod'];
    Excluir($cod_usu, $conn);

}else{
    if (isset($_GET['cod_empresa'])) {
        $cod_empresa = $_GET['cod_empresa'];
        ExcluirEmpresa($cod_empresa, $conn);
    }
}