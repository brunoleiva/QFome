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

    <link rel="stylesheet" media="screen and (max-width:480px) " href="css/menu/style480_portrait_menu.css">
    <link rel="stylesheet" media="screen and (min-width:481px) and (max-width:768px)" href="css/menu/style768_portrait_menu.css">
    <link rel="stylesheet" media="screen and (min-width:769px) and (max-width:1024px)" href="css/menu/style1024_portrait_menu.css">
    <link rel="stylesheet" media="screen and (min-width:1025px)" href="css/menu/style1025_portrait_menu.css">

  <script src="script/jquery/jquery-3.3.1.min.js"></script>                                             
</head>
<body>
    <div id="container">
         <section>
                <header>
                    <a href="index.php"><img src="imagens_png/close.png" alt=""></a>
      <hr> <h1 id="titulo-principal">MENU</h1> <hr>
                </header>
   
          <a href="index.php"><article class="botoes">HOME</article></a>
          <a href="<?php
          if (isset($_SESSION['cep']) == true) {
      echo'alterar_restaurante.php';
    } else {
      if (isset($_SESSION['status']) == true) {
        echo'perfil_usuario_normal.php';
      } else {
        echo'pagina_escolha.php';
      }
    }?>"><article class="botoes">PERFIL</article></a>
          <a href="destaques.php"><article class="botoes">DESTAQUES</article></a>
          <a href="food_truck.php"><article class="botoes">FOOD TRUCK</article></a>
          <a href="sobre.php"><article class="botoes">SOBRE</article></a>
          <a href="index.php"> <img src="imagens_png/logo.png" alt=""></a>
         </section>

    </div>
</body>
</html>
