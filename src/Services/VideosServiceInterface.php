<?php

namespace Lequipe\Services;

/**
 *
 * @author cguinet
 */

interface VideosServiceInterface {
    
    public function getLastVideosSvc($uri = null, $nb = 10, $idtag = "", $tri = "");
    
    public function getUneVideosSvc($uri = null);
    
}
