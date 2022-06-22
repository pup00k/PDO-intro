<?php ob_start() ?>

<h1>Ajouter un gaulois</h1>

<form action="index.php?action=ajouterGaulois" method="POST">
    <!-- Nom du personnage -->
    <label for="nomPersonnage"> Nom du personnage :
        <input type="text" name="nomPersonnage" id="nomPersonnage" required>
    </label>
    <!-- Adresse du personnage -->
    <label for="adressePersonnage"> Adresse :
        <input type="text" name="adressePersonnage" id="adressePersonnage">
    </label>
    <!-- Nom du lieu -->
    <label for="lieu"> Lieu :
        <select name="lieu" id="lieu">
            <?php
        foreach ($stmtLieux->fetchAll() as $lieu) { ?>
            <option value="<?= $lieu["id_lieu"] ?>"><?= $lieu["nom_lieu"] ?></option>
            <?php } ?>
        </select>
    </label>
    <!-- Nom de la spécialité -->
    <label for="specialite"> Spécialité :
        <select name="specialite" id="specialite">
            <?php
        foreach ($stmtSpecialites->fetchAll() as $specialite) { ?>
            <option value="<?= $specialite["id_specialite"] ?>"><?= $specialite["nom_specialite"] ?></option>
            <?php } ?>
        </select>
    </label>
    <!-- Bouton de soumission du formulaire -->
    <input class="btn" type="submit" name="submit" value="Envoyer">
</form>

<?php

$title = "Ajouter un lieu";
$content = ob_get_clean();
require "./Views/template.php";