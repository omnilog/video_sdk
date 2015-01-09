<?php

namespace Lequipe\Entity;

/**
 * Description of Sport
 *
 * @author cguinet
 */

class Sport {

    private $idSport;
        
    private $nom;
    
    /*
     * @param integer $idSport
     */
    public function setIdSport($idSport) {
        $this->idSport = $idSport;
        return $this;
    }
    
    /*
     * @return integer 
     */
    public function getIdSport() {
        return $this->idSport;
    }
    
    /*
     * @param string $nom
     */
    public function setNom($nom) {
        $this->nom = $nom;
        return $this;
    }
    
    /*
     * @return string
     */
    public function getNom() {
        return $this->nom;
    }
    
 }
