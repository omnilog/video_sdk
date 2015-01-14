<?php

namespace Lequipe\Service\Video;
/**
 *
 * @author cguinet
 */
interface SearchVideoInterface {
    public function execute($term, $nb = 10);
}
