<?php
include_once("Modele/GestionCommande.class.php");
include_once("Modele/GestionDtlCommande.class.php");

//l'utilisateur doit se connecté avant d'ajouter des produits au panier.
if(!isset($_SESSION["idCpt"]))
{
    session_destroy();//on supprime les variables session 
    header('Location: index.php?page=connexion');//on renvoie sur la page de connection
}
else{
    GestionCommande::AjouterCommande(date('j-m-y'),$_SESSION['idCpt']);
    $leDernierId=GestionCommande::GetIdDerniereCommande();

    foreach($_SESSION['panier']['idFig'] as $unIdFigurine){
        $position=array_search($unIdFigurine,$_SESSION['panier']['idFig']);
        GestionDtlCommande::AjouterDtlCommande($unIdFigurine ,$leDernierId,$_SESSION['panier']['qteFig'][$position]);
    }
    echo "<script>alert(\"Merci pour votre achat !\")</script>";
    echo '<script language="Javascript"> document.location.replace("index.php"); </script>';
}
