<?php

namespace Lequipe\Service\Video;

use Lequipe\Entity\Video;
use Lequipe\Entity\TypeVideo;
/**
 *
 * @author cguinet
 */
interface MapperVideoInterface {
    public function populateVideo(Video $vid, $datas);
    
    public function getVideos($datas, $format);
            
    public function populateTypeVideo(TypeVideo $typeVid, $datas);
    
    public function getTypeVideos($datas, $format);
}
