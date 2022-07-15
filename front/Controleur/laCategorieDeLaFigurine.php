<?php
include_once("Modele/GestionCategorie.class.php");
if(isset($uneFigurine)){
    $laCategorie = GestionCategorie::GetCategorie($uneFigurine->idCateg);
}
else{
    $laCategorie = GestionCategorie::GetCategorie($laFigurine[0]->idCateg);
}
