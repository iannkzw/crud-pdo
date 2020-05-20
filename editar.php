<?php

require 'Conn.php';

$conn = new Conn();

$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'] ?? null;
    $email = $_POST['email'] ?? null;

    $stmt = $conn->connect()->prepare('UPDATE cadastro SET nome= :nome, email= :email WHERE id= :id');
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    header("Location: index.php");
    die();
}

$stmt = $conn->connect()->prepare('SELECT * FROM cadastro WHERE id = :id');
$stmt->bindValue(':id', $id);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1 class="mb-4 mt-4 text-center">Editar Usuário</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="Nome">Nome:</label>
            <input type="text" class="form-control" placeholder="Nome completo" name="nome" value="<?= $user['nome']?>" id="nome" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" placeholder="Digite seu email" name="email" value="<?= $user['email']?>"  id="email" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a class="btn btn-outline-secondary" href="index.php">voltar</a>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>