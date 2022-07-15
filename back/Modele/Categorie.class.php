<?php

class Categorie
{
    private $idCateg;
    private $libCateg;    


    function __construct($unId, $unLib)
    {
        $this->idCateg = $unId;
        $this->libCateg = $unLib;
    }  

    public function __set($attribut,$valeur)
    {		
        switch ($attribut) 
        {
            case'libCateg': $this->libCateg=$valeur;
        }
    }

    public function __get($attribut)
    {
        switch ($attribut) 
        {
            case'idCateg': return $this->idCateg;
            case'libCateg':return $this->libCateg;
        }
    }	
}
?>  