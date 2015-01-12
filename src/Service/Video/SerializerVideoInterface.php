<?php

namespace Lequipe\Service\Video;

/**
 *
 * @author cguinet
 */
interface SerializerVideoInterface {
    
    public function serializeLast($nb, $idtag, $tri);
    
    public function serializeTypeHome($idtag);
    
}
