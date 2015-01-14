<?php

namespace Lequipe\Service\Video;

 /**
 * Description of VideosUne
 *
 * @author cguinet
 */

class UneVideo extends AbstractVideo implements UneVideoInterface {
    
    const URI = 'videos2/getVideosUne';
    
    public function execute($format) {
       
        $response = $this->getGuzzleSvc()->get(
            self::URI
        );
        return $this->getMapperSvc()->getVideos($response, $format);
    }
}
