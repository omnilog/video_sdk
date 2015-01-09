<?php

namespace Lequipe\Service;

/**
 *
 * @author cguinet
 */

interface VideoServiceInterface {
    
    public function getLastVideo($uri = null, $nb = 10, $idtag = "", $tri = "");
    
    public function getUneVideo($uri = null);
    
}
