<?php

require 'config.php';

// captura do id
$id = filter_input(INPUT_GET, 'id');

// testar o id 
if($id){
    $sql = $pdo->prepare("DELETE FROM usuario WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
}

header("Location: index.php");

?>