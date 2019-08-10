<?php
require_once 'conect.php';
require 'restricao.php';
$conn = Connection();

function Denunciar($cod_usu, $cod_empresa, $data, $descricao, $conn){
        $stg = "INSERT INTO denuncia_empresa (cod_usu, cod_empresa, data_hora_denuncia, desc_denuncia) VALUES
        ('$cod_usu', '$cod_empresa', '$data','$descricao')";
        $result = $conn->prepare($stg);
        // echo $stg;
        $result->execute();
        $cod= $_GET['cod'];
        $cat= $_GET['cat'];
        header("Location: ../restaurante.php?c=$cat&cod=$cod");
        
}


if (isset($_SESSION['status']) == true) {
    if ($descricao !== "") {

if(isset($_POST["descricao"])){
    $descricao = $_POST['descricao'];
    $cod_usu = $_SESSION['cod'];
    $cod_empresa = $_GET['cod'];
    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d H:i:s');

    Denunciar($cod_usu, $cod_empresa, $data, $descricao, $conn);
    
}else{
   header("Location: ../categoria.php");
}
} else {
    header("Location: ../categoria.php");
}
} else {
   header("Location: ../login.php");
  }