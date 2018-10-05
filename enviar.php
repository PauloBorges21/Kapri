 <?php

/* apenas dispara o envio do formulário caso exista $_POST['enviarFormulario']*/

if (isset($_POST['nome'])){


/*** INÍCIO - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/

$enviaFormularioParaNome = 'Kapri';
$enviaFormularioParaEmail = 'contato@espacokapri.com.br';

$caixaPostalServidorNome = 'WebSite | Formulário';
$caixaPostalServidorEmail = 'espacokapri@bol.com.br';
$caixaPostalServidorSenha = '200814Laura';

/*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/


/* abaixo as veriaveis principais, que devem conter em seu formulario*/

$remetenteNome  = $_POST['nome'];
$remetenteEmail = $_POST['email'];
$assunto  = $_POST['assunto'];
$mensagem = $_POST['mensagem'];
$telefone = $_POST['telefone'];

$mensagemConcatenada = 'Formulário gerado via website'.'<br/>';
$mensagemConcatenada .= '-------------------------------<br/><br/>';
$mensagemConcatenada .= 'Nome: '.$remetenteNome.'<br/>';
$mensagemConcatenada .= 'E-mail: '.$remetenteEmail.'<br/>';
$mensagemConcatenada .= 'Assunto: '.$assunto.'<br/>';
$mensagemConcatenada .= '-------------------------------<br/><br/>';
$mensagemConcatenada .= 'Mensagem: "'.$mensagem.'"<br/>';
$mensagemConcatenada .= '-------------------------------<br/><br/>';
$mensagemConcatenada .= 'Telefone: "'.$telefone.'"<br/>';


/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/

require_once('PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->SMTPAuth  = true;
$mail->Charset   = 'utf8_decode()';
$mail->Host  = 'smtp.'.substr(strstr($caixaPostalServidorEmail, '@'), 1);
$mail->Port  = '587';
$mail->Username  = $caixaPostalServidorEmail;
$mail->Password  = $caixaPostalServidorSenha;
$mail->From  = $caixaPostalServidorEmail;
$mail->FromName  = utf8_decode($caixaPostalServidorNome);
$mail->IsHTML(true);
$mail->Subject  = utf8_decode($assunto);
$mail->Body  = utf8_decode($mensagemConcatenada);


$mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));

if(!$mail->Send()){
$mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
}else{
$mensagemRetorno = '<div class="formphp">Formulário enviado com sucesso!</div>';
echo $mensagemRetorno;
}


}
?>
