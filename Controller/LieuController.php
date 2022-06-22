<?php

namespace Controller;
use Model\Connect;

class LieuController {

    /**
     * Afficher la liste des lieux
     * index.php?action=listLieux
     */
    public function listLieux() {

        $pdo = Connect::seConnecter();
        $sql = 'SELECT * 
                FROM lieu 
                ORDER BY nom_lieu';
        $stmt = $pdo->query($sql);

        require "./Views/lieux/listLieux.php";
    }

    /**
     * Afficer le détail d'un lieu + liste des personnages y habitant
     * index.php?action=detailLieu&id=XX
     */
    public function detailLieu($id) {

        $pdo = Connect::seConnecter();

        // récupérer toutes les infos d'un lieu spécifique
        $sql1 = 'SELECT * 
                FROM lieu 
                WHERE id_lieu = :id';
        $stmt = $pdo->prepare($sql1);
        $stmt->execute([
            ":id" => $id
        ]);

        // récupérer tous les personnages habitant le lieu passé en paramètre
        $sql2 = 'SELECT id_personnage, nom_personnage 
                FROM personnage 
                WHERE id_lieu = :id';
        // on prépare la requête SQL
        $stmtGaulois = $pdo->prepare($sql2);
        // on exécute la requête SQL en associant le champ paramétré ":id" à la valeur de $id (dans les paramètres de la fonction)
        $stmtGaulois->execute([
            ":id" => $id
        ]);

        require "./Views/lieux/detailLieu.php";
    }

    /**
     * Ajouter un lieu
     *  index.php?action=ajouterLieu
     */
    public function ajouterLieu() {

        // si on soumet le formulaire
        if(isset($_POST["submit"])) {

            // nettoyage du champ
            $nomLieu = filter_input(INPUT_POST, "nomLieu", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // si le filtre est valide, on ajoute le lieu en base de données
            if($nomLieu) {
                $pdo = Connect::seConnecter();
                $sql = 'INSERT INTO lieu (nom_lieu) 
                            VALUES (:nomLieu)';
            
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ":nomLieu" => $nomLieu
                ]);

                // redirection vers la liste des lieux
                header("Location: index.php?action=listLieux");
            }
        }

        require "./Views/lieux/ajouterLieu.php";
    }
}