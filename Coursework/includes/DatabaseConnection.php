<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=web_cw;charset=utf8mb4', 'root', '');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $title = 'Database connection error';
    $output = 'Cannot connect to Database: ' . $e->getMessage();
    echo $output;
    exit();
}
?>