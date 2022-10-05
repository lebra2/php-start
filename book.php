<?php

require_once('connection.php');

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();

var_dump($book);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $id ?></title>
</head>
<body>
    <h1><?=$book['title'];?></h1>
    <img src="<?= $book['cover_path']?>" alt="">
    <h1>Price: $<?=$book['price'];?></h1>
    <h1><?=$book['release_year'];?></h1>
    <h1><?=$book['summary'];?></h1>
    <h1>Amount: <?=$book['stock_saldo'];?></h1>
    <h1>Pages: <?=$book['pages'];?></h1>
    <h1>Language:<?=$book['language'];?></h1>
    <h1>Type:<?=$book['type'];?></h1>
    
</body>
</html>