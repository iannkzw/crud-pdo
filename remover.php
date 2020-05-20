<?php

require 'Conn.php';
$conn = new Conn();

$id = $_GET['id'] ?? null;

$stmt = $conn->connect()->prepare('DELETE FROM cadastro WHERE id = :id');
$stmt->bindValue(':id', $id);
$stmt->execute();

header("Location: index.php");