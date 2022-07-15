<?php

class Commande
{
    private $idCmd;
    private $dateCmd;
    private $idCli;

    public function __construct($idCmd,$dateCmd,$idCli) 
    {
        
        $this->idCmd = $idCmd;
        $this->dateCmd = $dateCmd;
        $this->idCli = $idCli;
    }

    public function __set($attribut,$valeur)
    {		
        switch ($attribut) 
        {
            case'dateCmd': $this->dateCmd=$valeur;
            case'idCli': $this->idCli=$valeur;
        }
    }

    public function __get($attribut)
    {
        switch ($attribut) 
        {
            case'idCmd': return $this->idCmd;
            case'dateCmd':return $this->dateCmd;
            case'idCli':return $this->idCli;
        }
    }

}

?>