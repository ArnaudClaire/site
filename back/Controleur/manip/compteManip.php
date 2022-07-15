<?php
include_once("Modele/GestionCompte.class.php");

if(isset($_GET['idCpt'])){
    $leCompte = GestionCompte::GetCompte($_GET['idCpt']);
}
include("Vues/manip/compteManip.php");