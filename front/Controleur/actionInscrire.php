<?php
include_once("../Modele/GestionCompte.class.php");
if($_POST['newMdp']!=$_POST['repNewMdp']){
    echo "<script>alert(\"votre mot de passe n'est pas ou est mal répété !\")</script>";
    echo '<script language="Javascript"> document.location.replace("../index.php?page=inscription"); </script>';
}
else{
    GestionCompte::AjouterCompte($_POST['newCiv'],$_POST['newNom'],$_POST['newPrenom'],$_POST['newPseudo'],$_POST['newDateNaiss'],$_POST['newAd'],$_POST['newCp'],$_POST['newVille'],$_POST['newMail'],$_POST['newMdp']);
    header("Location: ../index.php?page=connexion");
}
