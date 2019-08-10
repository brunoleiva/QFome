<?php
require_once 'conect.php';
session_start();

$conn = Connection();

$email = $_POST['email'];
function ValidaEmail ($email, $conn){
    $result = $conn->prepare("SELECT * FROM usuario WHERE email_usu = '$email'");
    $result->execute();
    $count=$result->rowCount();
    if($count == 1){
        return true;
    }else{
        return false;
    }
}





$mail_header = '';
$assunto = 'RESTAURAR SENHA QFOME';
 

$mail_destino = $_POST['email'];

 

$mail_header .="From:\"Qfome\" \n";

$mail_header .="Reply-To: $email\n";

$mail_header .="Organization:Qfome\n";

$mail_header .="MIME-version:1.0\n";

$mail_header .="Content-Transfer-Encondiing: 8bit\n";

 

$msg_reply ="<left><b>Olá, recebemos o seu e-mail para recuperação da senha</b>. obrigado por entrar em contato. Sua senha: </left></b>";


  if(ValidaEmail($email, $conn)){
        $result = $conn->prepare("SELECT * FROM usuario
    WHERE email_usu='$email'");
    $result->execute();
    $row = $result->fetch(PDO::FETCH_OBJ);
    $senha=$row->senha_usu;
    if($email !=""){
$msg .="E-mail: $email\n";

$msg .="Assunto: SENHA\n";

$msg .="Sua senha: $senha\n";
if(mail ($mail_destino, $assunto, $msg, $mail_header))

{

header("Location: ../login.php");

}

else
echo "<meta http-equiv=refresh content=5;URL=contato.htm></html><left><br><br><b>Erro ao enviar a email!</b></left>";

}
else

{

echo"<br><br><left>$msg_erro<br><br><a href=\"java script:window.history.go(-1)\">Por Favor volte e preencha os dados corretamente.</a></left>";

}
    } else{
       
        header("Location: ../recuperar_senha.php?msg=1");
    }
    


 

 



 

 

 

?>