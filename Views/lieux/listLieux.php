<?php ob_start() ?>

<h1>Liste des lieux</h1>

<a class="btn" href="index.php?action=ajouterLieu">Ajouter un lieu</a>

<p>Il y a <?= $stmt->rowCount() ?> lieux</p>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Lieux</th>
        </tr>
    </thead>
    <tbody>
    
    <?php


    foreach($stmt->fetchAll() as $lieu): ?>
        <tr>
            <td><?= $lieu["id_lieu"] ?></td>
            <td><a href="index.php?action=detailLieu&id=<?= $lieu["id_lieu"] ?>"><?= $lieu["nom_lieu"]; ?></a></td>
        </tr>
    <?php endforeach; ?> 

    </tbody>
</table>

<?php

$title = "Liste des lieux";
$content = ob_get_clean();
require "./Views/template.php";