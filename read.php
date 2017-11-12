<?php

include_once 'connection.php';

if (isset($conn)) {
    
    $read = $conn->prepare('SELECT * FROM pessoa WHERE idpessoa < ?');
    
    $id = 10;
    
    $read->bindParam(1, $id, PDO::PARAM_INT);
    
    $read->execute();
    
    foreach ($read as $row) {
        print $row['idpessoa'] . "\t";
        print $row['nome'] . "\t";
        print $row['email'] . "<br/>";
    }
    
    $update->closeCursor();
    
    $conn = null;
}

?>