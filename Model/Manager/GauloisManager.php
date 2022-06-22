<?php

namespace Model\Manager;
use Model\Manager\ManagerInterface;

// La class GauloisManager regroupe les fichier Abtract et Manager

class GauloisManager extends AbstractManager implements ManagerInterface {

    public function findAll() {

        $sql = 'SELECT * 
                FROM personnage 
                ORDER BY nom_personnage';

        $stmt = $this->executerRequete($sql);
        return $stmt;
    }

    public function findOneById($id) {
    
        $sql = 'SELECT nom_personnage, p.id_lieu AS id_lieu, nom_lieu, nom_specialite 
                FROM personnage p
                INNER JOIN lieu l ON l.id_lieu = p.id_lieu
                INNER JOIN specialite s ON s.id_specialite = p.id_specialite
                WHERE id_personnage = :id';
       
        $stmt = $this->executerRequete($sql, ["id" => $id]);
        return $stmt;
    }
}