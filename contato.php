<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = strip_tags(trim($_POST["nome"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mensagem = trim($_POST["mensagem"]);

    // Verifica se os campos estão preenchidos
    if (empty($nome) || empty($mensagem) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, preencha todos os campos corretamente.";
        exit;
    }

    // Defina para qual e-mail será enviado
    $para = "guiweisebooks@gmail.com"; // Substitua pelo seu e-mail
    $assunto = "GW EBOOKS - Contato";

    // Cabeçalhos do e-mail
    $headers = "From: $nome <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Corpo da mensagem
    $conteudo = "Nome: $nome\n";
    $conteudo .= "Email: $email\n\n";
    $conteudo .= "Mensagem:\n$mensagem\n";

    // Envio do e-mail
    if (mail($para, $assunto, $conteudo, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar. Tente novamente mais tarde.";
    }
}
?>