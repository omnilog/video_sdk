<?php

namespace Lequipe\Service\Video;

/**
 *
 * @author cguinet
 */
interface LastVideoInterface {
    
    public function execute($nb = 10, $idTag = "", $tri = "", $page = "", $jours = "");

}
