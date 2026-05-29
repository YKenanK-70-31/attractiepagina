<form action="../backend/ridesController.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="create">

    <div class="form-group">
        <label for="title">Titel:</label>
        <input type="text" name="title" id="title" class="form-input">
    </div>
    <div class="form-group">
        <label for="themeland">Themagebied:</label>
        <select name="themeland" id="themeland" class="form-input">
            <option value=""> - kies een optie - </option>
            <option value="familyland">Familyland</option>
            <option value="waterland">Waterland</option>
            <option value="adventureland">Adventureland</option>
        </select>
    </div>

    <!-- ✅ Nieuw: min_length -->
    <div class="form-group">
        <label for="min_length">Minimale lengte (cm):</label>
        <input type="number" name="min_length" id="min_length" class="form-input">
    </div>

    <!-- ✅ Nieuw: description -->
    <div class="form-group">
        <label for="description">Beschrijving:</label>
        <textarea name="description" id="description" class="form-input"></textarea>
    </div>

    <div class="form-group">
        <label for="img_file">Afbeelding:</label>
        <input type="file" name="img_file" id="img_file" class="form-input">
    </div>
    <div class="form-group">
        <label for="fast_pass">FAST PASS:</label>
        <input type="checkbox" name="fast_pass" id="fast_pass">
        <label for="fast_pass">Voor deze attractie is een FAST PASS nodig.</label>
    </div>

    <input type="submit" value="Attractie aanmaken">
</form>  <!-- ✅ Sluit de form tag -->