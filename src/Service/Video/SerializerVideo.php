<?php

namespace Lequipe\Service\Video;
/**
 * Description of SerializerVideo
 *
 * @author cguinet
 */
class SerializerVideo implements SerializerVideoInterface{
    
    public function serializeLast($nb, $idtag, $tri, $page, $jours)
    {
        return array(
            "nb" => $nb,
            "idtag" => $idtag,
            "tri" => $tri,
            "page" => $page,
            "jours" => $jours
        );
    }
    
    public function serializeTypeHome($idtag) {
        return array(
            "idtag" => $idtag
        );
    }
    
    public function serializeSearch($term, $nb, $page) {
        return array(
            "recherche" => $term,
            "nb" => $nb,
            "page" => $page
        );
    }
}
