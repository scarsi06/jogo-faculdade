<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Captura e limpa os dados do formulário
    $nome = htmlspecialchars(trim($_POST["nome"] ?? ""));
    $email = htmlspecialchars(trim($_POST["email"] ?? ""));
    $mensagem = htmlspecialchars(trim($_POST["mensagem"] ?? ""));

    // Validação básica
    if (empty($nome) || empty($email) || empty($mensagem)) {
        echo "Por favor, preencha todos os campos.";
        exit;
    }

    // Aqui você pode enviar um email, salvar no banco, etc.
    // Exemplo: envio de email
    $para = "seu-email@seudominio.com"; // coloque seu email aqui
    $assunto = "Nova mensagem de contato";
    $corpo = "Nome: $nome\nEmail: $email\nMensagem:\n$mensagem";
    $headers = "From: $email";

    if (mail($para, $assunto, $corpo, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem.";
    }
} else {
    // Se não for uma requisição POST, retorna erro
    http_response_code(405); // Método não permitido
    echo "Método não permitido.";
}
?>