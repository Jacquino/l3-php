<?php

// https://www.php.net/manual/fr/book.pdo.php
// https://www.php.net/manual/fr/pdo.connections.php

// Connexion a la base de donnee
$user = 'root';
$pass = 'password';

$db = new PDO('mysql:host=mysql;dbname=eurovent', $user, $pass);
// SELECT
try {
    $db ->query("Create TABLE product (id INT PRIMARY KEY NOT NULL,name VARCHAR(100),price DOUBLE)");

}catch (PDOException $e){
    echo $e->getMessage();
}
$db -> query("Update TABLE product (id INT PRIMARY KEY NOT NULL,name VARCHAR(100),price DOUBLE)");
$db ->query("Insert INTO product (id,name,price) values (0,'lampe',10.00),(1,'tapis',100.00)");
foreach ($db ->query("Select * from product",PDO::FETCH_ASSOC ) as $row){
    print_r($row);
}
// Create table
// INSERT

