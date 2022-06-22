<?php $lieu = $stmt->fetch(); ?>

<h1><?= $lieu["nom_lieu"] ?></h1>

<h3>Personnages habitant ce lieu (<?= $stmtGaulois->rowCount() ?>)</h3>

<table>
    <thead>
        <tr>
            <th>Personnage</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($stmtGaulois->fetchAll() as $gaulois) : ?>
        <tr>
            <td><a href="index.php?action=detailGaulois&id=<?= $gaulois["id_personnage"] ?>"><?= $gaulois["nom_personnage"] ?></a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<?php

$title = "Détail d'un lieu";
$content = ob_get_clean();
require "./Views/template.php";