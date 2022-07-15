<?php
include_once("Modele/GestionCompte.class.php");
$leCompte = GestionCompte::getCompte($_SESSION['idCpt']);
include('Vues/infoPersoModif.php');