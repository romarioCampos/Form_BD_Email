<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD - Cadastrar</title>
</head>

<body>
    <h1>Cadastrar Usuários</h1>

    <?php
    if(isset($_SESSION['msg'])):
        echo $_SESSION['msg'];
        unset ($_SESSION['msg']);
    endif;
    ?>

    <form method="POST" action="processa.php">
        <label> Nome: </label>
        <input type="text" name="nome" placeholder="Digite o nome completo" /><br><br>
        <label> Email: </label>
        <input type="email" name="email" placeholder="Digite o seu email" /><br><br>
        <label> Telefone: </label>
        <input type="telefone" name="telefone" placeholder="Digite o seu telefone" /><br><br>
        <label> Mensagem: </label><br>
        <textarea type="text" name="mensagem" rows="4" cols="50" placeholder="Digite sua mensagem aqui!" ></textarea><br><br>
        <input type="submit" value="Enviar" />
    </form>

</body>

</html>