<?php

namespace Controller;
use Model\Connect;

class SpecialiteController {

    /**
     * Afficher la liste des specialités
     * index.php?action=listSpecialites
     */
    public function listSpecialites() {

        $pdo = Connect::seConnecter();
        $sql = 'SELECT * 
                FROM specialite 
                ORDER BY nom_specialite';
        $stmt = $pdo->query($sql);

        require "./Views/specialites/listSpecialites.php";
    }
}