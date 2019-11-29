<?php

session_start();

// Conexão com o banco de dados
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_EMAIL);
$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_EMAIL);

$result_usuario = "INSERT INTO usuarios (nome, email, telefone, created) VALUES ('$nome', '$email', '$telefone', NOW())";
$resultado_usuario = mysqli_query($conn ,$result_usuario);

if(mysqli_insert_id($conn)):
    $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso</p>";
    header ("Location: index.php");
else:
    $_SESSION['msg'] = "<p style='color: red;'>Usuário não foi cadastrado com sucesso</p>";
    header ("Location: index.php");
endif;

// Envio das informações por email
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];

require 'vendor/autoload.php';
$from = new SendGrid\Email(null, "romarioraoc@gmail.com");
$subject = "Mensagem de contato";
$to = new SendGrid\Email(null, "oliveira-campos@outlook.com.br");
$content = new SendGrid\Content("text/html", "Olá Escala Web, <br><br>Nova mensagem de contato<br><br>Nome: $nome<br>Email: $email<br>Telefone: $telefone <br>Mensagem: $mensagem");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

//Necessário inserir a chave
$apiKey = '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';
$sg = new \SendGrid($apiKey);
$response = $sg->client->mail()->send()->post($mail);
echo "Mensagem enviada com sucesso";
?>