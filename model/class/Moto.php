<?php
class Moto
{
    private $id;
    private $marque;
    private $modele;
    private $type;
    private $picture;
    

    public function __construct($id, $marque, $modele, $type, $picture)
    {
        $this->id = $id;
        $this->marque = $marque;
        $this->modele = $modele;
        $this->type = $type;
        $this->picture = $picture;
       
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getMarque()
    {
        return $this->marque;
    }
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    public function getModele()
    {
        return $this->modele;
    }
    public function setModele($modele)
    {
        $this->modele = $modele;
    }

    public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        $this->type = $type;
    }

    
    public function getPicture()
    {
        return $this->picture;
    }
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

}
