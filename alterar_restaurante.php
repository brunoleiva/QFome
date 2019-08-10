
<?php
require_once 'funcoes/conect.php';
$conn = Connection();
require 'funcoes/restricao_empresa.php';
$codEmpresa = $_SESSION['codEmpresa'];
$usuario = $_SESSION['usuario'];
$senhaEmpresa = $_SESSION['senhaEmpresa']; 
$nomeEmpresa = $_SESSION['nomeEmpresa'];
$codIdent = $_SESSION['codIdent'];
$telefone = $_SESSION['telefone'];
$site = $_SESSION['site'];
$descricao = $_SESSION['descricao'];
$cep = $_SESSION['cep'];
$numEnd = $_SESSION['numEnd'];
$complemento = $_SESSION['complemento'];
$link = $_SESSION['link'];
$email = $_SESSION['email'];
$bairro = $_SESSION['bairro'];
$cidade = $_SESSION['cidade'];
$logradouro = $_SESSION['logradouro'];


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

    <link rel="stylesheet" media="screen and (max-width:480px)" href="css/pagina_alterar_perfil_usuario_restaurante/style480_portrait_pagina_alterar_perfil_usuario_restaurante.css">
    <link rel="stylesheet" media="screen and (min-width:481px) and (max-width:768px)" href="css/pagina_alterar_perfil_usuario_restaurante/style768_portrait_pagina_alterar_perfil_usuario_restaurante.css">
    <link rel="stylesheet" media="screen and (min-width:769px) and (max-width:1024px)" href="css/pagina_alterar_perfil_usuario_restaurante/style1024_portrait_pagina_alterar_perfil_usuario_restaurante.css">
    <link rel="stylesheet" media="screen and (min-width:1025px)" href="css/pagina_alterar_perfil_usuario_restaurante/style1025_pagina_portrait_alterar_perfil_usuario_restaurante.css">
    
</head>
<body>
<div id=container>
  <section>
         <a href="funcoes/logout.php" class="deslogar">Sair</a>
    <header>
        
     
        <hr> <h1>MEU PERFIL</h1><hr>
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
    <form action="funcoes/update_empresa.php" method="post">
  <input type="text" name="nome" id="nome" placeholder="NOME" class="preencher" value="<?php echo $nomeEmpresa; ?>" required>

  <div class="titulos">
      <h2>INFORMAÇÕES</h2>
  </div>

  <input type="text" id="cep" name="cep" value="<?php echo $cep; ?>" placeholder="CEP" class="preencher" required>
  <input type="text" id="bairro" name="bairro" value="<?php echo $bairro; ?>" placeholder="BAIRRO" class="preencher" required>
  <input type="text" id="rua" name="rua" value="<?php echo $logradouro; ?>" placeholder="RUA" class="preencher" required>
  <input type="text" id="cidade" name="cidade" value="<?php echo $cidade; ?>" placeholder="CIDADE" class="preencher" required>
  <input type="text" id="numero" name="numero" value="<?php echo $numEnd; ?>" placeholder="NUMERO"  class="preencher" required>
  <input type="text" id="complemento" name="complemento" value="<?php echo $complemento; ?>" placeholder="COMPLEMENTO" class="preencher">
  <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ" value="<?php echo $codIdent; ?>" class="preencher" required>
  <input type="text" name="telefone" id="telefone_um" value="<?php echo $telefone; ?>" placeholder="TELEFONE" class="preencher" required>
  <input type="text" name="site_empresa" id="telefone_um" value="<?php echo $site; ?>" placeholder="SITE EMPRESA" class="preencher"> 
        <input type="submit" value="Salvar">
      </form>
 <form action="funcoes/update_empresa.php" method="post" enctype="multipart/form-data">      
  <div class="titulos">
      <h2>IMAGENS</h2>
  </div>
  <div class="inserir-imagens">
  <?php   
  $stg = "SELECT * FROM arquivos_emp 
  WHERE cod_empresa = '$codEmpresa'";
  $result = $conn->prepare("$stg");
    $result->execute();
    $i=0;
		while($row = $result->fetch(PDO::FETCH_OBJ)){?>
      <input type="hidden" name="codigo<?php echo $i;?>" value="<?php echo $row->cod_arqe;?>">


<label for="arquivo"><img src="imagens_png/inserir_foto.png"><input type="file" name="img<?php echo $i;?>" id="arquivo"></label>

  
  <?php $i++;} ?>

  </div>
     <input type="submit" value="Salvar">
      </form>
  <div class="titulos">
      <h2>Alterar email</h2>
  </div>
  <form action="funcoes/update_empresa.php" method="post">
  <input type="text" id="email" name="email" value="<?php echo $email; ?>" placeholder="EMAIL" class="preencher" required>
  <input type="text" id="senha" name="email1" value="" placeholder="EMAIL NOVO" class="preencher" required>
  <input type="text" id="senha" name="email2" value="" placeholder="CONFIRMAR EMAIL" class="preencher" required>
  <input type="submit" value="Salvar">
        <?php
          if(isset($_GET['msg'])){
          $msg= $_GET["msg"];
           if ($msg == 1) { ?>
              <div id="msg-um">E-mails não conferem</div> 
             <?php
          }}
           ?>
  </form>

  <div class="titulos" id="alterar-senha">
      <h2>ALTERAR SENHA</h2>
  </div>
  <form action="funcoes/update_empresa.php" method="post">
  <input type="password" id="senha" name="senha" value="" placeholder="SENHA" class="preencher" required>
  <input type="password" id="senha" name="senha1" value="" placeholder="SENHA NOVO" class="preencher" required>
  <input type="password" id="senha" name="senha2" value=""  placeholder="CONFIRMAR SENHA" class="preencher" required>
  <input type="submit" class="ativa"  value="Salvar">
         <?php
          if(isset($_GET['msg'])){
          $msg= $_GET["msg"];
           if ($msg == 2) { ?>
              <div id="msg-um">Senhas não conferem</div> 
             <?php
          }}
           ?>
  </form>

    <form action="funcoes/update_empresa.php" method="post">  
  <div class="titulos">
      <h2>SOBRE</h2>
  </div>
  <textarea name="descricao" id="descricao" cols="30" rows="10"><?php echo $descricao;?></textarea>
        <input type="submit" value="Salvar">
      </form>
      
<form action="funcoes/update_empresa.php" method="post">      
<div class="titulos">
    <h2>LOCALIZAÇÃO</h2>
</div>
<input type="url" name="link" id="localizacao" value="<?php echo $link;?>" placeholder="digite o link do google maps aqui" required>
      <article class="mapa">
        <h2>MAPA</h2>
        <iframe src="<?php echo $link;  ?>" width="120%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
     </article>
    <input type="submit" value="Salvar">
</form>   

<script src="script/jquery/jquery-3.3.1.min.js"></script>
<script src="script/alterar_perfil_usuario_normal/togle.js"></script>   
<script src="script/cadastro/viacep.js"></script> 
  </section>


</div>
</body>
</html>