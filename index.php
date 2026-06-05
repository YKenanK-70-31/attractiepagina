<?php
session_start();
require_once 'backend/config.php';
require_once 'backend/conn.php';

$query = "SELECT * FROM berichten ORDER BY title ASC";
$statement = $conn->prepare($query);
$statement->execute();
$berichten = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="nl">

<head>
    <title>Berichten</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/main.css">
</head>

<body>

    <?php require_once 'header.php'; ?>

    <div class="container">

        <ul>
            <?php foreach($berichten as $bericht): ?>
                <li>
                    <a href="berichten/edit.php?id=<?php echo $bericht['id']; ?>">
                        <?php echo htmlspecialchars($bericht['title']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

    </div>

</body>

</html>