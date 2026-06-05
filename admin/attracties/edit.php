<?php 
require_once '../backend/config.php'; 
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
        <h3>Aanpassen</h3>
        <?php
        $id = $_GET['id'];
        require_once '../backend/conn.php';
        $query = "SELECT * FROM planten WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->execute([":id" => $id]);
        $plant = $statement->fetch(PDO::FETCH_ASSOC);
        ?>

        <!-- Formulier voor edit: -->
        <form action="../backend/plantenController.php" method="POST">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="titel">Titel:</label>
                <input type="text" name="titel" id="titel" value="<?php echo htmlspecialchars($plant['titel']); ?>">
            </div>
            <div class="form-group">
                <label for="beschrijving">Beschrijving:</label>
                <textarea name="beschrijving" id="beschrijving" cols="30" rows="10"><?php echo htmlspecialchars($plant['beschrijving']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="familie">Familie:</label>
                <input type="text" name="familie" id="familie" value="<?php echo htmlspecialchars($plant['familie']); ?>">
            </div>
            <div class="form-group">
                <label for="leverancier">Leverancier:</label>
                <input type="text" name="leverancier" id="leverancier" value="<?php echo htmlspecialchars($plant['leverancier']); ?>">
            </div>
            <div class="form-group">
                <label for="aanbieding">Aanbieding:</label>
                <input type="checkbox" name="aanbieding" id="aanbieding" value="1" <?php if($plant['aanbieding']) echo 'checked'; ?>>
            </div>
            <input type="submit" value="Opslaan">
        </form>

        
        <form action="../backend/plantenController.php" method="POST">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Verwijderen">
        </form>
    </div>  
</body>
</html>