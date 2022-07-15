<?php
include_once("Modele/GestionCategorie.class.php");
if(isset($_POST['validerAjout']))
{   
    $lesCategories = GestionCategorie::GetCategorie(0);
    $reponse=false;
    foreach($lesCategories as $uneCategorie){
        if($uneCategorie->libCateg==$_POST['newLib']){
            $reponse=true;
        }
    }
    if($reponse==true)
    {
        echo "<script>alert(\"Cette Catégorie existe déjà !\")</script>";
        echo '<script language="Javascript"> document.location.replace("index.php?page=manip/categorieManip&manip=ajout"); </script>';
    }
    else
    {
        GestionCategorie::AjouterCategorie($_POST['newLib']);
    }
}

else if(isset($_POST['validerModification']))
{
    $lesCategories = GestionCategorie::GetCategorie(0);
    $reponse=false;
    foreach($lesCategories as $uneCategorie){
        if($uneCategorie->libCateg==$_POST['newLib']){
            $reponse=true;
        }
    }
    if($reponse==true)
    {
        echo "<script>alert(\"Cette Catégorie existe déjà !\")</script>";
        echo '<script language="Javascript"> document.location.replace("index.php?page=manip/categorieManip&idCateg='.$_POST['idCateg'].'&manip=modif"); </script>';
    }
    else
    {
        GestionCategorie::ModifierCategorie($_POST['idCateg'],$_POST['newLib']);
    }
}

else if(isset($_POST['validerSuppression']))
{         
    GestionCategorie::SupprimerCategorie($_POST['idCateg']);       
}

$lesCategories = GestionCategorie::GetCategorie(0);
include("Vues/pages/categorie.php");
?>