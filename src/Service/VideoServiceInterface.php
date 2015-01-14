<?php

namespace Lequipe\Service;

/**
 *
 * @author cguinet
 */

interface VideoServiceInterface {
    
    public function getLastVideo($nb = 10, $idtag = "", $tri = "");
    
    public function getUneVideo();
    
    public function getTypeHomeVideo($idtag);
    
    public function getSearchVideo($term, $nb = 10);
    
}
