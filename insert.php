<?php

require_once('connection.php');

// $id = $_POST['id'];
// var_dump($_POST);

if (isset($_POST['add-author'])) {

    $stmt = $pdo->prepare('INSERT INTO authors (first_name, last_name) VALUES (:first_name, :last_name)');
    $stmt->execute(['first_name' => $_POST['first-name'], 'last_name' => $_POST['last-name']]);

    header('Location: index.php');
}
// $stmt->execute(['id' => $id]);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Author Page</title>
</head>
<body>
        <form action="insert.php" method="POST">
            <input type="text" name="first-name" placeholder="Eesnimi">
            <input type="text" name="last-name" placeholder="Perenimi">
            <input type="submit" name="add-author" value="Lisa">
        </form>
</body>
</html>