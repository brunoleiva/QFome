<?php 
require 'funcoes/restricao_adm.php';


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

    <link rel="stylesheet" media="screen and (max-width:480px)" href="css/pagina_administrativa/style480_portrait_pagina_administrativa.css">
    <link rel="stylesheet" media="screen and (min-width:481px) and (max-width:768px)" href="css/style768_portrait.css">
    <link rel="stylesheet" media="screen and (min-width:769px) and (max-width:1024px)" href="css/style1024_portrait.css">
    <link rel="stylesheet" media="screen and (min-width:1025px)" href="css/style1025_portrait.css">
                                           


    <script src="script/js.js"></script>
</head>
<body>
<div id=container>
<section>
 <header>
   <hr> <h1>GERENCIAMENTO</h1> <hr>
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
 <article>
    <figure> <img src="imagens_png/denuncia_adm.png" alt=""></figure> 
    <a href="denuncias.php">DENÚNCIAS</a>
  </article>
  <div class="titulo-formulario"> <h2>CADASTRO DE <span>ADMINISTRADOR</span> </h2>  </div>
<form action="funcoes/cadastrar_adm.php" method="post">
   <input type="text" name="email" id="" placeholder="EMAIL">
   <input type="text" name="nome" id="" placeholder="USUÁRIO">
   <input type="password" name="senha" id="" placeholder="SENHA">
   <input type="password" name="senha2" id="" placeholder="CONFIRMAR SENHA">
    <input type="submit" value="ADICIONAR">
</form>

 

<div class="usuarios">
  VISUALIZAR <br>
  <span>CADASTRADOS</span>
  <hr>

  <a href="gerenciamento_usuario_normal.php">USUARIO</a>
  <a href="gerenciamento_usuario_empresa.php">EMPRESA</a>
</div>


</section>

</div>   
</body>
</html>