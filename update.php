<?php

include_once 'connection.php';

if (isset($conn)) {
    
    $update = $conn->prepare('UPDATE pessoa set nome = ?, email = ? where idpessoa = ?;');
    
    $update->bindParam(1, $nome, PDO::PARAM_STR);
    $update->bindParam(2, $email, PDO::PARAM_STR);
    $update->bindParam(3, $id, PDO::PARAM_INT);
    
    $id    = 10 ;
    $nome  = "Ana";
    $email = "outro@kindle.com";
    
    $update->execute();
    
    $update->closeCursor();
    
    $conn = null;
}

?>