<?php
include_once("Modele/GestionFigurine.class.php");
if(isset($_POST['validerAjout']))
{
    $sourceImage = $_FILES["newImage"]["tmp_name"];
    $destinationImage = "../Documents/Figurines/".$_FILES["newImage"]["name"];
    move_uploaded_file($sourceImage, $destinationImage);


    GestionFigurine::AjouterFigurine($_POST['newNom'],$destinationImage, $_POST['newDescription'], $_POST['newTaille'], $_POST['newEditeur'], $_POST['newPrix'], $_POST['newIdCateg']);   
}

else if(isset($_POST['validerModification']))
{
    $laFigurine=GestionFigurine::GetFigurine($_POST['idFig']);

    $unNom=$_POST['newNom'];
    $uneDescription=$_POST['newDescription'];
    $uneTaille=$_POST['newTaille'];
    $unEditeur=$_POST['newEditeur'];
    $unPrix=$_POST['newPrix'];
    $uneCateg=$_POST['newIdCateg'];

    if($unNom== null)
    {
        $unNom=$laFigurine[0]->nomFig;
    }
    if(isset($_POST['newImage'])== false)
    {
        $destinationImage=$laFigurine[0]->cheminImageFig;
    }
    if($uneDescription== null)
    {
        $uneDescription=$laFigurine[0]->descriptionFig;
    }
    if($uneTaille== null)
    {
        $uneTaille=$laFigurine[0]->tailleFig;
    }
    if($unEditeur== null)
    {
        $unEditeur=$laFigurine[0]->editeurFig;
    }
    if($unPrix== null)
    {
        $unPrix=$laFigurine[0]->prixFig;
    }

    if(isset($_FILES['newImage']["tmp_name"]) && ($_FILES['newImage']["tmp_name"] != null))
    {
        if(file_exists($laFigurine[0]->cheminImageFig))
        {
            unlink($laFigurine[0]->cheminImageFig);
        }
        
        $sourceImage = $_FILES["newImage"]["tmp_name"];
        $destinationImage = "../Documents/Figurines/".$_FILES["newImage"]["name"];
        move_uploaded_file($sourceImage, $destinationImage);
    }
    GestionFigurine::ModifierFigurine($_POST['idFig'], $unNom, $destinationImage, $uneDescription, $uneTaille, $unEditeur, $unPrix, $_POST['newIdCateg']);
}

else if(isset($_POST['validerSuppression']))
{
    $laFigurine = GestionFigurine::GetFigurine($_POST['idFig']);  
    
    unlink($laFigurine[0]->cheminImageFig); 
    GestionFigurine::SupprimerFigurine($_POST['idFig']);
    
}

$lesFigurines = GestionFigurine::GetFigurine(0);
include("Vues/pages/figurine.php");
?>