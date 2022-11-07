<?php

require_once('connection.php');

$stmt = $pdo->query("SELECT * FROM books WHERE CONCAT(title, release_date,language,summary,type) LIKE '%$qry%'");
while ($row = $stmt->fetch())
{
    $title = $row['title'];
    $id = $row['id'];

    ?>

    <tr>
        <td><a href='book.php?id=<?php echo $id ?>'><?php echo $title ?></a></td>
        <td><php echo $row['language'] ?></td>
        <td><?php echo number_format(round($row['price'], 2), 2, ',') ?></td>
    </tr>

    <?php
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Search Bar using PHP</title>
</head>
<body>

        <form method="GET">
        <label>Search</label>
        <input type="text" name="search">
        <input type="submit" name="submit">
            
        </form>
</body>
</html>

