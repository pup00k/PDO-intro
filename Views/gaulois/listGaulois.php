<?php ob_start() ?>

<h1>Liste des personnages</h1>

<a class="btn" href="index.php?action=ajouterGaulois">Ajouter un personnage</a>

<p>Il y a <?= $stmtAllGaulois->rowCount() ?> personnages</p>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nom personnage</th>
            <th>Adresse</th>
        </tr>
    </thead>
    <tbody>
        
    <?php

    foreach($stmtAllGaulois->fetchAll() as $gaulois): ?>
        <tr>
            <td><?= $gaulois["id_personnage"] ?></td>
            <td><a href="index.php?action=detailGaulois&id=<?= $gaulois["id_personnage"] ?>"><?= $gaulois["nom_personnage"]; ?></a></td>
            <td><?= $gaulois["adresse_personnage"]; ?></td>
        </tr>
    <?php endforeach; ?>
    
    </tbody>
</table>

<?php

$title = "Liste des gaulois";
$content = ob_get_clean();
require "./Views/template.php";