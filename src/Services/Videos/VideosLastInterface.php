<?php

namespace Lequipe\Services\Videos;

/**
 *
 * @author cguinet
 */
interface VideosLastInterface {
    
    public function execute($nb = 10, $idTag = "", $tri = "", $format = "");

}
