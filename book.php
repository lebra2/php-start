<?php

require_once('connection.php');

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();

$stmt = $pdo->prepare('SELECT * FROM d107230_leopard.authors LEFT JOIN book_authors ON authors.id=book_authors.author_id WHERE book_authors.book_id = :id');
$stmt->execute(['id' => $id]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" media="screen">
    <title><?php echo $id ?></title>
</head>
<body>
    <h1><?=$book['title'];?></h1>
    <?php
    while ($author = $stmt->fetch())
    {
        echo '<li>' . $author['first_name'] . ' ' . $author['last_name'] . '</li>';
    }
    ?>
    <img src="<?= $book['cover_path']?>" alt="">
    <h1 class="price">Price: $<?=$book['price'];?></h1>
    <h1><?=$book['release_year'];?></h1>
    <h1><?=$book['summary'];?></h1>
    <h1>Amount: <?=$book['stock_saldo'];?></h1>
    <h1>Pages: <?=$book['pages'];?></h1>
    <h1>Language:<?=$book['language'];?></h1>
    <h1>Type:<?=$book['type'];?></h1>

    <div>
        <span><a href="edit_form.php?id=<?=$book['id'];?>">Muuda</a></span>
        <span><a href="insert.php?">Insert</a></span>
    
    
        <form action="delete.php" method="POST">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="submit" value="Kustuta" name="delete">
        </form>

    </div>
    
</body>
</html>