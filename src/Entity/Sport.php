<?php

namespace Lequipe\Entity;

/**
 * Description of Sport
 *
 * @author cguinet
 */

class Sport {

    private $idTag;
        
    private $libelle;
    
    private $idSport;
    
    /*
     * @param integer $idTag
     */
    public function setIdTag($idTag) {
        $this->idTag = $idTag;
        return $this;
    }
    
    /*
     * @return integer 
     */
    public function getIdTag() {
        return $this->idTag;
    }
    
    /*
     * @param string $libelle
     */
    public function setLibelle($libelle) {
        $this->libelle = $libelle;
        return $this;
    }
    
    /*
     * @return string
     */
    public function getLibelle() {
        return $this->libelle;
    }
    
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
    
 }
