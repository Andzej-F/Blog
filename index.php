<?php

/* Include database connection file */
require_once './install.php';

/* Global $pdo object */
global $pdo;

/* Select query template */
$query = 'SELECT `id`, `title`, `created_at`, `body`
              FROM `post`
              ORDER BY `created_at` DESC';

/* Execute the query */
try {
    $res = $pdo->prepare($query);
    $res->execute();
    // $result = $res->fetchAll();
} catch (PDOException $e) {
    /* If there is a PDO exception, throw a standard exception */
    throw new Exception('Database query error line 21');
}
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
    <h1>Blog title</h1>
    <p>This paragraph summarises what the blog is about</p>

    <?php
    /* Consequent calls to the "fetch" function will return the resulting
       rows one by one*/
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) :

    ?>
        <h2>
            <?php echo htmlspecialchars($row['title'], ENT_HTML5, 'UTF-8') ?>
        </h2>
        <div>
            <?php echo $row['created_at'] ?>
        </div>
        <p>
            <?php echo htmlspecialchars($row['body'], ENT_HTML5, 'UTF-8') ?>
        </p>
        <p>
            <a href="view-post.php?post_id=<?= $row[$id] ?>">Read more...</a>
        </p>
    <?php endwhile ?>
</body>

</html>