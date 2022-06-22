<?php

namespace Controller;
use Model\Manager\GauloisManager;

class GauloisController {

    private $manager;

    public function __construct() {
        $this->manager = new GauloisManager();
    }

    /**
     * Afficher la liste des Gaulois
     * index.php?action=listGaulois
     */
    public function listGaulois() {
        $stmtAllGaulois = $this->manager->findAll();
        require "./Views/gaulois/listGaulois.php";
    }

    /**
     * Afficher le détail d'un gaulois (grâce à son identifiant)
     * index.php?action=detailGaulois&id=XX
     */
    public function detailGaulois($id) {
        $stmtGaulois =  $this->manager->findOneById($id);
        require "./Views/gaulois/detailGaulois.php";
    } 

    /**
     * Ajouter un personnage
     * index.php?action=ajouterGaulois
     */
    public function ajouterGaulois() {

        // récupération de tous les lieux et de toutes les spécialités en BDD
        $stmtLieux = $this->manager->executerRequete("SELECT * FROM lieu");
        $stmtSpecialites = $this->manager->executerRequete("SELECT * FROM specialite");

        // si on soumet le formulaire (attention au name="submit" dans le formulaire)
        if(isset($_POST["submit"])) {

            // nettoyage des champs
            $nomPersonnage = filter_input(INPUT_POST, "nomPersonnage", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $adressePersonnage = filter_input(INPUT_POST, "adressePersonnage", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $lieu = filter_input(INPUT_POST, "lieu", FILTER_SANITIZE_NUMBER_INT);
            $specialite = filter_input(INPUT_POST, "specialite", FILTER_SANITIZE_NUMBER_INT); 

            $adressePersonnage = (empty($_POST["adressePersonnage"])) ? NULL : $adressePersonnage;

            // si les filtres sont valides, on ajoute le personnage en base de données
            if($nomPersonnage && $lieu && $specialite) {
                $sql = 'INSERT INTO personnage (nom_personnage, adresse_personnage, id_lieu, id_specialite) 
                            VALUES (:nomPersonnage, :adressePersonnage, :lieu, :specialite)';

                $stmt = $this->manager->executerRequete($sql, [
                    ":nomPersonnage" => $nomPersonnage,
                    ":adressePersonnage" => $adressePersonnage,
                    ":lieu" => $lieu,
                    ":specialite" => $specialite
                ]);

                // redirection vers la liste des personnages
                header("Location: index.php?action=listGaulois");
            }
        }

        require "./Views/gaulois/ajouterGaulois.php";
    }
}