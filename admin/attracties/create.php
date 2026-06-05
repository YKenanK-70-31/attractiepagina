<?php
session_start();
require_once '../backend/config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}
?>
<!doctype html>
<html lang="nl">
<head>
    <title>TOETS <?php echo ucfirst($app_name); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/main.css">
    <link rel="icon" href="<?php echo $base_url; ?>/favicon.ico" type="image/x-icon" />
</head>
<body>
    <?php require_once '../header.php'; ?>
    <div class="container">
        <h3>Nieuw</h3>
        <form action="../backend/plantenController.php" method="POST">
            <input type="hidden" name="action" value="create">
            <div class="form-group">
                <label for="titel">Titel:</label>
                <input type="text" name="titel" id="titel" required>
            </div>
            <div class="form-group">
                <label for="beschrijving">Beschrijving:</label>
                <textarea name="beschrijving" id="beschrijving" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="familie">Familie:</label>
                <input type="text" name="familie" id="familie">
            </div>
            <div class="form-group">
                <label for="leverancier">Leverancier:</label>
                <select name="leverancier" id="leverancier">
                    <option value="plantBV">plantBV</option>
                    <option value="SuperFlower">SuperFlower</option>
                    <option value="treeFactory">treeFactory</option>
                </select>
            </div>
            <div class="form-group">
                <label for="aanbieding">Aanbieding:</label>
                <input type="checkbox" name="aanbieding" id="aanbieding" value="1">
            </div>
            <input type="submit" value="Opslaan">
        </form>
    </div>
</body>
</html>