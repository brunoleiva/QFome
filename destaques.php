<?php
require_once 'funcoes/conect.php';
session_start();

$conn = Connection();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Qfome</title>
	<meta charset="UTF-8">
    <meta name=author content="">
    <meta name=description content="">
    <meta name=keywords content="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/default.css">

    <link rel="stylesheet" media="screen and (max-width:480px) " href="css/destaques/style480_portrait_destaques.css">
    <link rel="stylesheet" media="screen and (min-width:481px) and (max-width:768px)" href="css/destaques/style480_portrait_destaques.css">
    <link rel="stylesheet" media="screen and (min-width:769px) and (max-width:1024px)" href="css/pagina_escolha/style1024_portrait_pagina_escolha.css">
    <link rel="stylesheet" media="screen and (min-width:1025px)" href="css/pagina_escolha/style1025_portrait_pagina_escolha.css">
</head>
<body>
<div id=container>
  <section>
     <header>
         <h1>DESTAQUES DO SITE</h1>
          <nav id="menu-principal">
    <a href="<?php
        if (isset($_SESSION['cep']) == true) {
      echo'alterar_restaurante.php';
    } else {
      if (isset($_SESSION['status']) == true) {
        echo'perfil_usuario_normal.php';
      } else {
        echo'pagina_escolha.php';
      }
    }
    ?>" class="icones"><img src="imagens_png/icone_login.png" alt=""></a>
    <a href="index.php" id="logo"><img src="imagens_png/logo3.png"></a>
    <a href="menu.php" class="icones" ><img src="imagens_png/menu_hamburguer.png" alt=""></a>
  </nav>
     </header>
     <?php

    $result = $conn->prepare("SELECT * FROM empresa 
    INNER JOIN categoria_empresa ON (empresa.cod_empresa = categoria_empresa.cod_empresa) 
    INNER JOIN categoria ON (categoria.cod_cat = categoria_empresa.cod_cat) 
    INNER JOIN logradouro ON (logradouro.cod_cep = empresa.cod_cep) 
    WHERE empresa.nome_empresa='Pizza Hut'");
    $result->execute(); 
		$row = $result->fetch(PDO::FETCH_OBJ);
	?>
    <article class="restaurante">
    <picture>
        <a href="restaurante.php?c=<?php echo $row->nome_cidade ; ?>&cod=<?php echo $row->cod_empresa ; ?>"> 
        <img src="<?php
        $cod_empresa = $row->cod_empresa;
         $resultado = $conn->prepare("SELECT * FROM arquivos_emp where
         cod_empresa= '$cod_empresa' and 
        cod_arqe=(select min(cod_arqe) from arquivos_emp where cod_empresa='$cod_empresa')");
        $resultado->execute();
        $linha = $resultado->fetch(PDO::FETCH_OBJ);
        echo $linha->nome_arqe . '.' . $linha->extensao_arqe;
        ?>" width="150" heigth="100vh" alt=""></a> 
        </picture>
        <a href="restaurante.php?c=<?php echo $row->nome_cidade ; ?>&cod=<?php echo $row->cod_empresa ; ?>"> 
  <h2><?php echo $row->nome_empresa; ?></h2></a>
  <div id="posicao">
             1
       </div>

  <a href="restaurante.php?c=<?php echo $row->nome_cidade ; ?>&cod=<?php echo $row->cod_empresa ; ?>"><p>
     <address>
     <?php echo $row->nome_logra .', ' . $row->num_end . ', ' . $row->nome_bairro; ?><br>
     <?php echo $row->nome_cidade . ', ' . $row->cod_cep; ?>
     </address>
   </p>
  </a> 
</article>

<?php
$result = $conn->prepare("SELECT * FROM empresa 
INNER JOIN categoria_empresa ON (empresa.cod_empresa = categoria_empresa.cod_empresa) 
INNER JOIN categoria ON (categoria.cod_cat = categoria_empresa.cod_cat) 
INNER JOIN logradouro ON (logradouro.cod_cep = empresa.cod_cep) 
WHERE empresa.nome_empresa='Seiko'");
$result->execute(); 
$row = $result->fetch(PDO::FETCH_OBJ);
?>
<article class="restaurante">
<picture>
    <a href="restaurante.php?c=<?php echo $row->nome_cidade ; ?>&cod=<?php echo $row->cod_empresa ; ?>"> 
    <img src="<?php
    $cod_empresa = $row->cod_empresa;
     $resultado = $conn->prepare("SELECT * FROM arquivos_emp where
     cod_empresa= '$cod_empresa' and 
    cod_arqe=(select min(cod_arqe) from arquivos_emp where cod_empresa='$cod_empresa')");
    $resultado->execute();
    $linha = $resultado->fetch(PDO::FETCH_OBJ);
    echo $linha->nome_arqe . '.' . $linha->extensao_arqe;
    ?>" width="150" heigth="100vh" alt=""></a> 
    </picture>
    <a href="restaurante.php?c=<?php echo $row->nome_cidade ; ?>&cod=<?php echo $row->cod_empresa ; ?>"> 
<h2><?php echo $row->nome_empresa; ?></h2></a>
<div id="posicao">
         2
   </div>

<a href="restaurante.php?c=<?php echo $row->nome_cidade ; ?>&cod=<?php echo $row->cod_empresa ; ?>"><p>
 <address>
 <?php echo $row->nome_logra .', ' . $row->num_end . ', ' . $row->nome_bairro; ?><br>
 <?php echo $row->nome_cidade . ', ' . $row->cod_cep; ?>
 </address>
</p>
</a> 
</article>

<?php
$result = $conn->prepare("SELECT * FROM empresa 
INNER JOIN categoria_empresa ON (empresa.cod_empresa = categoria_empresa.cod_empresa) 
INNER JOIN categoria ON (categoria.cod_cat = categoria_empresa.cod_cat) 
INNER JOIN logradouro ON (logradouro.cod_cep = empresa.cod_cep) 
WHERE empresa.nome_empresa='Be Veg'");
$result->execute(); 
$row = $result->fetch(PDO::FETCH_OBJ);
?>
<article class="restaurante">
<picture>
    <a href="restaurante.php?c=<?php echo $row->nome_cidade ; ?>&cod=<?php echo $row->cod_empresa ; ?>"> 
    <img src="<?php
    $cod_empresa = $row->cod_empresa;
     $resultado = $conn->prepare("SELECT * FROM arquivos_emp where
     cod_empresa= '$cod_empresa' and 
    cod_arqe=(select min(cod_arqe) from arquivos_emp where cod_empresa='$cod_empresa')");
    $resultado->execute();
    $linha = $resultado->fetch(PDO::FETCH_OBJ);
    echo $linha->nome_arqe . '.' . $linha->extensao_arqe;
    ?>" width="150" heigth="100vh" alt=""></a> 
    </picture>
    <a href="restaurante.php?c=<?php echo $row->nome_cidade ; ?>&cod=<?php echo $row->cod_empresa ; ?>"> 
<h2><?php echo $row->nome_empresa; ?></h2></a>
<div id="posicao">
         3
   </div>

<a href="restaurante.php?c=<?php echo $row->nome_cidade ; ?>&cod=<?php echo $row->cod_empresa ; ?>"><p>
 <address>
 <?php echo $row->nome_logra .', ' . $row->num_end . ', ' . $row->nome_bairro; ?><br>
 <?php echo $row->nome_cidade . ', ' . $row->cod_cep; ?>
 </address>
</p>
</a> 
</article>

    
  </section>
  <script src="script/transicao/jquery.smoothState.min.js"></script>

</div>
</body>
</html>
