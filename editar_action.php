<?php
require 'config.php';

// Capturando dados do editar
$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($id && $nome && $email){

    // passando as variaveis capturas para o sql
    $sql = $pdo->prepare("UPDATE usuario SET nome = :nome, email =:email WHERE id = :id");
    $sql->bindValue(':nome',$nome);
    $sql->bindValue(':email',$email);
    $sql->bindValue(':id',$id);
    $sql->execute();

    // se der tudo certo, volta pra index
    header("Location: index.php");
    exit; // sair dessa pagina
}else{
    // se der tudo certo, volta pra listar_usuario
    header("Location: index.php");
    exit; // sair dessa pagina
}