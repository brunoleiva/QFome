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

    <link rel="stylesheet" media="screen and (max-width:480px) " href="css/cadastro/style480_portrait_cadastro.css">
    <link rel="stylesheet" media="screen and (min-width:481px) and (max-width:768px)" href="css/cadastro/style768_portrait_cadastro.css">
    <link rel="stylesheet" media="screen and (min-width:769px) and (max-width:1024px)" href="css/cadastro/style1024_portrait_cadastro.css">
    <link rel="stylesheet" media="screen and (min-width:1025px)" href="css/cadastro/style1025_portrait_cadastro.css">
     

      
</head>
<body>
<div id=container>

<!-- Cabeçalho -->
  <header> 
     <picture><a href="index.php"> <img src="imagens_png/logo3.png" alt="logo que fome"></a></picture>
     <a href="index.php" id="fechar"><img src="imagens_png/close.png" alt=""></a>
  </header>
  <div class="quadrado-atras"></div> 

  <!-- Titulo da página --> 
  <div class="titulo-principal-cadastro">
  <h1>CADASTRO</h1>
  </div>

  <!-- Navegação para alterar o formulario-->
  <nav id="muda-usuario">
    <a href="javascript:muda(0)" id="usuario">USUÁRIO</a>
    <a href="javascript:muda(1)" id="empresa" style="background-color:white;color:orange;">EMPRESA</a>
  </nav>

 
  <main>
     <!-- Formulário do Usuário Normal-->
    <section id="cadastro-usuario-normal">
      <form action="funcoes/cadastrar_cliente.php" method="post" id="" enctype="multipart/form-data">
          <input type="text"  name="nome" id="nome" placeholder="NOME" required>
          <input type="email" name="email" id="email" placeholder="EMAIL" required>
          <input type="password" name="senha" id="senha" placeholder="SENHA" required>
          <input type="submit" id="btn-normal" value="CADASTRAR">
          <?php
          if(isset($_GET['msg'])){
          $msg= $_GET["msg"];
          
           if ($msg == 1) { ?>
             <div id="msg-login-existente"> Email já existe</div>
             <?php
          } else {
            if ($msg == 2) { ?>
                <div id="msg-login-existente"> Confira se preencheu os campos</div>
                <?php
             } else {
                 # code...
             }
          }}
           ?>
      </form>   
    </section>
    <!--  Formulário do Usuário empresa-->
    <section id="cadastro-usuario-empresa">
        <form action="funcoes/cadastrar_empresa.php" method="post" id=""  enctype="multipart/form-data">
        <!-- informações básicas-->
        <fieldset>
        <input type="text" name="nome_empresa" id="nome_empresa" placeholder="NOME DA EMPRESA" required>
        <input type="email" name="email" id="email_empresa" placeholder="EMAIL DA EMPRESA" required>
        <input type="password" name="senha_empresa" id="senha_empresa" placeholder="SENHA" required>
        <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ" required>
        <input type="text" name="telefone" id="telefone" placeholder="TELEFONE" required> 
        <input type="button" class="proximo numero-um" value="proximo">

        </fieldset>
        <!-- localidade-->
        <fieldset>
          <input type="text" id="cep" name="cep" value="" placeholder="CEP">
          <input type= "text" id="bairro" name="bairro" value="" placeholder="BAIRRO">
          <input type="text" id="rua" name="rua" value="" placeholder="RUA">
          <input type="text" id="cidade" name="cidade" value="" placeholder="CIDADE">
          <input type="text" id="numero" name="numero" value="" placeholder="NUMERO">
          <input type="text" id="complemento" name="complemento" value="" placeholder="COMPLEMENTO">
          <input type="text" name="link" value="" placeholder="LINK DO GOOGLE MAPS">
          <input type="button" name="" value="anterior" class="anterior">
          <input type="button" name="" value="proximo" class="proximo">
    
         </fieldset>
         <!-- Imagens que serão usadas para a exibição da empresa -->
         <fieldset>
             <label for="img-principal" id="imagem-principal">
             <img src="imagens_png/inserir_foto.png" alt="" id="some">
                <img id="myimage" style="width:100%;height:100%; border-radius:50%; position:relative;" alt="">
              </label>
                 <input type="file" name="img" value="" placeholder="IMAGEM principal" id="img-principal" onchange="onFileSelected(event)">
              <label for="img1">IMAGEM 1</label>
                 <input type="file" name="img1" value="" placeholder="IMAGEM principal" id="img1" >
                 <input type="text" name="" id="" placeholder="DESCRIÇÃO DA IMAGEM">
              <label for="img2">IMAGEM 2</label>
                 <input type="file" name="img2" value="" placeholder="IMAGEM principal" id="img2">
                 <input type="text" name="" id="" placeholder="DESCRIÇÃO DA IMAGEM">
              <label for="img3">IMAGEM 3 </label>
                 <input type="file" name="img3" value="" placeholder="IMAGEM principal" id="img3">
                 <input type="text" name="" id="" placeholder="DESCRIÇÃO DA IMAGEM">
            
              <input type="button" name="" value="anterior"  class="anterior">
              <input type="button" name="" value="proximo" class="proximo">
             
         </fieldset>
         <!-- Escolha das categorias a qual a empresa se encaixa -->
         <fieldset>
              <h2 id="titulo-categorias">escolha sua categoria</h2>
            <div class="muda-tudo">
              <input type="checkbox" name="hamburgueria" value="3" placeholder="" id="hamburgueria">
              <label for="hamburgueria">
                 <img src="imagens_png/burguer.png" alt="">
                 <h2>hamburgueria</h2>
              </label>
              <input type="checkbox" name="temakeria" value="9" placeholder="" id="temakeria">
              <label for="temakeria">
                  <img src="imagens_png/japa.png" alt="">
                  <h2>temakeria</h2>
              </label>
              <input type="checkbox" name="pizzaria" value="1" placeholder="" id="pizzaria">
              <label for="pizzaria">
                  <img src="imagens_png/pizza.png" alt="">
                  <h2>pizzaria</h2>
              </label>
              <input type="checkbox" name="arabe" value="10" placeholder="" id="arabe">
              <label for="arabe">
                  <img src="imagens_png/arabe.png" alt="">
                   <h2>Árabe</h2>
              </label>
              <input type="checkbox" name="mexicana" value="8" placeholder="" id="mexicana">
              <label for="mexicana">
                  <img src="imagens_png/mexicana.png" alt="">
              <h2>mexicana</h2>
              </label>
              <input type="checkbox" name="restaurante" value="7" placeholder="" id="restaurante">
              <label for="restaurante">
                  <img src="imagens_png/restaurante.png" alt="">
              <h2>restaurante</h2>
              </label>
              <input type="checkbox" name="vegetariano" value="4" placeholder="" id="vegano-vegetariano">
              <label for="vegano-vegetariano">
                   <img src="imagens_png/vegeta_vegan.png" alt="">
                     <h2>vegetariano</h2>
              </label>
              <input type="checkbox" name="churrascaria" value="2" placeholder="" id="churrascaria">
              <label for="churrascaria">
                  <img src="imagens_png/churras.png" alt="">
                  <h2>churrascaria</h2>
              </label>
              <input type="checkbox" name="cafeteria" value="5" placeholder="" id="cafeteria">
              <label for="cafeteria">
                  <img src="imagens_png/cafeteria.png" alt="">
                   <h2>cafeteria</h2>
              </label>
              <input type="checkbox" name="bares" value="6" placeholder="" id="bares">
              <label for="bares">
                  <img src="imagens_png/bares.png" alt="">
                <h2>bares</h2>
              </label>
            </div>


              <input type="button" name="" value="anterior"  class="anterior ant-um">
              <input type="submit" name="" class="cadastrar cad-um" value="CADASTRAR" >
              <?php
          if(isset($_GET['msg'])){
          $msg= $_GET["msg"];
          
           if ($msg == 1) { ?>
                <div id="msg-um">O email já está cadastrado</div>
             <?php
          } else {
            if ($msg == 2) { ?>
                <div id="msg-um">Revise seus dados:(CEP, e-mail, senha...)</div>
                <?php
             } else {

             }
          }}
           ?>
           </fieldset> 
  
      </form>
    </section>
  </main>
  

    <script src="script/jquery/jquery-3.3.1.min.js"></script>
    <script src="script/jquery/jquery.mask.js"></script>
    <script src="script/jquery/jquery.mask.min.js"></script>
    <script src="script/cadastro/troca.js"></script>
    <script src="script/cadastro/mascara.js"></script>
    <script src="script/cadastro/muda_form.js"></script>
    <script src="script/cadastro/viacep.js"></script>
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
           document.getElementById("imagem-principal").style.border="1px solid orange";
           reader.readAsDataURL(selectedFile);
           
       }
       </script>
</div>   
</body>
</html>