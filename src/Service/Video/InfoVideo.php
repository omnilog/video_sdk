<?php

namespace Lequipe\Service\Video;
/**
 * Description of InfoVideo
 *
 * @author cguinet
 */
class InfoVideo extends AbstractVideo implements InfoVideoInterface {
    const URI = 'videos2/getInfosVideo';
    
    public function execute($id) {
       
        $response = $this->getGuzzleSvc()->get(
            self::URI, 
            "", 
            $this->getSerializerSvc()->serializeInfo($id)
        );
        return $this->getMapperSvc()->getVideos($response);
    }
}
