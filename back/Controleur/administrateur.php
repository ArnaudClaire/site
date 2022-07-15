<?php
include_once("Modele/GestionAdministrateur.class.php");
if(isset($_POST['validerAjout']))
{   
         
    GestionAdministrateur::AjouterAdministrateur($_POST['newPseudo'],$_POST['newMdp']);
      
}

else if(isset($_POST['validerModification']))
{
    $admin = GestionAdministrateur::getAdministrateur($_POST['idAd']);

    $pseudo=$_POST['newPseudo'];
    $mdp=$_POST['newMdp'];

    if($_POST['newPseudo']== null)
    {
        $pseudo=$admin[0]->identifiant;
    }
    if($_POST['newMdp']== null)
    {
        $mdp=$admin[0]->mdp;
    }  
    GestionAdministrateur::ModifierAdministrateur($_POST['idAd'],$pseudo,$mdp);
    if($_POST['idAd']==$_SESSION['idAd']){
        $_SESSION['idAd']=$pseudo;
        $_SESSION['mdpAd'] = $mdp;
    }
}

else if(isset($_POST['validerSuppression']))
{
    GestionAdministrateur::SupprimerAdministrateur($_POST['idAd']);
}

$lesAdmins = GestionAdministrateur::GetAdministrateur('0');
include("Vues/pages/administrateur.php");
?>