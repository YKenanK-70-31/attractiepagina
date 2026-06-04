<?php
session_start();
require_once '../backend/config.php';
if (!isset($_SESSION['user_id'])) {
    $msg = "Je moet eerst inloggen!";
    header("Location: $base_url/admin/login.php?msg=$msg");
    exit;
}
?>
<!doctype html>
<html lang="nl">
<head>
    <title>Attractiepagina / Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/main.css">
    <link rel="icon" href="<?php echo $base_url; ?>/favicon.ico" type="image/x-icon" />
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px 12px; text-align: left; border: 1px solid #ddd; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:nth-child(odd)  { background-color: #ffffff; }
        th { background-color: #333; color: #fff; }
    </style>
</head>
<body>
    <?php require_once '../../header.php'; ?>
    <div class="container">

        <a href="create.php">Nieuwe attractie maken &gt;</a>

        <?php
        require_once '../backend/conn.php';
        $query = "SELECT * FROM rides ORDER BY title ASC"; 
        $statement = $conn->prepare($query);
        $statement->execute();
        $rides = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <!-- ✅ Teller -->
        <p>De lijst bevat <?php echo count($rides); ?> attracties.</p>

        <table>
            <tr>
                <th>Titel</th>
                <th>Themagebied</th>
                <th>Min. lengte</th>
                <th>Fast Pass</th>
                <th>Acties</th>
            </tr>
            <?php foreach ($rides as $ride): ?>
                <tr>
                    <td><?php echo htmlspecialchars($ride['title']); ?></td>
                    <!-- ✅ Hoofdletter via ucfirst() -->
                    <td><?php echo ucfirst($ride['themeland']); ?></td>
                    <!-- ✅ Eenheid achter lengte -->
                    <td><?php echo $ride['min_length'] ? $ride['min_length'] . ' cm' : '-'; ?></td>
                    <!-- ✅ 1/0 naar Ja/Nee -->
                    <td><?php echo $ride['fast_pass'] ? 'Ja' : 'Nee'; ?></td>
                    <td><a href="edit.php?id=<?php echo $ride['id']; ?>">Aanpassen</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>
</body>
</html>zzz