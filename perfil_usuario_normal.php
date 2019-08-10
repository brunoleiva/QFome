<?php
require 'funcoes/conect.php';
require 'funcoes/restricao.php';

    $conn = connection();
    $codUsuario = $_SESSION['cod'];
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

    <link rel="stylesheet" media="screen and (max-width:480px) " href="css/perfil_usuario_normal/style480_portrait_perfil_usuario_normal.css">
    <link rel="stylesheet" media="screen and (min-width:481px) and (max-width:768px) " href="css/perfil_usuario_normal/style768_portrait_perfil_usuario_normal.css">
    <link rel="stylesheet" media="screen and (min-width:769px) and (max-width:1024px) " href="css/perfil_usuario_normal/style1024_portrait_perfil_usuario_normal.css">
    <link rel="stylesheet" media="screen and (min-width:1025px) " href="css/perfil_usuario_normal/style1025_portrait_perfil_usuario_normal.css">
                                           


    <script src="script/js.js"></script>
</head>
<body>
<div id=container>
<section>
  <header>
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
    <a href="alterar_normal.php" class="configuracao"><img src="imagens_png/configuração_perfil.png" alt="" width="40px" height="40px"></a>
       <a href="funcoes/logout.php" id="sair">SAIR</a>
      <figure class="imagem-usuario">
        <img src="<?php echo $url; ?>" alt="">
        <figcaption><?php echo $nomeUsuario; ?></figcaption>
        <address><?php echo $emailUsuario; ?></address>
        <?php 
      if(isset($_SESSION['usuario']) == true && isset($_SESSION['senha']) == true){
        $logado_nivel = $_SESSION['tipo'];
        if($logado_nivel == 2){
           ?>
          <a href="pagina_adm.php" id="gerenciamento">GERENCIAMENTO</a>
          <?php
        }
      }
     
      ?>
      </figure>
      
  </header>
  <div class="titulo-favoritos">

   <h2>FAVORITOS</h2>
   <hr> 
  </div>
  <form action="perfil_usuario_normal.php" method="get">
    <div  class="busca-perfil">
      <input type="text" name="busca" id="" placeholder="Pesquise aqui"> 
  <input type="submit" value="Buscar"> 
  </form>
  
    </div>  
    <?php
if(!empty($_GET['busca'])){
  $busca = $_GET['busca'];
  $sql = "SELECT * FROM empresa 
  INNER JOIN logradouro ON (logradouro.cod_cep = empresa.cod_cep) 
  INNER JOIN favorita_empresa ON (empresa.cod_empresa = favorita_empresa.cod_empresa) 
  WHERE cod_usu='$codUsuario' and empresa.nome_empresa LIKE '%" . $busca . "%' 
  ORDER BY favorita_empresa.data_hora_favorita DESC";
  $result = $conn->prepare($sql);  // echo $sql;
  $result->execute();
//echo $sql;
while($row = $result->fetch(PDO::FETCH_OBJ)){ ?>     
    <article class="restaurante">
      <picture>

      <a href="restaurante.php?c=<?php echo $row->nome_cidade ; ?>&cod=<?php echo $row->cod_empresa ; ?>">  <img src="<?php
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
    <h2><?php echo $row->nome_empresa; ?></h2>
    </a>
    <figure class="icone">
    <a href="funcoes/favorita_perfil.php?cod_empresa=<?php echo $cod_empresa; ?>">
        <img src="<?php      
      $string="SELECT * FROM favorita_empresa where cod_empresa='$cod_empresa' and cod_usu='$codUsuario'";
      $favorita = $conn->prepare("$string");
      $favorita->execute();
      $count=$favorita->rowCount();
      if($count == 0){
        echo 'imagens_png/geaar.png';
      }else{
        echo 'imagens_png/gear.png';
      }

?>" width="50" heigth="50" alt=""></a>

    </figure>
  
    <a href="restaurante.php?c=<?php echo $row->nome_cidade ; ?>&cod=<?php echo $row->cod_empresa ; ?>"><p>
       <address class="endereco">
       <?php echo $row->nome_logra .', ' . $row->num_end . ', ' . $row->nome_bairro; ?><br>
     <?php echo $row->nome_cidade . ', ' . $row->cod_cep; ?>
       </address>
     </p>

    </a> 
  </article>

    <?php
    } 
  
  }else{
  $result = $conn->prepare("SELECT * FROM empresa 
  INNER JOIN logradouro ON (logradouro.cod_cep = empresa.cod_cep) 
  INNER JOIN favorita_empresa ON (empresa.cod_empresa = favorita_empresa.cod_empresa) 
  WHERE cod_usu='$codUsuario' ORDER BY favorita_empresa.data_hora_favorita DESC");

		$result->execute();
		while($row = $result->fetch(PDO::FETCH_OBJ)){

        
	?>
   <article class="restaurante">
      <picture>

      <a href="restaurante.php?c=<?php echo $row->nome_cidade ; ?>&cod=<?php echo $row->cod_empresa ; ?>">  <img src="<?php
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
    <h2><?php echo $row->nome_empresa; ?></h2>
    </a>
    <figure class="icone">
    <a href="funcoes/favorita_perfil.php?cod_empresa=<?php echo $cod_empresa; ?>">
        <img src="<?php      
      $string="SELECT * FROM favorita_empresa where cod_empresa='$cod_empresa' and cod_usu='$codUsuario'";
      $favorita = $conn->prepare("$string");
      $favorita->execute();
      $count=$favorita->rowCount();
      if($count == 0){
        echo 'imagens_png/geaar.png';
      }else{
        echo 'imagens_png/gear.png';
      }

?>" width="50" heigth="50" alt=""></a>

    </figure>
  
  <a href="restaurante.php?c=<?php echo $row->nome_cidade ; ?>&cod=<?php echo $row->cod_empresa ; ?>"><p>
       <address class="endereco">
       <?php echo $row->nome_logra .', ' . $row->num_end . ', ' . $row->nome_bairro; ?><br>
     <?php echo $row->nome_cidade . ', ' . $row->cod_cep; ?>
       </address>
     </p>

    </a> 
  </article>
    <?php }
  }
    ?>
    
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
    <a href="pagina_escolha.php" class="icones"><img src="imagens_png/icone_login.png" alt=""></a>
    <a href="#" class="icones" id="lupa" ><img src="imagens_png/lupa.png" alt=""></a>
  </nav>
</header>
<section id="opcoes">
    <div id="titulo-categorias">
      <hr><h2>itapevi</h2> <hr>
    </div>
    <div id="titulo-categorias-dois">
     <h2>Escolha a categoria desejada!</h2>
    </div>
  <article class="restaurante">
  <figure class="favoritar">
      <img  src="imagens_png/geaar.png" width="50" heigth="50" alt="" id="coracao">
  </figure>
  <a href="restaurante.php">
   <picture  class="" >
      <img src="imagens_jpg/restaurante.jpg" alt="">
    </picture>
   </a>
   <a href="restaurante.php">
  <h2 class="titulo-restaurante">NOME UM</h2>
  </a>
  <a href="restaurante.php">
   <address>Av. Henriqueta Mendes Guerra,
      728 - Jardim Sao Pedro, Barueri
       - SP, 06401-160
  </address>
  </a>
</article>
      <article class="restaurante">
  <figure class="favoritar">
      <img  src="imagens_png/geaar.png" width="50" heigth="50" alt="" id="coracao">
  </figure>
  <a href="restaurante.php">
   <picture  class="" >
      <img src="imagens_jpg/restaurante.jpg" alt="">
    </picture>
   </a>
   <a href="restaurante.php">
  <h2 class="titulo-restaurante">NOME UM</h2>
  </a>
  <a href="restaurante.php">
   <address>Av. Henriqueta Mendes Guerra,
      728 - Jardim Sao Pedro, Barueri
       - SP, 06401-160
  </address>
  </a>
</article>
          <article class="restaurante">
  <figure class="favoritar">
      <img  src="imagens_png/geaar.png" width="50" heigth="50" alt="" id="coracao">
  </figure>
  <a href="restaurante.php">
   <picture  class="" >
      <img src="imagens_jpg/restaurante.jpg" alt="">
    </picture>
   </a>
   <a href="restaurante.php">
  <h2 class="titulo-restaurante">NOME UM</h2>
  </a>
  <a href="restaurante.php">
   <address>Av. Henriqueta Mendes Guerra,
      728 - Jardim Sao Pedro, Barueri
       - SP, 06401-160
  </address>
  </a>
</article>
          <article class="restaurante">
  <figure class="favoritar">
      <img  src="imagens_png/geaar.png" width="50" heigth="50" alt="" id="coracao">
  </figure>
  <a href="restaurante.php">
   <picture  class="" >
      <img src="imagens_jpg/restaurante.jpg" alt="">
    </picture>
   </a>
   <a href="restaurante.php">
  <h2 class="titulo-restaurante">NOME UM</h2>
  </a>
  <a href="restaurante.php">
   <address>Av. Henriqueta Mendes Guerra,
      728 - Jardim Sao Pedro, Barueri
       - SP, 06401-160
  </address>
  </a>
</article>
          <article class="restaurante">
  <figure class="favoritar">
      <img  src="imagens_png/geaar.png" width="50" heigth="50" alt="" id="coracao">
  </figure>
  <a href="restaurante.php">
   <picture  class="" >
      <img src="imagens_jpg/restaurante.jpg" alt="">
    </picture>
   </a>
   <a href="restaurante.php">
  <h2 class="titulo-restaurante">NOME UM</h2>
  </a>
  <a href="restaurante.php">
   <address>Av. Henriqueta Mendes Guerra,
      728 - Jardim Sao Pedro, Barueri
       - SP, 06401-160
  </address>
  </a>
</article>
          <article class="restaurante">
  <figure class="favoritar">
      <img  src="imagens_png/geaar.png" width="50" heigth="50" alt="" id="coracao">
  </figure>
  <a href="restaurante.php">
   <picture  class="" >
      <img src="imagens_jpg/restaurante.jpg" alt="">
    </picture>
   </a>
   <a href="restaurante.php">
  <h2 class="titulo-restaurante">NOME UM</h2>
  </a>
  <a href="restaurante.php">
   <address>Av. Henriqueta Mendes Guerra,
      728 - Jardim Sao Pedro, Barueri
       - SP, 06401-160
  </address>
  </a>
</article>
          <article class="restaurante">
  <figure class="favoritar">
      <img  src="imagens_png/geaar.png" width="50" heigth="50" alt="" id="coracao">
  </figure>
  <a href="restaurante.php">
   <picture  class="" >
      <img src="imagens_jpg/restaurante.jpg" alt="">
    </picture>
   </a>
   <a href="restaurante.php">
  <h2 class="titulo-restaurante">NOME UM</h2>
  </a>
  <a href="restaurante.php">
   <address>Av. Henriqueta Mendes Guerra,
      728 - Jardim Sao Pedro, Barueri
       - SP, 06401-160
  </address>
  </a>
</article>

  <footer>



</footer>
</section>  

</section>

</div>   
</body>
</html>