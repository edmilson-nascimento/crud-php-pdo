<?php

$username = 'root';
$password = '1234';

try {
    
    $conn = new PDO('mysql:host=localhost;dbname=exercicio', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>