<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configurações do servidor SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Servidor SMTP
    $mail->SMTPAuth   = true;
    $mail->Username   = 'frequenciaaberta.rpc@gmail.com'; // Seu e-mail
    $mail->Password   = 'wpkv yjmd stzg pkgv';   // Sua senha ou App Password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Remetente e destinatário
    $mail->setFrom('seuemail@gmail.com', 'Seu Nome');
    $mail->addAddress('destinatario@exemplo.com', 'Nome do Destinatário');

    // Conteúdo do e-mail
    $mail->isHTML(true);
    $mail->Subject = 'Assunto do E-mail';
    $mail->Body    = '<b>Mensagem em HTML</b>';
    $mail->AltBody = 'Mensagem em texto puro';

    $mail->send();
    echo 'E-mail enviado com sucesso!';
} catch (Exception $e) {
    echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
}