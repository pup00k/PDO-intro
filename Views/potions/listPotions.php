<?php ob_start() ?>

<h1>Liste des potions</h1>

<p>Il y a <?= $stmt->rowCount() ?> potions</p>

<?php //var_dump($stmt->fetchAll()); ?>

<div class="cards">
    <?php
    foreach($stmt->fetchAll() as $potion): ?>
    <div class="card">
        <i class="fa-solid fa-capsules"></i>
        <h3><?= $potion["nom_potion"]; ?></h3>
    </div>
    <?php endforeach; ?> 
</div>

<?php

$title = "Liste des potions";
$content = ob_get_clean();
require "./Views/template.php";