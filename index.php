<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
 <title>Qfome-encontre seu jantar perfeito aqui</title>
	
    <meta name=author content="">
    <meta name=description content="">
    <meta name=keywords content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/default.css">

    <link rel="stylesheet" media="screen and (max-width:480px)" href="css/landing_page/style480_portrait_landing_page.css">
    <link rel="stylesheet" media="screen and (min-width:481px) and (max-width:768px) " href="css/landing_page/style768_portrait_landing_page.css">
    <link rel="stylesheet" media="screen and (min-width:769px) and (max-width:1024px) " href="css/landing_page/style1024_portrait_landing_page.css">
    <link rel="stylesheet" media="screen and (min-width:1025px)" href="css/landing_page/style1025_portrait_landing_page.css">
</head>
<body>
<div id=container>
<section id="mobile">
 <header>

 <!-- Menu mobile -->
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
 <!-- Menu Desktop --> 
  <nav id="segundo-menu-principal">
    <a href="">CATEGORIA</a>
    <a href="">DESTAQUES</a>
    <a href="index.php" id="logo"><img src="imagens_png/logo.png"></a>
    <a href="">FOOD TRUCK</a>
    <a href="">SOBRE</a>
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
    <a href="#" class="icones" id="lupa" ><img src="imagens_png/lupa.png" alt=""></a>
  </nav>
 </header>
  <article id="pagina-principal">
  <!-- botoes do carousel  -->
      <nav id="navegacao-quero-conhecer">
      <a href="#segunda-secao" id="quero-conhecer" > Quero conhecer!</a>
      <a href="cadastro.php">Cadastrar</a>
    </nav>
   <!-- Slider mobile --> 
    <img src="imagens_jpg/landing_page/2.jpeg" alt="" class="slides" width="100%">
   <img src="imagens_jpg/qfome.jpg" alt="" class="slides" width="100%">
   <img src="imagens_jpg/prove.jpeg" alt="" class="slides" width="100%">
   <img src="imagens_jpg/cadastre.jpeg" alt="" class="slides" width="100%">
</article>
</section>
<main>
<section id="segunda-secao">
<!-- Cidades -->
  <article class="cidades escolha-cidade">ESCOLHA SUA CIDADE AQUI<br><br><hr>
  </article>
  <a href="cidade.php?c=1"><article class="cidades">ITAPEVI</article></a>
  <a href="cidade.php?c=2"><article class="cidades">BARUERI</article></a>
  <a href="cidade.php?c=3"><article class="cidades">SANTANA<br> DE <br> PARNAÍBA</article></a>
  <a href="cidade.php?c=4"><article class="cidades">OSASCO</article></a>
  <a href="cidade.php?c=5"><article class="cidades">JANDIRA</article></a>
  <a href="cidade.php?c=6"><article class="cidades item">CARAPICUÍBA</article></a>
  <a href="cidade.php?c=7"><article class="cidades item">PIRAPORA</article></a>

   
   
</section>
    
   
</main>
    <!-- tela do Desktop -->
<section id="desktop">

<header>
 <!-- Menu Desktop --> 
<nav id="segundo-menu-principal">
    <a href="index.php">HOME</a>
    <a href="destaques.php">DESTAQUES</a>
    <a href="index.php" id="logo"><img src="imagens_png/logo3.png"></a>
    <a href="food_truck.php">FOOD TRUCK</a>
    <a href="sobre.php">SOBRE</a>
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
    <a href="#" class="icones" id="lupa" ><img src="imagens_png/lupa.png" alt=""></a>
  </nav>
</header>  
<article id="fundo">
  <img src="imagens_jpg/be.jpg" alt=""> 
  <div id="log" style="position:absolute;top:20vw;left:5vw;font-size:4vw;padding:1vw;text-transform:uppercase;color:#fff;background-color:orange;font-family:arial;">
  </div>
  <div id="conhecer" >
     <a href="#segunda-secao-desktop">Quero conhecer!</a>
     <a href="cadastro.php">Cadastre-se</a>
  </div>
</article>
<section id="segunda-secao-desktop">
 <div id="titulo-cidades-desktop">
    <h1>Escolha sua categoria</h1> 
    <hr>
 </div>
 <div id="cidades">
 <a href="cidade.php?c=1"class="item-cidade cima"><article >itapevi</article></a>
 <a href="cidade.php?c=2"class="item-cidade baixo"><article >barueri</article></a>
 <a href="cidade.php?c=3"class="item-cidade cima"><article >santana <br> de parnaiba</article></a>
 <a href="cidade.php?c=4"class="item-cidade baixo"><article >osasco</article></a>
 <a href="cidade.php?c=5"class="item-cidade cima"><article >jandira</article></a>
 <a href="cidade.php?c=6"class="item-cidade baixo"><article >carapicuiba</article></a>
 <a href="cidade.php?c=7"class="item-cidade cima"><article >pirapora</article></a>
 </div>
 <a href="#fundo" id="voltar">voltar</a>
</section>
<footer>


</footer>



</section>
      <script src="script/jquery/jquery-3.3.1.min.js"></script>
    <script src="script/landing_page/scroll.js"></script>
    <script src="script/landing_page/slide.js"></script>
     <script>
var div = document.getElementById('log');
var textos = ['crie novas experiências', 'Cadastre sua empresa!'];

function escrever(str, done) {
    var char = str.split('').reverse();
    var typer = setInterval(function() {
        if (!char.length) {
            clearInterval(typer);
            return setTimeout(done, 500); // só para esperar um bocadinho
        }
        var next = char.pop();
        div.innerHTML += next;
    }, 100);
}

function limpar(done) {
    var char = div.innerHTML;
    var nr = char.length;
    var typer = setInterval(function() {
        if (nr-- == 0) {
            clearInterval(typer);
            return done();
        }
        div.innerHTML = char.slice(0, nr);
    }, 100);
}

function rodape(conteudos, el) {
    var atual = -1;
    function prox(cb){
        if (atual < conteudos.length - 1) atual++;
        else atual = 0;
        var str = conteudos[atual];
        escrever(str, function(){
            limpar(prox);
        });
    }
    prox(prox);
}
rodape(textos);
    </script>
</div>
</body>
</html>
