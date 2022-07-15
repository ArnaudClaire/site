<?php

class DetailCommande
{
    private $idDtlCmd;
    private $idFig;
    private $idCmd;
    private $qte;

    //créer le detail de la Commande
    public function __construct($unIdDtlCmd,$unIdFig,$unIdCmd,$uneQte) 
    {
        $this->idDtlCmd = $unIdDtlCmd;
        $this->idFig = $unIdFig;
        $this->idCmd = $unIdCmd;
        $this->qte = $uneQte;
    }

    public function __set($attribut,$valeur)
    {		
        switch ($attribut) 
        {
            case'idFig': $this->idFig=$valeur;
            case'idCmd': $this->idCmd=$valeur;
            case'qte': $this->qte=$valeur;
        }
    }

    public function __get($attribut)
    {
        switch ($attribut) 
        {
            case'idDtlCmd': return $this->idDtlCmd;
            case'idFig':return $this->idFig;
            case'idCmd':return $this->idCmd;
            case'qte':return $this->qte;
        }
    }

}

?>