<?php
class Compte
{
    private $idCpt;
    private $civCpt;
    private $nomCpt;
    private $prenomCpt;
    private $pseudoCpt;
    private $dateNaissCpt;
    private $adCpt;
    private $cpCpt;
    private $villeCpt;
    private $mailCpt;
    private $mdpCpt;
    
    function __construct($unId, $uneCiv, $unNom, $unPrenom, $unPseudo, $uneDateNaiss, $uneAd, $unCp, $uneVille, $unMail, $unMdp)
    {
        $this->idCpt = $unId;
        $this->civCpt = $uneCiv;
        $this->nomCpt = $unNom;
        $this->prenomCpt = $unPrenom;
        $this->pseudoCpt = $unPseudo;
        $this->dateNaissCpt = $uneDateNaiss;
        $this->adCpt = $uneAd;
        $this->cpCpt = $unCp;
        $this->villeCpt = $uneVille;
        $this->mailCpt = $unMail;
        $this->mdpCpt = $unMdp;
    }  

    public function __set($attribut,$valeur)
    {		
        switch ($attribut) 
        {
            case'civCpt': $this->civCpt=$valeur;
            case'nomCpt': $this->nomCpt=$valeur;
            case'prenomCpt': $this->prenomCpt=$valeur;
            case'pseudoCpt': $this->pseudoCpt=$valeur;
            case'dateNaissCpt': $this->dateNaissCpt=$valeur;
            case'adCpt': $this->adCpt=$valeur;
            case'cpCpt': $this->cpCpt=$valeur;
            case'villeCpt': $this->villeCpt=$valeur;
            case'mailCpt': $this->mailCpt=$valeur;
            case'mdpCpt': $this->mdpCpt=$valeur;
        }
    }

    public function __get($attribut)
    {
        switch ($attribut) 
        {
            case'idCpt': return $this->idCpt;
            case'civCpt':return $this->civCpt;
            case'nomCpt':return $this->nomCpt;
            case'prenomCpt':return $this->prenomCpt;
            case'pseudoCpt':return $this->pseudoCpt;
            case'dateNaissCpt':return $this->dateNaissCpt;
            case'adCpt':return $this->adCpt;
            case'cpCpt':return $this->cpCpt;
            case'villeCpt':return $this->villeCpt;
            case'mailCpt':return $this->mailCpt;
            case'mdpCpt':return $this->mdpCpt;
        }
    }	
}
?>  