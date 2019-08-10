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

    <link rel="stylesheet" media="screen and (max-width:480px)" href="css/food_truck/style480_portrait_food_truck.css">
    <link rel="stylesheet" media="screen and (min-width:481px) and (max-width:768px)" href="css/food_truck/style768_portrait_food_truck.css">
    <link rel="stylesheet" media="screen and (min-width:769px) and (max-width:1024px)" href="css/food_truck/style1024_portrait_food_truck.css">
    <link rel="stylesheet" media="screen and (min-width:1025px)" href="css/food_truck/style1025_portrait_food_truck.css">
    
    
</head>
<body>
<div id=container>
<section>
    <header>
        <hr> <h1>BARUERI</h1> <hr>
        <nav id="menu-principal">
    <a href="pagina_escolha.php" class="icones"><img src="imagens_png/icone_login.png" alt=""></a>
    <a href="index.php" id="logo"><img src="imagens_png/logo3.png"></a>
    <a href="menu.php" class="icones" ><img src="imagens_png/menu_hamburguer.png" alt=""></a>
  </nav>
  
    </header>
    <div class="subtitulo">
       <figure >
           <img id="botao-modal" src="imagens_png/atencao.png" alt="">
       </figure>
      <h2>Nova Opção</h2>
      <figure >
          <img src="imagens_png/icone_coracao_vazio.png " id="favoritar"  alt="">
      </figure>
  
    </div>
    <div class="modal" id="modal">
       <div class="conteudo-principal">
           <span class="fechar">
               x
           </span>
          <h2>FAÇA SUA DENÚNCIA AQUI</h2>
          <form action="" method="post">
            <textarea name="" id="" cols="30" rows="10"></textarea>
             <input type="submit" value="ENVIAR">
          </form>
  
       </div>
  
    </div>
<div id="produto-principal">
  <article class="slide-imagens">
    <img class="fotos" src="imagens_jpg/restaurante.jpg">
    <img class="fotos" src="imagens_png/comida_arabe.png">
    <img class="fotos" src="imagens_jpg/1.jpg">
    <img class="fotos" src="imagens_jpg/2.jpg">
  </article>
</div>
<article class="detalhes-produto">
    <h2>SOBRE</h2>
    <hr>
     <p>SEXTA <br>
                       SÁBADO <br>
                DOMINGO<br>
                  AVENIDA ZÉLIA 123 <br>
                  18h às - 22hrs <br>
                  <span>foodtruckbarueri.com.br</span>
         
    
    </p>
    <hr>

</article>
</section>
<section>

    <article class="mapa">
        <h2>MAPA</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116972.5013141399!2d-46.86144086191597!3d-23.62617641209564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce447df87957c3%3A0x9fa4b1f0235bc8d3!2zUGl6emFyaWEgTm92YSBPcMOnw6Nv!5e0!3m2!1spt-BR!2sbr!4v1536792910638" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </iframe>
     </article>
     <div class="comentario">
         <h2>COMENTAR</h2>
         <hr>
         <form method="post" action="">
              <textarea name="" id="" >

              </textarea>
         <input type="submit" value="Enviar">
         </form>
        </div>
    <article class="postagem">
         <picture>
   <img src="imagens_jpg/restaurante.jpg" 
    alt="">
         </picture>  
        <h3>vitor   </h3>
         <p>
             awdadawdwadwadwdaadwwddw
         </p>

    </article>
    <article class="postagem">
        <picture>
  <img src="imagens_jpg/restaurante.jpg" 
   alt="">
        </picture>  
       <h3>Joana</h3>
        <p>
            awdadawdwadwadwdaadwwddw
        </p>

   </article>
</section>

<script src="script/restaurante/modal.js"></script>
<script src="script/restaurante/mudafoto.js"></script>
</div>   
</body>
</html>