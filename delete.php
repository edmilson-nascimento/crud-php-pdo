<?php

include_once 'connection.php';

if (isset($conn)) {
    
    $delete = $conn->prepare('delete from pessoa where idpessoa = ?;');
    
    $delete->bindParam(1, $id, PDO::PARAM_INT);
    
    $id = 10 ;
    
    $delete->execute();
    
    $delete->closeCursor();
    
    $conn = null;
}

?>