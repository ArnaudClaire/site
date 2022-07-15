<?php
include_once("Modele/GestionCompte.class.php");

if(isset($_POST['validerModification']))
{
    $leCompte = GestionCompte::getCompte($_SESSION['idCpt']);

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

    //on gére l'execption si l'utilisatuer n'a pas rentré de valeur.
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
        $mdp=$leCompte[0]->$_SESSION['mdpCptDecrypte'];
    }
    GestionCompte::ModifierCompte($_SESSION['idCpt'],$civ,$nom,$prenom,$pseudo,$dateNaiss,$ad,$cp,$ville,$mail,$mdp); 
              
}
header('Location: index.php?page=connexion');//on renvoie sur la page des informations
?>
