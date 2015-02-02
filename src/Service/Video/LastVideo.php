<?php

namespace Lequipe\Service\Video;

/**
 * 
 * @author cguinet
 */
class LastVideo  extends AbstractVideo implements LastVideoInterface {
    const URI = 'videos2/getLastVideos';
    
    public function execute($nb = 10, $idTag = "", $tri = "", $page = "", $jours = "") {
       
        $response = $this->getGuzzleSvc()->get(
            self::URI, 
            "", 
            $this->getSerializerSvc()->serializeLast($nb,$idTag, $tri, $page, $jours)
        );
        return $this->getMapperSvc()->getVideos($response);
    }
     
}
