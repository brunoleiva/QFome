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

    <link rel="stylesheet" media="screen and (max-width:480px)" href="css/categoria/style480_portrait_categoria.css">
    <link rel="stylesheet" media="screen and (min-width:481px) and (max-width:768px)" href="css/categoria/style768_portrait_categoria.css">
    <link rel="stylesheet" media="screen and (min-width:769px) and (max-width:1024px)" href="css/categoria/style1024_portrait_categoria.css">
    <link rel="stylesheet" media="screen and (min-width:1025px)" href="css/categoria/style1025_portrait_categoria.css  ">
                                           


    <script src="script/js.js"></script>
</head>
<body>
<div id=container>
<section id="mobile">
    <a href="<?php 
    $cidade = $_GET['c'];
    if($cidade == 'ITAPEVI'){
        $cod_volta = 1;
    }
    if($cidade == 'BARUERI'){
        $cod_volta = 2;
    }
    if($cidade == 'SANTANA'){
        $cod_volta = 3;
    }
    if($cidade == 'OSASCO'){
        $cod_volta = 4;
    }
    if($cidade == 'JANDIRA'){
        $cod_volta = 5;
    }
    if($cidade == 'CARAPICUIBA'){
        $cod_volta = 6;
    }
    if($cidade == 'PIRAPORA'){
        $cod_volta = 7;
    }
    echo 'cidade.php?c='. $cod_volta;
    ?>" id="voltar"  onclick=''><img width="25vw" heigth="25vw" src="imagens_png/seta_preta.png" alt=""></a>
  <header>
        <hr><h1><?php $cidade = $_GET['c']; echo $cidade;?></h1><hr>
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
  <form  action="categoria.php" method="get">
<article id="filtro">
  <h2><?php  echo $_GET['cat']; ?></h2>
  
  <input type="text" name="busca" id="busca" placeholder="Pesquise aqui..." value="<?php if(isset($_GET["busca"])){ echo $_GET['busca'];}?>"> 
  <input type="hidden" name="c" value="<?php echo $_GET['c'];?>" /> 
  <input type="hidden" name="cod" value="<?php  echo $_GET['cod']; ?>" />
  <input type="hidden" name="cat" value="<?php  echo $_GET['cat']; ?>" />
  <input type="submit" value="Buscar"> 

    </form>
</article>
<main>
<?php
if(!empty($_GET['busca'])){
  $c= $_GET['c'];
  $cat= $_GET['cat'];
  $cod = $_GET['cod'];
  $busca = $_GET['busca'];
  $sql = "SELECT * FROM empresa 
  INNER JOIN categoria_empresa ON (empresa.cod_empresa = categoria_empresa.cod_empresa) 
  INNER JOIN categoria ON (categoria.cod_cat = categoria_empresa.cod_cat) 
  INNER JOIN logradouro ON (logradouro.cod_cep = empresa.cod_cep) 
  WHERE nome_empresa LIKE '%" . $busca . "%' and categoria.cod_cat = '$cod' and logradouro.nome_cidade= '$c' and empresa.cod_status_empresa='A'";
  $result = $conn->prepare($sql);  // echo $sql;
  $result->execute();
//echo $sql;
while($row = $result->fetch(PDO::FETCH_OBJ)){ ?>

<article class="restaurante">
    <picture>
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
  <h2><?php echo $row->nome_empresa; ?></h2></a>
  <figure>
  <a href="funcoes/favoritar.php?cod_empresa=<?php echo $cod_empresa; ?>&c=<?php echo $c; ?>&cat=<?php echo $cat; ?>&cod_cat=<?php echo $cod; ?>">
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
?>" width="50" heigth="50" alt="" id="favoritar" ></a>
  </figure>

  <a href="restaurante.php?c=<?php echo $row->nome_cidade ; ?>&cod=<?php echo $row->cod_empresa ; ?>"><p>
     <address>
     <?php echo $row->nome_logra .', ' . $row->num_end . ', ' . $row->nome_bairro; ?><br>
     <?php echo $row->nome_cidade . ', ' . $row->cod_cep; ?>
     </address>
   </p>
  </a> 
</article>
<?php 
} 
  
}else{
    $cod_cat= $_GET['cod'];
		$result = $conn->prepare("SELECT * FROM empresa 
        INNER JOIN categoria_empresa ON (empresa.cod_empresa = categoria_empresa.cod_empresa) 
        INNER JOIN categoria ON (categoria.cod_cat = categoria_empresa.cod_cat) 
        INNER JOIN logradouro ON (logradouro.cod_cep = empresa.cod_cep) 
        WHERE categoria.cod_cat = '$cod_cat' and logradouro.nome_cidade='$cidade' and empresa.cod_status_empresa='A'");
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_OBJ)){
      $c= $_GET['c'];
      $cat= $_GET['cat'];
      $cod = $_GET['cod'];

        
	?>

<article class="restaurante">
    <picture>
        
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
  <h2><?php echo $row->nome_empresa; ?></h2></a>
  <figure>
  <a href="funcoes/favoritar.php?cod_empresa=<?php echo $cod_empresa; ?>&c=<?php echo $c; ?>&cat=<?php echo $cat; ?>&cod_cat=<?php echo $cod; ?>">
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
?>" width="50" heigth="50" alt="" id="favoritar" >

      </a>
  </figure>

  <a href="restaurante.php?c=<?php echo $row->nome_cidade ; ?>&cod=<?php echo $row->cod_empresa ; ?>"><p>
     <address>
     <?php echo $row->nome_logra .', ' . $row->num_end . ', ' . $row->nome_bairro; ?><br>
     <?php echo $row->nome_cidade . ', ' . $row->cod_cep; ?>
     </address>
   </p>
  </a> 
  
</article>
<?php 
} 
}
?>
</main>
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
<section id="opcoes">
    <div id="titulo-categorias">
      <hr><h2><?php  echo $_GET['cat']; ?></h2> <hr>
    </div>
    <div id="titulo-categorias-dois">
     <h2><?php $cidade = $_GET['c']; echo $cidade;?></h2>
    </div>
    <?php
        $result2 = $conn->prepare("SELECT * FROM empresa 
        INNER JOIN categoria_empresa ON (empresa.cod_empresa = categoria_empresa.cod_empresa) 
        INNER JOIN categoria ON (categoria.cod_cat = categoria_empresa.cod_cat) 
        INNER JOIN logradouro ON (logradouro.cod_cep = empresa.cod_cep) 
        WHERE categoria.cod_cat = '$cod_cat' and logradouro.nome_cidade='$cidade' and empresa.cod_status_empresa='A'");
		$result2->execute();
		while($row = $result2->fetch(PDO::FETCH_OBJ)){
      $c= $_GET['c'];
      $cat= $_GET['cat'];
      $cod = $_GET['cod'];
      $cod_empresa2 = $row->cod_empresa;

        
	?>
  <article class="restaurante">
  <figure class="favoritar">
  <a href="funcoes/favoritar.php?cod_empresa=<?php echo $cod_empresa2; ?>&c=<?php echo $c; ?>&cat=<?php echo $cat; ?>&cod_cat=<?php echo $cod; ?>">
      <img src="<?php 
      if (isset($_SESSION['status']) == true) {
      $codUsuario = $_SESSION['cod'];
      $string="SELECT * FROM favorita_empresa where cod_empresa='$cod_empresa2' and cod_usu='$codUsuario'";
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
?>" width="50" heigth="50" alt="" id="coracao" >

      </a>
  </figure>
  <a href="restaurante.php?c=<?php echo $row->nome_cidade ; ?>&cod=<?php echo $row->cod_empresa ; ?>"> 
      <picture>
        <img src="<?php
         $resultado = $conn->prepare("SELECT * FROM arquivos_emp where
         cod_empresa= '$cod_empresa2' and 
        cod_arqe=(select min(cod_arqe) from arquivos_emp where cod_empresa='$cod_empresa2')");
        $resultado->execute();
        $linha = $resultado->fetch(PDO::FETCH_OBJ);
        echo $linha->nome_arqe . '.' . $linha->extensao_arqe;
        ?>" alt="">
      </picture>                

          </a> 
   <a href="restaurante.php">
  <h2 class="titulo-restaurante"><?php echo $row->nome_empresa ; ?></h2>
  </a>
  <a href="restaurante.php?c=<?php echo $row->nome_cidade ; ?>&cod=<?php echo $row->cod_empresa ; ?>">
      <address>
     <?php echo $row->nome_logra .', ' . $row->num_end . ', ' . $row->nome_bairro; ?><br>
     <?php echo $row->nome_cidade . ', ' . $row->cod_cep; ?>
   </address>
  </a> 
  </article>
  <?php } ?>
      
 
  <footer>



</footer>
</section>  

</section>
    
<footer>


</footer>
<script src="script/restaurante/mudafoto.js"></script>
</div>   
</body>
</html>