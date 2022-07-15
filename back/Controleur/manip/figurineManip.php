<?php
include_once("Modele/GestionFigurine.class.php");
include_once("Modele/GestionCategorie.class.php");
$lesCategories = GestionCategorie::GetCategorie(0);

if(isset($_GET['idFig'])){
    $laFigurine = Gestionfigurine::Getfigurine($_GET['idFig']);
}

// $laCategorie = GestionCategorie::GetCategorie($laFigurine[0]->idCateg);  

include("Vues/manip/figurineManip.php");