<?php

include_once("Modele/GestionFigurine.class.php");
include_once("Controleur/fonctionsPanier.php");

if(isset($_GET['idCateg'])){
    $lesFigurines = GestionFigurine::GetFigurineByCateg($_GET['idCateg']);
    $laCateg=$_GET['idCateg'];
}
else{
    $lesFigurines = GestionFigurine::GetFigurineByCateg($_POST['idCateg']);
    $laCateg=$_POST['idCateg'];
}

if(CreationPanier()){
    CreationPanier();//on créer le panier s'il n'est pas déjà fait.
}

$touteFig=GestionFigurine::GetFigurine(0);
//on ajoute l'article dans le panier pour chaque figurine où l'utilisateur à rentré la quantité.
foreach($touteFig as $uneFigurine){

    if(isset($_POST[$uneFigurine->idFig]) && isset($_POST['Ajouter'.$uneFigurine->idFig]))
    {  
        $idF=$_POST[$uneFigurine->idFig];

        AjouterArticle($idF,1,GestionFigurine::GetFigurine($idF)[0]->prixFig);
    }
}

// var_dump($_SESSION['panier']['idFig']);
// var_dump($_SESSION['panier']['qteFig']);
// var_dump($_SESSION['panier']['prixFig']);

include("Vues/figurine.php");
?>