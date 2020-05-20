<?php

require 'Conn.php';

$conn = new Conn();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'] ?? null;
    $email = $_POST['email'] ?? null;

    $stmt = $conn->connect()->prepare('INSERT INTO cadastro (nome, email) VALUES (:nome, :email)');
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':email', $email);
    $stmt->execute();

    header("Location: index.php");
    die();
}

?>

