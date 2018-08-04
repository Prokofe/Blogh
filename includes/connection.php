<?php 

try {
    $pdo = new PDO('mysql:host=localhost:3306;dbname=blogh', 'root', '');
} catch (PDOException $e){
    exit('Database error');
}