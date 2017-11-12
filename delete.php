<?php

include_once 'connection.php';

if (isset($conn)) {
    
    $update = $conn->prepare('delete from pessoa where idpessoa = ?;');
    
    $update->bindParam(1, $id, PDO::PARAM_INT);
    
    $id = 10 ;
    
    $update->execute();
    
    $update->closeCursor();
    
    $conn = null;
}

?>