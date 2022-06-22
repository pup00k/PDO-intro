<?php ob_start() ?>

<h1>Liste des spécialités</h1>

<p>Il y a <?= $stmt->rowCount() ?> spécialités</p>

<?php //var_dump($stmt->fetchAll()); ?>

<div class="cards">
    <?php
    foreach($stmt->fetchAll() as $specialite): ?>
    <div class="card">
        <h3><?= $specialite["nom_specialite"]; ?></h3>
    </div>
    <?php endforeach; ?> 
</div>

<?php

$title = "Liste des spécialités";
$content = ob_get_clean();
require "./Views/template.php";