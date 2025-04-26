<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "O formulário deve ser POSTADO.";
    exit;
}

// Pega os dados do formulário
$nome      = $_POST['nome_completo'] ?? '';
$idade     = $_POST['idade'] ?? '';
$cidade    = $_POST['cidade'] ?? '';
$bairro    = $_POST['bairro'] ?? '';
$whatsapp  = $_POST['whatsapp'] ?? '';
$email     = $_POST['email'] ?? '';
$linkVideo = $_POST['link_video'] ?? '';

// Corpo do e-mail formatado
$body = "
<h2>Nova Inscrição Recebida</h2>
<p><strong>Nome:</strong> {$nome}</p>
<p><strong>Idade:</strong> {$idade}</p>
<p><strong>Cidade:</strong> {$cidade}</p>
<p><strong>Bairro:</strong> {$bairro}</p>
<p><strong>WhatsApp:</strong> {$whatsapp}</p>
<p><strong>Email:</strong> {$email}</p>
<p><strong>Link do Vídeo:</strong> <a href='{$linkVideo}'>{$linkVideo}</a></p>
";

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'frequenciaaberta.rpc@gmail.com';
    $mail->Password   = 'wpkv yjmd stzg pkgv';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('frequenciaaberta.rpc@gmail.com', 'Formulário Rede.com');
    $mail->addAddress('frequenciaaberta.rpc@gmail.com', 'Admin Rede.com');

    $mail->isHTML(true);
    $mail->Subject = 'Nova Inscrição - Rede.com';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();

    // Redireciona para a página de sucesso
    header('Location: sucesso.html');
    exit;
} catch (Exception $e) {
    echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
}
