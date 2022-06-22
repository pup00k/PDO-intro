<?php

namespace Controller;

class HomeController {

    /**
     * Afficher la page d'accueil
     * index.php?action=home
     */
    public function home() {
        require "./Views/home.php";
    }
}