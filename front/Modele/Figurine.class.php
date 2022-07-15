<?php
class Figurine
{
    private $idFig;
    private $nomFig; 
    private $cheminImageFig;
    private $descriptionFig;
    private $tailleFig;
    private $editeurFig;
    private $prixFig;
    private $idCateg;

    function __construct($unId, $unNom, $unChemin, $uneDescription, $uneTaille, $unEditeur, $unPrix, $uneCateg)
    {
        $this->idFig = $unId;
        $this->nomFig = $unNom;
        $this->cheminImageFig = $unChemin;
        $this->descriptionFig = $uneDescription;
        $this->tailleFig = $uneTaille;
        $this->editeurFig = $unEditeur;
        $this->prixFig = $unPrix;
        $this->idCateg = $uneCateg;
    }  

    public function __set($attribut,$valeur)
    {		
        switch ($attribut) 
        {
            case'nomFig': $this->nomFig=$valeur;
            case'cheminImageFig': $this->cheminImageFig=$valeur;
            case'descriptionFig': $this->descriptionFig=$valeur;
            case'tailleFig': $this->tailleFig=$valeur;
            case'editeurFig': $this->editeurFig=$valeur;
            case'prixFig': $this->prixFig=$valeur;
            case'idCateg': $this->idCateg=$valeur;
        }
    }

    public function __get($attribut)
    {
        switch($attribut)
        {
            case'idFig':return $this->idFig;
            case'nomFig':return $this->nomFig;
            case'cheminImageFig':return $this->cheminImageFig;
            case'descriptionFig':return $this->descriptionFig;
            case'tailleFig':return $this->tailleFig;
            case'editeurFig':return $this->editeurFig;
            case'prixFig':return $this->prixFig;
            case'idCateg':return $this->idCateg;
        }
    }	
}
?>