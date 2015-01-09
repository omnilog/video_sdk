<?php

namespace Lequipe\Service\Video;

use Lequipe\Entity\Video;
/**
 *
 * @author cguinet
 */
interface MapperVideoInterface {
    public function populateVideo(Video $vid, $datas);
}
