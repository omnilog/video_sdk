<?php

namespace Lequipe\Service\Video;

/**
 *
 * @author cguinet
 */
interface SerializerVideoInterface {
    
    public function serializeLast($nb, $idtag, $tri, $page, $jours);
    
    public function serializeTypeHome($idtag);
    
    public function serializeSearch($term, $nb);
    
}
