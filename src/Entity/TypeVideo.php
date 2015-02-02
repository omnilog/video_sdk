<?php

namespace Lequipe\Entity;

/**
 * Description of TypeVideo
 *
 * @author cguinet
 */
class TypeVideo {
    //put your code here
   
    private $id;
    private $type;
    
    /*
     * return the id of the type
     * @return integer
     */
    function getId() {
        return $this->id;
    }

    /*
     * return the name of the type
     * @return string
     */
    function getType() {
        return $this->type;
    }
    
    /**
     * set the id of the type
     * @param integer $id
     */
    function setId($id) {
        $this->id = $id;
    }

    /**
     * set the type
     * @param string $type
     */
    function setType($type) {
        $this->type = $type;
    }


    
}
