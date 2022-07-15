<?php
include_once("Modele/GestionCategorie.class.php");
if(isset($_GET['idCateg'])){
    $laCategorie = GestionCategorie::GetCategorie($_GET['idCateg']); 
}
include("Vues/manip/categorieManip.php");