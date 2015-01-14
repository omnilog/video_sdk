<?php

namespace Lequipe\Service\Video;

/**
 * Description of TypeHomeVideo
 *
 * @author cguinet
 */
class TypeHomeVideo  extends AbstractVideo implements TypeHomeVideoInterface{
    
    const URI = 'videos2/getTypeHome';
    
    public function execute($idtag, $format) {
       
        $response = $this->getGuzzleSvc()->get(
            self::URI, 
            "", 
            $this->getSerializerSvc()->serializeTypeHome($idtag)
        );
        return $this->getMapperSvc()->getTypeVideos($response, $format);
    }

}
