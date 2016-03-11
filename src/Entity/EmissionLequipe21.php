<?php
/**
 * Created by PhpStorm.
 * User: mmarynich
 * Date: 10/03/16
 * Time: 16:24
 */

namespace Lequipe\Entity;


class EmissionLequipe21
{
    private $id;
    private $nom;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

}