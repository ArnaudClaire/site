<?php

include_once("Modele/GestionDtlCommande.class.php");

if(isset($_GET["idCmd"])){
    $lesDtls=GestionDtlCommande::GetDtlCommandeByCmd($_GET["idCmd"]);
}

include("Vues/detailCmd.php");
?>