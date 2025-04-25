<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $idade = htmlspecialchars($_POST['idade']);
    $endereco = htmlspecialchars($_POST['endereco']);

    // E-mail de destino
    $destinatario = "frequenciaaberta.rpc@gmail.com";  // <-- altere para seu e-mail real
    $assunto = "Novo formulário recebido";

    $mensagem = "Novo formulário enviado:\n\n";
    $mensagem .= "Nome: $nome\n";
    $mensagem .= "Idade: $idade\n";
    $mensagem .= "Endereço: $endereco\n";

    $headers = "From: formulario@seudominio.com"; // Opcional: ajuste se tiver domínio próprio

    if (mail($destinatario, $assunto, $mensagem, $headers)) {
        echo "Formulário enviado com sucesso!";
    } else {
        echo "Erro ao enviar o formulário.";
    }
}
?>
