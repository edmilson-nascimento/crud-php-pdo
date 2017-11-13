# PHP CRUD usando PDO #

[![N|Solid](https://www.atlantasky.com/wp-content/uploads/2013/08/PHP-Mysql.png)](#)

Um exemplo básico ~muito básico mesmo~ da utilização de `PHP com PDO`. São arquivos `.php` e mais com script `.sql` (para criação da tabela usada nos exemplos). O conteúdo foi feito com base no [artigo do **devmedia**](https://www.devmedia.com.br/introducao-ao-php-pdo/24973)
As rotinas são as seguintes:
* [connection](#connection)
* [table](#table)
* [create](#create)
* [read](#read)
* [update](#update)
* [delete](#delete)

As rotinas são objetivas e podem servidor de base para outros projetos.

# connection #
Visando ~não precisar ficar copiando e colando~ reaproveitar o código que vai ser repetido em vários locais, criei o arquivo de conexão e vou usa-lo em todos as ações do `CRUD`.
```php
$username = 'root';
$password = '1234';

try {
    
    $conn = new PDO('mysql:host=localhost;dbname=exercicio', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
``` 

# table #
Abaixo segue `script` para criação da tabela usada no exemplo.
```sql
DROP TABLE IF EXISTS `exercicio`.`pessoa`;
CREATE TABLE  `exercicio`.`pessoa` (
  `idpessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`idpessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

```

# create #
Após feita a conexão, vamos a criação do registro.
```php
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
```


# read #
Fazendo a leitura do arquivo, e reforço que ~esta tudo zuado~ são dados de fictícios.
```php
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
```

# update #
A atualização será feita no `código` abaixo, tentando ater a forma mais simples e objetiva.
```php
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
```

# delete #
Abaixo a opção de eliminar registros. ~Mas ninguem usa isso porque qualquer um deve pensar em desativar ao invés de eliminar registros para manter histórico.~
```php
include_once 'connection.php';

if (isset($conn)) {
    
    $update = $conn->prepare('delete from pessoa where idpessoa = ?;');
    
    $update->bindParam(1, $id, PDO::PARAM_INT);
    
    $id = 10 ;
    
    $update->execute();
    
    $update->closeCursor();
    
    $conn = null;
}
```

