<?php
/* Include database connection file */
require_once './install.php';

// Get the post ID
if (isset($_GET['post_id'])) {
    $postId = $_GET['post_id'];
} else {
    // So we always have a post ID var defined
    $postId = 0;
}

/* Global $pdo object */
global $pdo;

/* Select query template */
$query = 'SELECT `title`, `created_at`, `body`
              FROM `post`
              WHERE `id`=:id';

$values = [':id' => $postId];

try {
    $res = $pdo->prepare($query);
    $res->execute($values);
} catch (PDOException $e) {
    /* If there is a PDO exception, throw a standard exception */
    throw new Exception('Database query error line 20');
}

// Let's get a row
$row = $res->fetch(PDO::FETCH_ASSOC);
echo gettype($row);
echo '<pre>';
print_r($row);
echo '</pre>';
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        A blog application |
        <?php echo htmlspecialchars($row['title'], ENT_HTML5, 'UTF-8') ?>
    </title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>

<body>
    <h1>Blog title</h1>
    <p>This paragraph summarises what the blog is about.</p>

    <h2>
        <?php echo htmlspecialchars($row['title'], ENT_HTML5, 'UTF-8') ?>
    </h2>
    <div>
        <?php echo $row['created_at'] ?>
    </div>
    <p>
        <?php echo htmlspecialchars($row['body'], ENT_HTML5, 'UTF-8') ?>
    </p>
</body>

</html>