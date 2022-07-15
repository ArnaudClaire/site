<?php
class Administrateur
{
    private $idAd;
    private $identifiant;
    private $mdp;
    
    function __construct($unId, $unIdentifiant, $unMdp)
    {
        $this->idAd = $unId;
        $this->identifiant = $unIdentifiant;
        $this->mdp = $unMdp;
    }  

    public function __set($attribut,$valeur)
    {		
        switch ($attribut) 
        {
            case'identifiant': $this->identifiant=$valeur;
            case'mdp': $this->mdp=$valeur;
        }
    }

    public function __get($attribut)
    {
        switch ($attribut) 
        {
            case'idAd': return $this->idAd;
            case'identifiant': return $this->identifiant;
            case'mdp':return $this->mdp;
        }
    }	
}
?>  