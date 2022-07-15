<?php
include_once("Modele/GestionFigurine.class.php");

if(isset($laCategorie)){
    $lesFigurines = GestionFigurine::GetFigurineByCateg($laCategorie[0]->idCateg);
}