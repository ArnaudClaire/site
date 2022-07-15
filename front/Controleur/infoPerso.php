<?php
include_once("Modele/GestionCompte.class.php");
$leCompte=GestionCompte::GetCompte($_SESSION['idCpt']);
include('Vues/infoPerso.php');