<?php

function Connection () {
    $host = "localhost";
    $db = "anexocomunicacao_qf";
    $user = "anexocomunicacao_qf";
    $pass = "f,E&3i=Q$!&2";
    $conn =  new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    return $conn;
}


