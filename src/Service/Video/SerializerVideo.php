<?php

namespace Lequipe\Service\Video;
/**
 * Description of SerializerVideo
 *
 * @author cguinet
 */
class SerializerVideo implements SerializerVideoInterface{
    
    public function serializeLast($nb, $idtag, $tri)
    {
        return array(
            "nb" => $nb,
            "idtag" => $idtag,
            "tri" => $tri
        );
    }
    
    public function serializeTypeHome($idtag) {
        return array(
            "idtag" => $idtag
        );
    }
}
