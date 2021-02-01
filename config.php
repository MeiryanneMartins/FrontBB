<?php
    define('USER', 'root');
    define('PASSWORD', '');
    define('HOST', 'localhost');
    define('usuarios', 'usuarios');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".usuarios, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>