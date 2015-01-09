<?php

namespace Lequipe\Service\Video;

 /**
 * Description of VideosUne
 *
 * @author cguinet
 */

class UneVideo extends AbstractVideo implements UneVideoInterface {
    
    const URI = 'videos2/getVideosUne';
    
    public function execute() {
       
        $response = $this->getGuzzleSvc()->get(
            self::URI
        );
        var_dump(self::URI);
        var_dump($response->getVideosUne->response);
        die();
        return $this->getMapperSvc()->getVideos($response);
    }
}
