<?php ob_start() ?>

<h1>Ajouter un lieu</h1>

<form action="index.php?action=ajouterLieu" method="POST">
    <label for="nomLieu"> Nom du lieu :
        <input type="text" name="nomLieu" id="nomLieu">
    </label>
    <input class="btn" type="submit" name="submit" value="Envoyer">
</form>

<?php

$title = "Ajouter un lieu";
$content = ob_get_clean();
require "./Views/template.php";