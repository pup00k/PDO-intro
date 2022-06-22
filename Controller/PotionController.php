<?php

namespace Controller;
use Model\Connect;

class PotionController {

    /**
     * Afficher la liste des potions
     * index.php?action=listPotions
     */
    public function listPotions() {

        $pdo = Connect::seConnecter();
        $sql = 'SELECT * 
                FROM potion 
                ORDER BY nom_potion';
        $stmt = $pdo->query($sql);

        require "./Views/potions/listPotions.php";
    }
}