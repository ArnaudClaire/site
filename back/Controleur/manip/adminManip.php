<?php
include_once("Modele/GestionAdministrateur.class.php");

if(isset($_GET['idAd'])){
    $admin = GestionAdministrateur::GetAdministrateur($_GET['idAd']);
}
include("Vues/manip/adminManip.php");