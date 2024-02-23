<?php
require 'config.php';

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

// tratamendo dos dados
if($nome && $email){

    // Verificando se o email já existe (para não ter duplicação)

    // preparando a consulta
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() === 0){
        $sql = $pdo->prepare("INSERT INTO usuario (nome, email) VALUES (:nome, :email)");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        
        $sql->execute();
        
        print "<p class='alert alert-danger'>Cadastro Realizado!</p>";
        header("Location: index.php");
        exit;
    }else{
        header("Location: index.php");
    }

} else{
    header("Location:index.php");
    exit;
}

