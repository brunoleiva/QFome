<?php
session_start();
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

    <link rel="stylesheet" media="screen and (max-width:480px)" href="css/pagina_recuperar_senha/style480_portrait_pagina_recuperar_senha.css">
    <link rel="stylesheet" media="screen and (min-width:481px) and (max-width:768px)" href="css/pagina_recuperar_senha/style768_portrait_pagina_recuperar_senha.css">
    <link rel="stylesheet" media="screen and (min-width:769px) and (max-width:1024px)" href="css/pagina_recuperar_senha/style1024_portrait_pagina_recuperar_senha.css">
    <link rel="stylesheet" media="screen and (min-width:1025px)" href="css/pagina_recuperar_senha/style1025_portrait_pagina_recuperar_senha.css">
                                           


    <script src="script/js.js"></script>
</head>
<body>
<div id=container>
<section>
      <header>
            <nav id="menu-principal">
    <a href="<?php if (isset($_SESSION['cep']) == true) {
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
         <figure>
           <img src="imagens_png/chavee.png" alt="">
           <figcaption><h1>INSIRA O EMAIL PARA RECUPERAR A SENHA</h1></figcaption>
         </figure>
      </header>
      <form action="funcoes/recuperar_senha.php" method="post">
              <input type="email" name="email" id="" placeholder="EMAIL">
              <?php
          if(isset($_GET['msg'])){
          $msg= $_GET["msg"];
          
           if ($msg == 1) { ?>
             <div id="msg-login-existente"> Email não cadastrado!</div>
             <?php
          } else {
            
          }}
           ?>
              <input type="submit" value="Enviar">

      </form>      
             


</section>

</div>   
</body>
</html>