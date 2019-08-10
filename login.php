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

    <link rel="stylesheet" media="screen and (max-width:480px)" href="css/login/style480_portrait_login.css">
    <link rel="stylesheet" media="screen and (min-width:481px) and (max-width:768px)" href="css/login/style768_portrait_login.css">
    <link rel="stylesheet" media="screen and (min-width:769px) and (max-width:1024px)" href="css/login/style1024_portrait_login.css">
    <link rel="stylesheet" media="screen and (min-width:1025px)" href="css/login/style1025_portrait_login.css">

</head>
<body>  
<div id=container>
<section>   
<header>
    <a href="index.php" class="fechar"><img src="imagens_png/close.png" alt=""></a>
   <a href="index.php"  > <img src="imagens_png/logo3.png" alt=""></a>
</header>
<article id="centro">
    <div class="titulo-principal-login">
   <hr><h1>LOGIN</h1><hr>
    </div>
    <form action="funcoes/logar.php" method="post">
        <input type="email" name="email" id="email" placeholder="EMAIL">
        <input type="password" name="senha" id="senha" placeholder="SENHA">
        <div id="esqueceu-senha">
                <a href="recuperar_senha.php">Esqueceu a senha?</a>
        </div>
          <?php
          if(isset($_GET['msg'])){
          $msg= $_GET["msg"];
          
           if ($msg == 1) { ?>
            <div id="msg-um">Email ou senha incorretos</div>
             <?php
          }}
           ?>
        <input type="submit" value="ENTRAR">
    </form>
   
</article>

</section>
</div>
</body>
</html>
