<?php

require_once 'conect.php';
require 'restricao.php';
$conn = Connection();

function Favoritar($cod_usu, $cod_empresa, $data, $conn){
    $string="SELECT * FROM favorita_empresa where cod_empresa='$cod_empresa' and cod_usu='$cod_usu'";
      $favorita = $conn->prepare("$string");
      $favorita->execute();
      $count=$favorita->rowCount();
      if($count == 0){
        $stg = "INSERT INTO favorita_empresa (cod_usu, cod_empresa, data_hora_favorita) VALUES
        ('$cod_usu', '$cod_empresa', '$data')";
        $result = $conn->prepare($stg);
        $result->execute();
      }else{
        $stg = "DELETE FROM favorita_empresa
        WHERE cod_empresa='$cod_empresa' and cod_usu='$cod_usu'";
        $result = $conn->prepare($stg);
        $result->execute();
      }

        
}

if (isset($_SESSION['status']) == true) {

    $cod_usu = $_SESSION['cod'];
    $cod_empresa = $_GET['cod_empresa'];
    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d H:i:s');

    Favoritar($cod_usu, $cod_empresa, $data, $conn);
    header("Location: ../perfil_usuario_normal.php");
} 