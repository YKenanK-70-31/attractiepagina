<?php
session_start();
require_once 'admin/backend/config.php';
require_once 'admin/backend/conn.php';

$query = "SELECT * FROM rides ORDER BY title ASC"; 
$statement = $conn->prepare($query);
$statement->execute();
$rides = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="nl">

<head>
    <title>Attractiepagina</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/main.css">
    <link rel="icon" href="<?php echo $base_url; ?>/favicon.ico" type="image/x-icon" />
</head>

<body>

    <?php require_once 'header.php'; ?>
    <div class="container content">
        <aside>
            <h2>Themagebieden</h2>
            <ul>
                <li>Familyland</li>
                <li>Waterland</li>
                <li>Adventureland</li>
            </ul>
        </aside>
        <main>
            <div class="attracties">
                <?php foreach($rides as $ride): ?>
                    <div class="attractie"> 
                        <img src="<?php echo $base_url; ?>/img/attracties/<?php echo $ride['img_file']; ?>" alt="<?php echo htmlspecialchars($ride['title']); ?>"/>
                        <div class="attractie-info">
                            <p class="themeland"><?php echo ucfirst($ride['themeland']); ?></p>
                            <h2><?php echo htmlspecialchars($ride['title']); ?></h2>
                            <p class="description"><?php echo htmlspecialchars($ride['description']); ?></p>
                            <?php if($ride['min_length']): ?>
                                <p class="length"><?php echo $ride['min_length']; ?> cm</p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>

</body>

</html>