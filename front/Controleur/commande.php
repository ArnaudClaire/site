<?php

include_once("Modele/GestionCommande.class.php");

if(isset($_SESSION['idCpt'])){
    $lesCommandes=GestionCommande::GetCommandeByCpt($_SESSION['idCpt']);
}



include("Vues/commande.php");
?>