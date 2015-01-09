<?php

namespace Lequipe\Services\Videos;

/**
 *
 * @author cguinet
 */
interface SerializerVideosInterface {
    
    public function serializeSearch($nb, $idtag, $tri, $method);
    
}
