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

  <link rel="stylesheet" media="screen and (max-width:480px)" href="css/cidade/style480_portrait_cidade.css">
  <link rel="stylesheet" media="screen and (min-width:481px) and (max-width:768px)" href="css/cidade/style768_portrait_cidade.css">
  <link rel="stylesheet" media="screen and (min-width:769px) and (max-width:1024px)" href="css/cidade/style1024_portrait_cidade.css">
  <link rel="stylesheet" media="screen and (min-width:1025px)" href="css/cidade/style1025_portrait_cidade.css">
</head>
<body>
  <div id=container>

    <section id="mobile">

      <a href="index.php" value='Voltar'  id="voltar"><img width="25vw" heigth="25vw" src="imagens_png/seta_preta.png" alt=""></a>
      <header>
       
        <h1 class="cabecalho"><?php 
        $cidade = $_GET['c']; 
        switch ($cidade) {
          case 0:
            break;
            case 1:
            echo 'ITAPEVI';
            break;
            case 2:
            echo 'BARUERI';
            break;
            case 3:
            echo 'SANTANA DE PARNAÍBA';
            break;
            case 4:
            echo 'OSASCO';
            break;
            case 5:
            echo 'JANDIRA';
            break;
            case 6:
            echo 'CARAPICUÍBA';
            break;
            case 7:
            echo 'PIRAPORA';
            break; 
          
          default:
            # code...
            break;
        }
 ?></h1>
        <h2 class="cabecalho-dois">ESCOLHA SUA CATEGORIA</h2>

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
    }?>" class="icones"><img src="imagens_png/icone_login.png" alt=""></a>
    <a href="index.php" id="logo"><img src="imagens_png/logo3.png"></a>
    <a href="menu.php" class="icones" ><img src="imagens_png/menu_hamburguer.png" alt=""></a>
  </nav>
      </header>
      <main>
        <article id="categoria"> 
        <?php
		$result = $conn->prepare("SELECT * FROM categoria ORDER BY cod_cat ASC");
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_OBJ)){

  ?>
        <a href="categoria.php?c=<?php
             $cidade = $_GET['c']; 
        switch ($cidade) {
            case 0:
            break;
            case 1:
            echo 'ITAPEVI';
            break;
            case 2:
            echo 'BARUERI';
            break;
            case 3:
            echo 'SANTANA';
            break;
            case 4:
            echo 'OSASCO';
            break;
            case 5:
            echo 'JANDIRA';
            break;
            case 6:
            echo 'CARAPICUIBA';
            break;
            case 7:
            echo 'PIRAPORA';
            break; 
          
          default:
            # code...
            break;
        }
        ?>&cat=<?php echo $row->nome_cat ?>&cod=<?php echo $row->cod_cat ?>">
              <figure class="item-categoria" for="hamburgueria">
                <img src="imagens_png/<?php echo $row->url_foto_cat; ?>" alt="">
                <figcaption><?php echo $row->nome_cat; ?></figcaption>
              </figure>
              </a>
      <?php } ?> 
        </article>

      </main>

    </section>
    <section id="secao-dois">
     <h2 id="segundo-titulo">DESTAQUES DA CIDADE</h2>
     <hr>
     <?php if ($cidade == 1) {
       $restaurante1= 'Bora Bora';
       $restaurante2= 'Container Bar';
       $restaurante3= 'Panda Burguer';
     }
     if ($cidade == 2) {
      $restaurante1= 'Pizza Hut';
      $restaurante2= 'Seiko';
      $restaurante3= 'Be veg';
    }
    if ($cidade == 3) {
      $restaurante1= 'Parnaiba Burguer';
      $restaurante2= 'Jardim Da Anna';
      $restaurante3= 'Adega Jequitibá';
    }
    if ($cidade == 4) {
      $restaurante1= 'Sr. Glutton';
      $restaurante2= 'Santo Beco';
      $restaurante3= 'Yosugiru Sushi';
    }
    if ($cidade == 5) {
      $restaurante1= 'Arena Paiol';
      $restaurante2= 'Cedrus';
      $restaurante3= 'Kobe';
    }
    if ($cidade == 6) {
      $restaurante1= 'Churrascaria Nunes';
      $restaurante2= 'Cartola Cafeteria';
      $restaurante3= 'Restaurante Alibar';
    }
    if ($cidade == 7) {
      $restaurante1= 'Bora Bora';
      $restaurante2= 'Container Bar';
      $restaurante3= 'Panda Burguer';
    }
     $result = $conn->prepare("SELECT * FROM empresa 
       INNER JOIN categoria_empresa ON (empresa.cod_empresa = categoria_empresa.cod_empresa) 
       INNER JOIN categoria ON (categoria.cod_cat = categoria_empresa.cod_cat) 
       INNER JOIN logradouro ON (logradouro.cod_cep = empresa.cod_cep) 
       WHERE empresa.nome_empresa='$restaurante1'");
       $result->execute(); 
       $row = $result->fetch(PDO::FETCH_OBJ);
       ?>

     <article class="cidades-destaques restaurante-um">
     <span id="primeiro">1</span>
     <picture class="restaurante item-um">
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
        <h2 class="titulo-restaurante"><?php echo $row->nome_empresa ; ?></h2>
    <p>
       <?php echo $row->nome_logra .', ' . $row->num_end . ', ' . $row->nome_bairro; ?><br>
 <?php echo $row->nome_cidade . ', ' . $row->cod_cep; ?>
      </p>
      </a>

    </article>
    <?php
    $result = $conn->prepare("SELECT * FROM empresa 
       INNER JOIN categoria_empresa ON (empresa.cod_empresa = categoria_empresa.cod_empresa) 
       INNER JOIN categoria ON (categoria.cod_cat = categoria_empresa.cod_cat) 
       INNER JOIN logradouro ON (logradouro.cod_cep = empresa.cod_cep) 
       WHERE empresa.nome_empresa='$restaurante2'");
       $result->execute(); 
       $row = $result->fetch(PDO::FETCH_OBJ);
       ?>

    <article class="cidades-destaques restaurante-dois">
     <span id="segundo">2</span>
     <picture class="restaurante-dois-foto">
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
        <h2 class="titulo-restaurante  titulo-dois"><?php echo $row->nome_empresa ; ?></h2>
    <p>
       <?php echo $row->nome_logra .', ' . $row->num_end . ', ' . $row->nome_bairro; ?><br>
 <?php echo $row->nome_cidade . ', ' . $row->cod_cep; ?>
      </p>
      </a>

    </article>
    <?php
    $result = $conn->prepare("SELECT * FROM empresa 
       INNER JOIN categoria_empresa ON (empresa.cod_empresa = categoria_empresa.cod_empresa) 
       INNER JOIN categoria ON (categoria.cod_cat = categoria_empresa.cod_cat) 
       INNER JOIN logradouro ON (logradouro.cod_cep = empresa.cod_cep) 
       WHERE empresa.nome_empresa='$restaurante3'");
       $result->execute(); 
       $row = $result->fetch(PDO::FETCH_OBJ);
       ?>
    <article class="cidades-destaques restaurante-tres">
     <span id="terceiro">3</span>
     <picture class="restaurante item-um">
    <a href="restaurante.php?c=<?php echo $row->nome_cidade ; ?>&cod=<?php echo $row->cod_empresa ; ?>"> 
    <img src="<?php
    $cod_empresa = $row->cod_empresa;
     $resultado = $conn->prepare("SELECT * FROM arquivos_emp where
     cod_empresa= '$cod_empresa' and 
    cod_arqe=(select min(cod_arqe) from arquivos_emp where cod_empresa='$cod_empresa')");
    $resultado->execute();
    $linha = $resultado->fetch(PDO::FETCH_OBJ);
    echo $linha->nome_arqe . '.' . $linha->extensao_arqe;
    ?>" alt=""></a> 
    </picture>
    <a href="restaurante.php?c=<?php echo $row->nome_cidade ; ?>&cod=<?php echo $row->cod_empresa ; ?>">
        <h2 class="titulo-restaurante"><?php echo $row->nome_empresa ; ?></h2>
    <p>
       <?php echo $row->nome_logra .', ' . $row->num_end . ', ' . $row->nome_bairro; ?><br>
 <?php echo $row->nome_cidade . ', ' . $row->cod_cep; ?>
      </p>
      </a>

    </article>

<footer>


</footer>
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
    }?>" class="icones"><img src="imagens_png/icone_login.png" alt=""></a>
    <a href="#" class="icones" id="lupa" ><img src="imagens_png/lupa.png" alt=""></a>
  </nav>
</header>
<article id="opcoes">
    <div id="titulo-categorias">
      <hr><h2><?php 
        $cidade = $_GET['c']; 
        switch ($cidade) {
          case 0:
            break;
            case 1:
            echo 'ITAPEVI';
            break;
            case 2:
            echo 'BARUERI';
            break;
            case 3:
            echo 'SANTANA DE PARNAÍBA';
            break;
            case 4:
            echo 'OSASCO';
            break;
            case 5:
            echo 'JANDIRA';
            break;
            case 6:
            echo 'CARAPICUÍBA';
            break;
            case 7:
            echo 'PIRAPORA';
            break; 
          
          default:
            # code...
            break;
        }
 ?></h2> <hr>
    </div>
    <div id="titulo-categorias-dois">
     <h2>Escolha a categoria desejada!</h2>
    </div>
    <div id="categoria">
        <?php
		$result = $conn->prepare("SELECT * FROM categoria ORDER BY cod_cat ASC");
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_OBJ)){

  ?>
        <a href="categoria.php?c=<?php
             $cidade = $_GET['c']; 
        switch ($cidade) {
            case 0:
            break;
            case 1:
            echo 'ITAPEVI';
            break;
            case 2:
            echo 'BARUERI';
            break;
            case 3:
            echo 'SANTANA';
            break;
            case 4:
            echo 'OSASCO';
            break;
            case 5:
            echo 'JANDIRA';
            break;
            case 6:
            echo 'CARAPICUIBA';
            break;
            case 7:
            echo 'PIRAPORA';
            break; 
          
          default:
            # code...
            break;
        }
        ?>&cat=<?php echo $row->nome_cat ?>&cod=<?php echo $row->cod_cat ?>">
              <figure class="item-categoria" for="hamburgueria">
                <img src="imagens_png/<?php echo $row->url_foto_cat; ?>" alt="">
                <figcaption><?php echo $row->nome_cat; ?></figcaption>
              </figure>
              </a>
      <?php } ?> 
             
    </div>
</article>
<section id="destaques">
<div id="titulo-destaques">
    <h2>destaques da cidade</h2>
</div>
<?php
$result = $conn->prepare("SELECT * FROM empresa 
       INNER JOIN categoria_empresa ON (empresa.cod_empresa = categoria_empresa.cod_empresa) 
       INNER JOIN categoria ON (categoria.cod_cat = categoria_empresa.cod_cat) 
       INNER JOIN logradouro ON (logradouro.cod_cep = empresa.cod_cep) 
       WHERE empresa.nome_empresa='$restaurante1'");
       $result->execute(); 
       $row = $result->fetch(PDO::FETCH_OBJ);
       ?>
 <article class="cidades-destaques restaurante-tres">
    <span class="colocacao">1</span>
   <picture  class="restaurante item-um" ><img src="<?php
    $cod_empresa = $row->cod_empresa;
     $resultado = $conn->prepare("SELECT * FROM arquivos_emp where
     cod_empresa= '$cod_empresa' and 
    cod_arqe=(select min(cod_arqe) from arquivos_emp where cod_empresa='$cod_empresa')");
    $resultado->execute();
    $linha = $resultado->fetch(PDO::FETCH_OBJ);
    echo $linha->nome_arqe . '.' . $linha->extensao_arqe;
    ?>" alt=""></picture>
   <h2 class="titulo-restaurante"><?php echo $row->nome_empresa;?></h2>

   <p><?php echo $row->nome_logra .', ' . $row->num_end . ', ' . $row->nome_bairro; ?><br>
 <?php echo $row->nome_cidade . ', ' . $row->cod_cep; ?>
  </p>
</article>   
<?php
$result = $conn->prepare("SELECT * FROM empresa 
       INNER JOIN categoria_empresa ON (empresa.cod_empresa = categoria_empresa.cod_empresa) 
       INNER JOIN categoria ON (categoria.cod_cat = categoria_empresa.cod_cat) 
       INNER JOIN logradouro ON (logradouro.cod_cep = empresa.cod_cep) 
       WHERE empresa.nome_empresa='$restaurante2'");
       $result->execute(); 
       $row = $result->fetch(PDO::FETCH_OBJ);
       ?>
<article class="cidades-destaques restaurante-tres">
    <span class="colocacao">2</span>
   <picture  class="restaurante item-um" ><img src="<?php
    $cod_empresa = $row->cod_empresa;
     $resultado = $conn->prepare("SELECT * FROM arquivos_emp where
     cod_empresa= '$cod_empresa' and 
    cod_arqe=(select min(cod_arqe) from arquivos_emp where cod_empresa='$cod_empresa')");
    $resultado->execute();
    $linha = $resultado->fetch(PDO::FETCH_OBJ);
    echo $linha->nome_arqe . '.' . $linha->extensao_arqe;
    ?>" alt=""></picture>
   <h2 class="titulo-restaurante"><?php echo $row->nome_empresa;?></h2>

   <p><?php echo $row->nome_logra .', ' . $row->num_end . ', ' . $row->nome_bairro; ?><br>
 <?php echo $row->nome_cidade . ', ' . $row->cod_cep; ?>
  </p>
</article>
<?php
$result = $conn->prepare("SELECT * FROM empresa 
       INNER JOIN categoria_empresa ON (empresa.cod_empresa = categoria_empresa.cod_empresa) 
       INNER JOIN categoria ON (categoria.cod_cat = categoria_empresa.cod_cat) 
       INNER JOIN logradouro ON (logradouro.cod_cep = empresa.cod_cep) 
       WHERE empresa.nome_empresa='$restaurante3'");
       $result->execute(); 
       $row = $result->fetch(PDO::FETCH_OBJ);
       ?>
<article class="cidades-destaques restaurante-tres">
    <span class="colocacao">3</span>
   <picture  class="restaurante item-um" ><img src="<?php
    $cod_empresa = $row->cod_empresa;
     $resultado = $conn->prepare("SELECT * FROM arquivos_emp where
     cod_empresa= '$cod_empresa' and 
    cod_arqe=(select min(cod_arqe) from arquivos_emp where cod_empresa='$cod_empresa')");
    $resultado->execute();
    $linha = $resultado->fetch(PDO::FETCH_OBJ);
    echo $linha->nome_arqe . '.' . $linha->extensao_arqe;
    ?>" alt=""></picture>
   <h2 class="titulo-restaurante"><?php echo $row->nome_empresa;?></h2>

   <p><?php echo $row->nome_logra .', ' . $row->num_end . ', ' . $row->nome_bairro; ?><br>
 <?php echo $row->nome_cidade . ', ' . $row->cod_cep; ?>
  </p>
</article>


</section>

</section>



</div>
</body>
</html>
