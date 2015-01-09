<?php

namespace Lequipe\Service\Video;

/**
 *
 * @author cguinet
 */
interface SerializerVideoInterface {
    
    public function serializeSearch($nb, $idtag, $tri, $method);

    public function serializeLast($nb, $idtag, $tri);
    
}
