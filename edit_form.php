<?php

require_once('connection.php');

$id = $_GET['id'];

if (isset($_POST['submit'])) {

    $stmt = $pdo->prepare('UPDATE books SET title = :title, stock_saldo = :stock_saldo WHERE id = :id');
    $stmt->execute(['title' => $_POST['title'], 'stock_saldo' => $_POST['stock_saldo'], 'id' => $id]);

    $stmt = $pdo->prepare('UPDATE book_authors SET author_id = :author_id  WHERE book_id = :book_id');
    $stmt->execute(['author_id' => $_POST['author_id'], 'book_id' => $id]);

    header('Location: book.php?id=' . $id);
}




$stmt = $pdo->prepare('SELECT * FROM books b LEFT JOIN book_authors ba ON b.id=ba.book_id WHERE b.id = :id');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();


$stmtBookAuthors = $pdo->prepare('SELECT * FROM book_authors ba LEFT JOIN authors a ON a.id=ba.author_id  WHERE ba.book_id = :book_id');
$stmtBookAuthors->execute(['book_id' => $id]);

$stmtAuthors = $pdo->query('SELECT * FROM authors');

// var_dump($_POST['title']);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
</head>
<body>
    
    <form action="edit_form.php?id=<?=$id?>" method="POST">
        <label for="save">Pealkiri:</label><br>
        <input type="text" name="title" value="<?=$book['title'];?>"><br><br>

        <label for="save">Laos:</label><br>
        <input type="text" name="stock_saldo" value="<?=$book['stock_saldo'];?>"><br><br>
        <div style="font-weight: bold;">Autorid</div>

        <select name="author_id">
            <option value=""></option>
            <?php while ($author = $stmtAuthors->fetch()) { ?>
                <option value="<?=$author['id'];?>" <?=$author['id'] == $book['author_id'] ? 'selected' : '';?>>
                <?=$author['first_name'];?> <?=$author['last_name'];?>
                </option>
            <?php } ?>
        </select>
        

        <input type="submit" value="submit" name="submit">
    </form> 
</body>
</html>