<!-- ✅ enctype toegevoegd -->
<form action="../backend/ridesController.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="old_img" value="<?php echo $ride['img_file']; ?>">

    <div class="form-group">
        <label for="title">Titel:</label>
        <input type="text" name="title" id="title" class="form-input" value="<?php echo htmlspecialchars($ride['title']); ?>">
    </div>
    <div class="form-group">
        <label for="themeland">Themagebied:</label>
        <select name="themeland" id="themeland" class="form-input">
            <option value=""> - kies een optie - </option>
            <option value="familyland"    <?php if($ride['themeland'] == 'familyland')    echo 'selected'; ?>>Familyland</option>
            <option value="waterland"     <?php if($ride['themeland'] == 'waterland')     echo 'selected'; ?>>Waterland</option>
            <option value="adventureland" <?php if($ride['themeland'] == 'adventureland') echo 'selected'; ?>>Adventureland</option>
        </select>
    </div>

    <!-- ✅ Nieuw: min_length -->
    <div class="form-group">
        <label for="min_length">Minimale lengte (cm):</label>
        <input type="number" name="min_length" id="min_length" class="form-input" value="<?php echo $ride['min_length']; ?>">
    </div>

    <!-- ✅ Nieuw: description -->
    <div class="form-group">
        <label for="description">Beschrijving:</label>
        <textarea name="description" id="description" class="form-input"><?php echo htmlspecialchars($ride['description']); ?></textarea>
    </div>

    <div class="form-group">
        <label for="img_file">Afbeelding:</label>
        <img src="<?php echo $base_url . "/img/attracties/" . $ride['img_file']; ?>" alt="attractiefoto" style="max-width: 120px;">
        <input type="file" name="img_file" id="img_file" class="form-input">
    </div>
    <div class="form-group">
        <label for="fast_pass">FAST PASS:</label>
        <input type="checkbox" name="fast_pass" id="fast_pass" <?php if($ride['fast_pass']) echo 'checked'; ?>>
        <label for="fast_pass">Voor deze attractie is een FAST PASS nodig.</label>
    </div>

    <input type="submit" value="Attractie aanpassen">
</form>