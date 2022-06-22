<?php 
    ob_start();
    $gaulois = $stmtGaulois->fetch(); 
?>

<h1><?= $gaulois["nom_personnage"] ?></h1>

<p>
    <strong>Lieu : </strong><a href="index.php?action=detailLieu&id=<?= $gaulois["id_lieu"] ?>"><?= $gaulois["nom_lieu"] ?></a> <br>
    <strong>Spécialité :</strong>  <?= $gaulois["nom_specialite"] ?>
</p>

<?php

$title = "Détail d'un gaulois";
$content = ob_get_clean();
require "./Views/template.php";