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

    <link rel="stylesheet" media="screen and (max-width:480px) " href="css/restaurante/style480_portrait_restaurante.css">
    <link rel="stylesheet" media="screen and (min-width:481px) and (max-width:768px)" href="css/restaurante/style768_portrait_restaurante.css">
    <link rel="stylesheet" media="screen and (min-width:769px) and (max-width:1024px)" href="css/restaurante/style1024_portrait_restaurante.css">
    <link rel="stylesheet" media="screen and (min-width:1025px)" href="css/restaurante/style1025_portrait_restaurante.css">

</head>
<body>
<div id=container>
<section class="mobile">
  <header>
      <hr> <h1><?php $cat=  $_GET['c']; echo $cat; ?></h1> <hr>
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
  <div class="subtitulo">
  <?php
        $cod_empresa= $_GET['cod'];
        $c= $_GET['c'];
		$result = $conn->prepare("SELECT * FROM empresa 
        INNER JOIN logradouro ON (logradouro.cod_cep = empresa.cod_cep) 
        WHERE empresa.cod_empresa='$cod_empresa'");
		$result->execute();
		$row = $result->fetch(PDO::FETCH_OBJ);
	?>
     <figure >
         <img id="botao-modal" src="imagens_png/icone_atencao.png" alt="">
     </figure>
    <h2><?php echo $row->nome_empresa ; ?></h2>

    <figure >
        <a href="funcoes/favorita_rest.php?cod=<?php echo $cod_empresa.'&cat='.$cat.'&c='.$c?>">
        <img src="<?php 
      if (isset($_SESSION['status']) == true) {
      $codUsuario = $_SESSION['cod'];
      $string="SELECT * FROM favorita_empresa where cod_empresa='$cod_empresa' and cod_usu='$codUsuario'";
      $favorita = $conn->prepare("$string");
      $favorita->execute();
      $count=$favorita->rowCount();
      if($count == 0){
        echo 'imagens_png/geaar.png';
      }else{
        echo 'imagens_png/gear.png';
      }
    }else{
      echo 'imagens_png/geaar.png';
    }
?>" id="favoritar"  alt=""></a>
    </figure>

  </div>
  <div class="modal" id="modal">
     <div class="conteudo-principal">
         <span class="fechar">
             x
         </span>
        <h2>FAÇA SUA DENÚNCIA AQUI</h2>
        <form action="funcoes/denuncia_empresa.php?cod=<?php echo $cod_empresa; ?>&cat=<?php echo $cat; ?>" method="post">
          <textarea name="descricao" id="" cols="30" rows="10"></textarea>
           <input type="submit" value="ENVIAR">
        </form>
     </div>
  </div>
<div id="produto-principal">
  <article class="slide-imagens">
  <?php 
        $cod_empresa= $_GET['cod'];
        $string = "SELECT * FROM arquivos_emp 
        WHERE cod_empresa='$cod_empresa'";
		$resultado = $conn->prepare("$string");
        $resultado->execute();
        //echo $string;
		while($linha = $resultado->fetch(PDO::FETCH_OBJ)){
            ?>
      <img class="fotos" src="<?php echo $linha->nome_arqe.'.'.$linha->extensao_arqe; ?>">
      <?php 
        }
      ?>
  </article>
</div>
<article class="detalhes-produto">
    <h2>SOBRE</h2>
    <hr>
     <p><?php echo $row->nome_logra . ', '. $row->num_end . ' - '. $row->nome_bairro . ', '. $row->nome_cidade . ' - SP, '. $row->cod_cep . '</br>';
        echo $row->tel_empresa;
       echo $row->desc_empresa;?>
     <a href="<?php echo $row->site_empresa; ?>"><?php echo $row->site_empresa; ?></a>
    </p>
    <hr>

</article>
</section>
<section class="segunda-secao">

    <article class="mapa">
        <h2>MAPA</h2>
        <iframe src="<?php echo $row->link_maps; ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
     </article>
     <div class="comentario">
         <h2>COMENTAR</h2>
         <hr>
         <form method="post" action="funcoes/comentar_empresa.php?cod=<?php echo $cod_empresa; ?>&cat=<?php echo $cat; ?>">
              <textarea name="descricao" id="" cols="30" rows="10"></textarea>
         <input type="submit" value="Enviar">
         </form>
        </div>
        <?php
		$result = $conn->prepare("SELECT * FROM empresa 
        INNER JOIN logradouro ON (logradouro.cod_cep = empresa.cod_cep) 
        INNER JOIN comenta_empresa ON (empresa.cod_empresa = comenta_empresa.cod_empresa) 
        INNER JOIN usuario ON (usuario.cod_usu = comenta_empresa.cod_usu) 
        WHERE empresa.cod_empresa='$cod_empresa' and usuario.cod_status_usu='A' order by comenta_empresa.data_hora_comentario DESC");
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_OBJ)){
	?>
    <article class="postagem">
    <div></div>
    <div></div>
         <picture>
   <img src="<?php echo $row->url_foto_usu; ?>" 
    alt="">

         </picture>  
         <h3><?php echo $row->nome_usu; ?> </h3>
         <p>
            <?php echo $row->desc_comentario; ?>
         </p>
         <div id="data-hora"><?php echo $row->data_hora_comentario; ?></div>
      
    </article>
    <?php } ?>



</section>
    <section id="desktop">
<header>
    
 <!-- Menu Desktop --> 
<nav id="segundo-menu-principal">
    <a href="index.php">HOME</a>
    <a href="destaques.php">DESTAQUES</a>
    <a href="index.php" id="logo"><img src="imagens_png/logo3.png"></a>
    <a href="food_truck.php">FOOD TRUCK</a>
    <a href="sobre.php">SOBRE</a>
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
    <a href="#" class="icones" id="lupa" ><img src="imagens_png/lupa.png" alt=""></a>
  </nav>
</header>
<section id="restaurante">
<div id="titulo-restaurante">
    <?php
		$result2 = $conn->prepare("SELECT * FROM empresa 
        INNER JOIN logradouro ON (logradouro.cod_cep = empresa.cod_cep) 
        WHERE empresa.cod_empresa='$cod_empresa'");
		$result2->execute();
		$row2 = $result2->fetch(PDO::FETCH_OBJ);
	?>
      <hr><h2><?php echo $row2->nome_cidade; ?></h2> <hr>
    </div>
    <div id="titulo-retaurante-dois">
     <h2><?php echo $row2->nome_empresa; ?></h2>
    </div>
    <div class="subtitulo-desktop">
     <figure >
         <img id="botao-modal" src="imagens_png/icone_atencao.png" alt="">
     </figure>

    <figure >
        <a href="funcoes/favorita_rest.php?cod=<?php echo $cod_empresa.'&cat='.$cat.'&c='.$c?>">
        <img src="<?php 
      if (isset($_SESSION['status']) == true) {
      $codUsuario = $_SESSION['cod'];
      $string="SELECT * FROM favorita_empresa where cod_empresa='$cod_empresa' and cod_usu='$codUsuario'";
      $favorita = $conn->prepare("$string");
      $favorita->execute();
      $count=$favorita->rowCount();
      if($count == 0){
        echo 'imagens_png/geaar.png';
      }else{
        echo 'imagens_png/gear.png';
      }
    }else{
      echo 'imagens_png/geaar.png';
    }
?>" id="favoritar"  alt=""></a>
    </figure>
  </div>
  <div id="produto-principal-desktop">
  <article class="slide-imagens">
      <?php 
        $cod_empresa= $_GET['cod'];
        $string = "SELECT * FROM arquivos_emp 
        WHERE cod_empresa='$cod_empresa'";
		$resultado = $conn->prepare("$string");
        $resultado->execute();
        //echo $string;
		while($linha = $resultado->fetch(PDO::FETCH_OBJ)){
            ?>
      <img class="fotos" src="<?php echo $linha->nome_arqe.'.'.$linha->extensao_arqe; ?>">
      <?php 
        }
      ?>

  </article>
</div> 
<article class="detalhes-produto-desktop">
    <h2>SOBRE</h2>
    <hr>
     <p><?php echo $row2->nome_logra . ', '. $row2->num_end . ' - '. $row2->nome_bairro . ', '. $row2->nome_cidade . ' - SP, '. $row2->cod_cep . '</br>';
        echo $row2->tel_empresa;
       echo $row2->desc_empresa;?>
     <a href="<?php echo $row2->site_empresa; ?>"><?php echo $row2->site_empresa; ?></a>
    </p>
    <hr>
</article>
<section class="segunda-secao-desktop">

    <article class="mapa">
        <h2>MAPA</h2>
        <iframe src="<?php echo $row2->link_maps; ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
     </article>
     <div class="comentario">
         <h2>COMENTAR</h2>
         <hr>
         <form method="post" action="">
              <textarea name="" id="" cols="30" rows="10"></textarea>
         <input type="submit" value="Enviar">
         </form>
        </div>
        <article class="postagem">
          
         <?php
		$result = $conn->prepare("SELECT * FROM empresa 
        INNER JOIN logradouro ON (logradouro.cod_cep = empresa.cod_cep) 
        INNER JOIN comenta_empresa ON (empresa.cod_empresa = comenta_empresa.cod_empresa) 
        INNER JOIN usuario ON (usuario.cod_usu = comenta_empresa.cod_usu) 
        WHERE empresa.cod_empresa='$cod_empresa' and usuario.cod_status_usu='A' order by comenta_empresa.data_hora_comentario DESC");
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_OBJ)){
	?>
    <article class="postagem">
        <!-- 
      <div class="dropdown">
    <img  class="dropbtn" onclick="myFunction()" src="imagens_png/configuração_perfil.png" alt=""> 
        <div id="myDropdown" class="dropdown-content">
          <a href="#home">alterar</a>
          <a href="#about">excluir</a>
        </div>
      </div>
-->
    <div></div>
    <div></div>
         <picture>
   <img src="<?php echo $row->url_foto_usu; ?>" 
    alt="">

         </picture>  
         <h3><?php echo $row->nome_usu; ?> </h3>
         <p>
            <?php echo $row->desc_comentario; ?>
         </p>
         <div id="data-hora"><?php echo $row->data_hora_comentario; ?></div>
      
    </article>
    <?php } ?>


</section>


</section>

<script src="script/restaurante/modal.js"></script>
<script src="script/restaurante/mudafoto.js"></script>

</div>   
</body>
</html>