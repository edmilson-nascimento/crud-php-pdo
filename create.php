<?php

include_once 'connection.php';

if (isset($conn)) {
    
    // $insert = $conn->prepare("INSERT INTO PESSOA (nome, email) VALUES (?, ?)");
    // $insert->bindParam(1, $nome);
    // $insert->bindParam(2, $email);
    
    $insert = $conn->prepare("INSERT INTO PESSOA (nome, email) VALUES (:nome, :email)");
    $insert->bindParam(':nome', $nome);
    $insert->bindParam(':email', $email);
    
    $nome = 'Nascimento';
    $email = 'name@mail.com';
    
    $insert->execute();
    
    $update->closeCursor();
    
    $conn = null;
}

?>