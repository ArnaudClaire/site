<?php
include_once("Modele/GestionCompte.class.php");
if(isset($_POST['validerAjout']))
{   
         
    GestionCompte::AjouterCompte($_POST['newCiv'],$_POST['newNom'],$_POST['newPrenom'],$_POST['newPseudo'],$_POST['newDateNaiss'],$_POST['newAd'],$_POST['newCp'],$_POST['newVille'],($_POST['newMail']),$_POST['newMdp']);
      
}

else if(isset($_POST['validerModification']))
{
    $leCompte = GestionCompte::getCompte($_POST['idCpt']);


    $civ=$_POST['newCiv'];
    $nom=$_POST['newNom'];
    $prenom=$_POST['newPrenom'];
    $pseudo=$_POST['newPseudo'];
    $dateNaiss=$_POST['newDateNaiss'];
    $ad=$_POST['newAd'];
    $cp=$_POST['newCp'];
    $ville=$_POST['newVille'];
    $mail=$_POST['newMail'];
    $mdp=$_POST['newMdp'];

    if($_POST['newCiv']== null)
    {
        $civ=$leCompte[0]->civCpt;
    }
    if($_POST['newNom']== null)
    {
        $nom=$leCompte[0]->nomCpt;
    }
    if($_POST['newPrenom']== null)
    {
        $prenom=$leCompte[0]->prenomCpt;
    }
    if($_POST['newPseudo']== null)
    {
        $pseudo=$leCompte[0]->pseudoCpt;
    }
    if($_POST['newDateNaiss']== null)
    {
        $dateNaiss=$leCompte[0]->dateNaissCpt;
    }
    if($_POST['newAd']== null)
    {
        $ad=$leCompte[0]->adCpt;
    }
    if($_POST['newCp']== null)
    {
        $cp=$leCompte[0]->cpCpt;
    }
    if($_POST['newVille']== null)
    {
        $ville=$leCompte[0]->villeCpt;
    }
    if($_POST['newMail']== null)
    {
        $mail=$leCompte[0]->mailCpt;
    }
    if($_POST['newMdp']== null)
    {
        GestionCompte::ModifierCompteSaufMdp($_POST['idCpt'],$civ,$nom,$prenom,$pseudo,$dateNaiss,$ad,$cp,$ville,$mail);
    }
    else{
        GestionCompte::ModifierCompte($_POST['idCpt'],$civ,$nom,$prenom,$pseudo,$dateNaiss,$ad,$cp,$ville,$mail,$mdp);        
    }  
}

else if(isset($_POST['validerSuppression']))
{
    GestionCompte::SupprimerCompte($_POST['idCpt']);
}

$lesComptes = GestionCompte::GetCompte(0);
include("Vues/pages/compte.php");
?>