<?php

namespace App;
use Controller\HomeController;
use Controller\GauloisController;
use Controller\LieuController;
use Controller\PotionController;
use Controller\SpecialiteController;

// Autoloader de toutes les classes
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

// instanciation des controllers
$ctrlHome = new HomeController();
$ctrlGaulois = new GauloisController();
$ctrlLieu = new LieuController();
$ctrlPotion = new PotionController();
$ctrlSpecialite = new SpecialiteController();

// on vérifie l'action définie dans l'URL : l'action est obligatoire (sinon on redirige vers la page d'accueil), l'identifiant est facultatif
if(isset($_GET["action"])) {

    if(isset($_GET["id"])) { $id = $_GET["id"]; }

    switch($_GET["action"]) {

        // *---------------- PERSONNAGES -------------------------------------------- 
        // afficher la liste des personnages
        case "listGaulois" : 
            $ctrlGaulois->listGaulois(); 
            break;
            
        // afficher le détail d'un personnage
        case "detailGaulois" :
            $ctrlGaulois->detailGaulois($id); 
            break; 
                
        // ajouter un personnage
        case "ajouterGaulois" :
            $ctrlGaulois->ajouterGaulois();
            break;

        // *---------------- LIEUX -------------------------------------------- 
        // afficher la liste des lieux
        case "listLieux" :
            $ctrlLieu->listLieux(); 
            break;

        // afficher le détail d'un lieu + liste des personnages y habitant
        case "detailLieu" :
            $ctrlLieu->detailLieu($id); 
            break;

        // ajouter un lieu
        case "ajouterLieu" :
            $ctrlLieu->ajouterLieu();
            break;

        // *---------------- POTIONS --------------------------------------------
        case "listPotions" :
            $ctrlPotion->listPotions(); 
            break;
        
        // *---------------- SPECIALITES --------------------------------------------
        case "listSpecialites" :
            $ctrlSpecialite->listSpecialites(); 
            break;
    }
    
} else {
    $ctrlHome->home();
}