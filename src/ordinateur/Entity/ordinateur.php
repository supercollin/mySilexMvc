<?php

namespace App\Ordinateur\Entity;

class Ordinateur
{
    protected $id;

    protected $utilisateur;

    protected $bureau;

    public function __construct($id, $utilisateur, $bureau)
    {
        $this->id = $id;
        $this->utilisateur = $utilisateur;
        $this->bureau = $bureau;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUtilsateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;
    }

    public function setBureau($bureau)
    {
        $this->bureau = $bureau;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
    public function getBureau()
    {
        return $this->bureau;
    }

    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['utilisateur'] = $this->utilisateur;
        $array['bureau'] = $this->bureau;

        return $array;
    }
}
