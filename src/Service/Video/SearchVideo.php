<?php

namespace Lequipe\Service\Video;

/**
 * Description of SearchVideo
 *
 * @author cguinet
 */
class SearchVideo extends AbstractVideo implements SearchVideoInterface {
    const URI = 'videos2/searchVideos';
    
    public function execute($term, $nb = 10) {
        $response = $this->getGuzzleSvc()->get(
            self::URI, 
            "", 
            $this->getSerializerSvc()->serializeSearch($term, $nb)
        );
        return $this->getMapperSvc()->getVideos($response);
    }
    
}
