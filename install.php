<?php
/* Database connection script */

/* Host name of the MySQL server */
$host = 'localhost';

/* MySQL account username */
$user = 'root';

/* MySQL account password */
$passwd = '';

/* Schema name */
$schema = 'blog';

/* The PDO object */
$pdo = NULL;

/* Connection string ("data source name") */
$dsn = 'mysql:host=' . $host . ';dbname=' . $schema;

/* Connection inside a try/catch block */
try {
    /* PDO object creation */
    $pdo = new PDO($dsn, $user, $passwd);

    /* Enable exceptions on errors */
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    /* If there is an error an exception is thrown */
    echo 'Database connection failed<br>';
    echo 'Error number: ' . $error->getCode() . '<br>';
    echo 'Error message: ' . $error->getMessage() . '<br>';
    exit();
}

/* Display success message */
echo 'Successfully connected!<br>';

/* Check how many rows were created in the database */

/*  Query string */
$query = 'SELECT COUNT(*) FROM `post`';

/* Start try/catch block to catch PDO exceptions */
try {
    /* Prepare step */
    $result = $pdo->prepare($query);

    /* Execute step */
    $result->execute();
} catch (PDOException $error) {
    /* If there is an eroor an exception is thrown */
    $error = 'Query error: ' . $error->getMessage();
    // exit();
}

/* Get the number or rows in a schema */
$numberOfRows = $result->fetchColumn();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Blog installer</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <style type="text/css">
        .box {
            border: 1px dotted silver;
            border-radius: 5px;
            padding: 4px;
        }

        .error {
            background-color: #ff6666;
        }

        .success {
            background-color: #88ff88;
        }
    </style>
</head>

<body>
    <?php
    global $error;
    if ($error) : ?>
        <div class="error box">
            <?php echo $error ?>
        </div>
    <?php else : ?>
        <div class="success box">
            The database and demo data was created OK.
            <?php if ($numberOfRows) : ?>
                <?php echo $numberOfRows ?> new rows were created.
            <?php endif ?>
        </div>
    <?php endif ?>
</body>

</html>