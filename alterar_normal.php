<?php
require 'funcoes/restricao.php';
    $nomeUsuario = $_SESSION['nome'];
    $emailUsuario = $_SESSION['email'];
    $url = $_SESSION['url'];
    
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

    <link rel="stylesheet" media="screen and (max-width:480px) " href="css/pagina_alterar_perfil_usuario_normal/style480_portrait_pagina_alterar_perfil_usuario_normal.css">
    <link rel="stylesheet" media="screen and (min-width:481px) and (max-width:768px)" href="css/pagina_alterar_perfil_usuario_normal/style768_portrait_pagina_perfil_usuario_normal.css">
    <link rel="stylesheet" media="screen and (min-width:769px) and (max-width:1024px)" href="css/pagina_alterar_perfil_usuario_normal/style1024_portrait_pagina_perfil_usuario_normal.css">
    <link rel="stylesheet" media="screen and (min-width:1025px)" href="css/pagina_alterar_perfil_usuario_normal/style1366_portrait_pagina_perfil_usuario_normal.css">
    
</head>
<body>
<div id=container>
  <section>
    <header id="cabecalho">
      
      <div id="salvar-sair"> 
         
           <div id="parte-cima">
          <a href="perfil_usuario_normal.php"><img src="imagens_png/seta.png" alt="" id="seta"></a>
          <a href="funcoes/logout.php">SAIR</a>
          
        </div>
      
      </div>
      <form action="funcoes/upload_foto_usuario.php" method="post" enctype="multipart/form-data">
      <div id="caixa">
        
      <label id="imagem"> 
        <img src="<?php echo $url; ?>" alt="" id="some" class="picture">
        <img id="myimage" style="width:100%;height:100%; border-radius:50%; position:relative;display:none;" alt="">
        <figcaption><input type="submit" class="confirmar" value="Salvar"></figcaption>
      </label>
      <div id="formulario">
        <label for="enviar"><img src="imagens_png/camera_usuario.png" alt=""></label>
         <input type="file" name="img" id="enviar" onchange="onFileSelected(event)">
      </div>
      </form>
        </div>
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
      </header>
      <?php
          if(isset($_GET['msg'])){
          $msg= $_GET["msg"];
          
           if ($msg == 1) { ?>
                    <div class="msg primeiro">Arquivo não permitido, tente de novo!</div> 
             <?php
          }}
           ?>
        <div id="parte-dois">
          <form action="funcoes/update_usuario.php" method="post">
               <input type="text" name="nome" id=""  placeholder="NOME" value="<?php echo $nomeUsuario; ?>" required>
               <input type="submit" class="confirmar" value="Salvar nome">
          </form>    
          <form action="funcoes/update_usuario.php" method="post">
               <input type="email" name="email" id="" placeholder="EMAIL" value="<?php echo $emailUsuario; ?>" required>
               <input type="email" name="email1" id="" placeholder="NOVO EMAIL" required>
               <input type="email" name="email2" id="" placeholder="CONFIRMAR EMAIL" required>
               <?php
          if(isset($_GET['msg'])){
          $msg= $_GET["msg"];
           if ($msg == 2) { ?>
            <div class="msg">Email já existe</div>
             <?php
          }else{
            if ($msg == 3) { ?>
                <div class="msg">Um dos emails está incorreto</div> 
             <?php
          }
          }}
           ?>
               <input type="submit" class="confirmar" value="Salvar email">
          </form>   
            <!-- mensagens de erros -->
            
               <header id="aparecer">
                 <h2>Alterar senha</h2>    
                </header>
                <form action="funcoes/update_usuario.php" method="post">
               <input type="password" name="senha" class="senha" placeholder="SENHA ATUAL" required>
               <input type="password" name="senha1" class="senha" placeholder="SENHA NOVA" required>
               <input type="password" name="senha2" class="senha" placeholder="CONFIRMAR SENHA NOVA" required>
               
               <input type="submit" class="senha confirmar"value="salvar senha">
               <?php
          if(isset($_GET['msg'])){
          $msg= $_GET["msg"];
          
           if ($msg == 4) { ?>
             <div class="msg">Senhas não conferem</div>   
             <?php
          }}
           ?>
               </form>    
              </div>
  </section>
  <script src="script/jquery/jquery-3.3.1.min.js"></script>
  <script src="script/alterar_perfil_usuario_normal/togle.js"></script>    
  <script>
       function onFileSelected(event){
        
           var selectedFile = event.target.files[0];
           var reader = new FileReader();
           var imgtag = document.getElementById("myimage");
           imgtag.title = selectedFile.name;
           reader.onload = function(event){
               imgtag.src = event.target.result;    
           };
           document.getElementById("some").style.display="none";
           document.getElementById("myimage").style.display="block";
           document.getElementById("myimage").style.border="1px solid orange";
           reader.readAsDataURL(selectedFile);
           
       }
       </script>

</div>
</body>
</html>
