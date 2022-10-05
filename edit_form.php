<?php

require_once('connection.php');

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    echo "joujou1123";
}


$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();

var_dump($_POST);

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
    <form action="edit_form.php" method="POST">
        <label for="save">Pealkiri:</label><br>
        <input type="text" name="title" value="<?=$book['title'];?>"><br><br>
        <input type="submit" value="Submit" name="submit">
    </form> 
</body>
</html>