<?php
require_once 'conect.php';
require 'restricao.php';
$conn = Connection();

function Comentar($cod_usu, $cod_empresa, $data, $descricao, $conn){
        $stg = "INSERT INTO comenta_empresa (cod_usu, cod_empresa, data_hora_comentario, desc_comentario, cod_status_comentario) VALUES
        ('$cod_usu', '$cod_empresa', '$data','$descricao','A')";
        $result = $conn->prepare($stg);
        $result->execute();
        $cod= $_GET['cod'];
    $cat= $_GET['cat'];
    header("Location: ../restaurante.php?c=$cat&cod=$cod");
        
}
$descricao = $_POST['descricao'];

if (isset($_SESSION['status']) == true) {
    if ($descricao !== "") {
if(isset($_POST["descricao"])){
    $cod_usu = $_SESSION['cod'];
    $cod_empresa = $_GET['cod'];
    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d H:i:s');

    Comentar($cod_usu, $cod_empresa, $data, $descricao, $conn);
    
}else{
    $cod= $_GET['cod'];
    $cat= $_GET['cat'];
    header("Location: ../restaurante.php?c=$cat&cod=$cod");
}
} else {
    $cod= $_GET['cod'];
    $cat= $_GET['cat'];
    header("Location: ../restaurante.php?c=$cat&cod=$cod");
}
} else {
    header("Location: ../login.php");
  }