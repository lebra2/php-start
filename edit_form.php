<?php

require_once('connection.php');

$id = $_GET['id'];

if (isset($_POST['submit'])) {

    $stmt = $pdo->prepare('UPDATE books SET title = :title, stock_saldo = :stock_saldo WHERE id = :id');
    $stmt->execute(['title' => $_POST['title'], 'stock_saldo' => $_POST['stock_saldo'], 'id' => $id]);

    header('Location: book.php?id=' . $id);
}




$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();

// var_dump($_POST['title']);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="edit_form.php?id=<?=$id?>" method="POST">
        <label for="save">Pealkiri:</label><br>
        <input type="text" name="title" value="<?=$book['title'];?>"><br><br>

        <label for="save">Laos:</label><br>
        <input type="text" name="stock_saldo" value="<?=$book['stock_saldo'];?>"><br><br>

        <input type="submit" value="Submit" name="submit">
    </form> 
</body>
</html>