<?php
//ini_set('display_errors',1);
//ini_set('display_startup_erros',1);
//error_reporting(E_ALL);

// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require_once("phpmailer/class.phpmailer.php");

$nome		= $_POST['nome'];
$email		= $_POST['email'];
$assunto	= $_POST['assunto'];
$telefone 	= $_POST['telefone'];
$mensagem	= $_POST['mensagem'];

$email_envio  = 'contato@kapri.com.br'; // URL do Site

if(!empty($nome)){
    // Inicia a classe PHPMailer
    $mail = new PHPMailer();

    // Define os dados do servidor e tipo de conexão
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->IsSMTP(); // Define que a mensagem será SMTP
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.espacokapri.com.br"; // Endereço do servidor SMTP
    $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional) - bom ter pra não ir pra spam
    $mail->Port = 465;
    $mail->Username = 'contato@espacokapri.com.br'; // Usuário do servidor SMTP
    $mail->Password = '200814Laura'; // Senha do servidor SMTP


    // Define o remetente
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->From = $email; // Seu e-mail
    //$mail->From = 'thiagonegro@hotmail.com'; // Seu e-mail
    $mail->FromName = 'Kapri'; // Seu nome

    // Define os destinatário(s)
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->AddAddress('contato@espacokapri.com.br', 'Contato Espaço Kapri');
    //$mail->AddAddress($email);
    //$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
    //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

    // Define os dados técnicos da Mensagem
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
    $mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
    $mail->Subject = $assunto; // Assunto da mensagem
    $mail->Body = 'Nome: ' . $nome;
    $mail->Body .= '<br>Email: ' . $email;
    $mail->Body .= '<br>Assunto: ' . $assunto;
    $mail->Body .= '<br>Telefone: ' . $telefone;
    $mail->Body .= '<br> Mensagem: ' . $mensagem;

    // Envia o e-mail
    $enviado = $mail->Send();

    if($enviado){
        //echo '<script>alert("Enviado");</script>';
        echo '<span>Mensagem enviada!</span><p>Em breve eu entro em contato com você. Abraços.</p>';
    }else{
        //echo '<script>alert("Erro");</script>';
        echo '<span>Falha no envio!</span><p>Você pode tentar novamente, ou enviar direto para o e-mail' . $site_url . '</p>';
    }

    // Limpa os destinatários e os anexos
    //$mail->ClearAllRecipients();
    //$mail->ClearAttachments();

}else{
    echo '<p style="background-color:#FA8072; color:#8B0000; padding:10px;">Houve um erro ao fazer o cadastro. Tente novamente.</p>';
}


//echo '<script>alert("' . $nome . '");</script>';
