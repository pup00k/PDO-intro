<?php ob_start(); ?>

<h1>Homepage</h1>

<p>Bienvenue dans l'application PDO Introduction</p>

<?php

$title = "Homepage";
$content = ob_get_clean();
require "./Views/template.php";