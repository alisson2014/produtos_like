<?php
$server = "localhost";
$user = "root";
$password = "";
$dataBase = "produtos like";

try {
    $pdo = new PDO("mysql:host={$server};dbname={$dataBase};charset=utf8;", $user, $password);
} catch (Exception $erro) {
    echo "<p>Erro ao conectar com o a base de dados: {$erro}</p>";
}
