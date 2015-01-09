<?php

namespace Lequipe\Services\Videos;

 /**
 * Description of VideosUne
 *
 * @author cguinet
 */

class VideosUne extends AbstractVideos implements VideosUneInterface {
    
    CONST METHOD_NAME = 'getVideosUne';
    
    public function execute() {
       
        $response = $this->getGuzzleSvc()->get(
            self::URI.'/',
            //$this->getAccessTokenSvc()->getHeaders(),
            $this->getSerializerSvc()->serializeSearch("", "", "", "", "", METHOD_NAME)
        );

        return $this->getMapperSvc()->getVideos($response);
    }
}
