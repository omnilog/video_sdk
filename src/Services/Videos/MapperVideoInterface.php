<?php

namespace Lequipe\Services\Videos;

use Lequipe\Entity\Video;
/**
 *
 * @author cguinet
 */
interface MapperVideoInterface {
    public function populateVideo(Video $vid, $datas);
}
