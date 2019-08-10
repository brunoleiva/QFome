<?php 
require 'funcoes/restricao_adm.php';
require 'funcoes/conect.php';
$conn = Connection();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <title>Qfome</title>
	
    <meta name=author content="">
    <meta name=description content="">
    <meta name=keywords content="">
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/default.css">

    <link rel="stylesheet" media="screen and (max-width:480px)" href="css/gerenciamento_usuario_empresa/style480_portrait_gerenciamento_usuario_empresa.css">
    <link rel="stylesheet" media="screen and (min-width:481px) and (max-width:768px)" href="css/gerenciamento_usuario_empresa/style768_portrait_gerenciamento_usuario_empresa.css">
    <link rel="stylesheet" media="screen and (min-width:769px) and (max-width:1024px)" href="css/gerenciamento_usuario_empresa/style1024_portrait_gerenciamento_usuario_empresa.css">
    <link rel="stylesheet" media="screen and (min-width:1025px) " href="css/gerenciamento_usuario_empresa/style1025_portrait_gerenciamento_usuario_empresa.css">
    
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
        <h2>EMPRESA</h2>
    </div>
    <form action="gerenciamento_usuario_empresa.php" method="get">
    <input type="search" name="busca" id="procurar" placeholder="PESQUISE AQUI" value="<?php if(isset($_GET["busca"])){ echo $_GET['busca'];} ?>">
        <input type="submit" value="Buscar">
    </form>
     <table>
       
      <tr>
        <th>Codigo</th>
        <th>Nome</th>
        <th>cnpj</th>
        <th>status</th>
        <th></th>
        <th></th>
      </tr>
      <?php
if(!empty($_GET['busca'])){
  $busca = $_GET['busca'];
  $sql = "SELECT * FROM empresa
  WHERE nome_empresa LIKE '%" . $busca . "%'";
  $result = $conn->prepare($sql);  // echo $sql;
  $result->execute();
//echo $sql;
while($row = $result->fetch(PDO::FETCH_OBJ)){
 $cod_empresa = $row->cod_empresa; ?>
<tr>
        <td><?php echo $cod_empresa; ?></td>
        <td><?php echo $row->nome_empresa ; ?></td>
        <td><?php echo $row->cod_ident_empresa ; ?></td>
        <td><?php echo $row->cod_status_empresa ; ?></td>
        <td id="borda"> <a href="funcoes/excluir_usuario.php?cod_empresa=<?php echo $cod_empresa; ?>"><img src="imagens_png/close.png" alt=""> </a></td>

    
      </tr>
<?php }}else{?>
         <?php 
      $sql = "SELECT * FROM empresa";
  $result = $conn->prepare($sql);  // echo $sql;
  $result->execute();
//echo $sql;
while($row = $result->fetch(PDO::FETCH_OBJ)){ 
  $cod_empresa = $row->cod_empresa; ?>
<tr>
        <td><?php echo $cod_empresa; ?></td>
        <td><?php echo $row->nome_empresa ; ?></td>
        <td><?php echo $row->cod_ident_empresa ; ?></td>
        <td><?php echo $row->cod_status_empresa ; ?></td>
        <td id="borda"> <a href="funcoes/excluir_usuario.php?cod_empresa=<?php echo $cod_empresa; ?>"><img src="imagens_png/close.png" alt=""> </a></td>

      </tr>
<?php }}?>

      

     </table>
  </section>


</div>
</body>
</html>
