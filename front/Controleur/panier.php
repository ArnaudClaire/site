<?php
include_once("Modele/GestionFigurine.class.php");
include_once("Controleur/fonctionsPanier.php");

if(!CreationPanier()){
    foreach($_SESSION['panier']['idFig'] as $unIdFigurine){
        if(isset($_POST[$unIdFigurine]) && isset($_POST['qt'.$unIdFigurine]))
        {  
            $quant=$_POST['qt'.$unIdFigurine];
            $idF=$_POST[$unIdFigurine];
            //si la quantité est 0 la figurine est enlever de $_SESSION['panier'] et de $lesFigurinesDuPanier
            ModifierQTeArticle($idF,$quant);
        }
    }
    
    
    
    //On enlève l'article du panier si il clic sur le bouton 'Enlever du Panier'
    if(isset($_GET['figSup'])){
        SupprimerArticle(($_GET['figSup']));
    }
    
    
    //remplissage du panier
    $lesFigurinesDuPanier=array();//tableau des id des figurine dans le panier
    foreach($_SESSION['panier']['idFig'] as $unIdFigurine){
        array_push($lesFigurinesDuPanier,GestionFigurine::GetFigurine($unIdFigurine));
    }
    //Calcul du nombre du montant total
    $montantTotal=MontantGlobal();
}
else{
    echo "<script>alert(\"Vous n'avez rien ajouter au panier !\")</script>";
    echo '<script language="Javascript"> document.location.replace("index.php"); </script>';
}




include("Vues/panier.php");
?>