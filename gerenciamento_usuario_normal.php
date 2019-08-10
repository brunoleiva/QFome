<?php 
require 'funcoes/restricao_adm.php';
require 'funcoes/conect.php';
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

    <link rel="stylesheet" media="screen and (max-width:480px) and (orientation:portrait)" href="css/gerenciamento_usuario_normal/style480_portrait_gerenciamento_usuario_normal.css">
    <link rel="stylesheet" media="screen and (min-width:481px) and (max-width:768px) and (orientation:portrait)" href="css/gerenciamento_usuario_normal/style768_portrait_gerenciamento_usuario_normal.css">
    <link rel="stylesheet" media="screen and (min-width:769px) and (max-width:1024px) and (orientation:portrait)" href="css/gerenciamento_usuario_normal/style1024_portrait_gerenciamento_usuario_normal.css">
    <link rel="stylesheet" media="screen and (min-width:1025px) and (orientation:portrait)" href="css/gerenciamento_usuario_normal/style1025_portrait_gerenciamento_usuario_normal.css">
    
</head>
<body>
<div id=container>
  <section>
    <header>
         <hr><h1>GERENCIAMENTO</h1><hr>
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

    <div class="subtitulo">
        <h2>USUÁRIOS</h2>
    </div>
    <form action="gerenciamento_usuario_normal.php" method="get">
    <input type="search" name="busca" id="procurar" placeholder="PESQUISE AQUI" value="<?php if(isset($_GET["busca"])){ echo $_GET['busca'];}?>">

        <input type="submit" value="Buscar">
     </form>
   <table>
  <tr>
    <th>Codigo usuario </th>
    <th>Nome usuario</th>
    <th>email usuario</th>
    <th>status</th>
    <th>tipo</th>
      <th></th>
  </tr>
     <?php
if(!empty($_GET['busca'])){
  $busca = $_GET['busca'];
  $sql = "SELECT * FROM usuario
  WHERE nome_usu LIKE '%" . $busca . "%'";
  $result = $conn->prepare($sql);  // echo $sql;
  $result->execute();
//echo $sql;
while($row = $result->fetch(PDO::FETCH_OBJ)){ 
$cod_usu =$row->cod_usu ;?>
<tr>
    <td><a href=""><?php echo $cod_usu; ?></a></td>
    <td><a href=""><?php echo $row->nome_usu ; ?></a></td>
    <td><a href=""><?php echo $row->email_usu ; ?></a></td>
        <td><?php echo $row->cod_status_usu ; ?></td>
        <td><?php echo $row->cod_tipo_usu ; ?></td>
        <td id="borda"> <a href="funcoes/excluir_usuario.php?cod=<?php echo $cod_usu; ?>"><img src="imagens_png/close.png" alt=""> </a></td>

      </tr>
<?php }}else{?>
  <?php 
      $sql = "SELECT * FROM usuario";
  $result = $conn->prepare($sql);  // echo $sql;
  $result->execute();
//echo $sql;
while($row = $result->fetch(PDO::FETCH_OBJ)){ 
$cod_usu =$row->cod_usu ;?>
<tr>
    <td><a href=""><?php echo $cod_usu; ?></a></td>
    <td><a href=""><?php echo $row->nome_usu ; ?></a></td>
    <td><a href=""><?php echo $row->email_usu ; ?></a></td>
        <td><?php echo $row->cod_status_usu ; ?></td>
        <td><?php echo $row->cod_tipo_usu ; ?></td>
        <td id="borda"> <a href="funcoes/excluir_usuario.php?cod=<?php echo $cod_usu; ?>"><img src="imagens_png/close.png" alt=""> </a></td>

      </tr>
<?php }}?>

   </table>

  </section>


</div>
</body>
</html>
