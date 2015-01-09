<?php

namespace Lequipe\Services\Sports;

use Lequipe\Entity\Sport;

/**
 *
 * @author cguinet
 */
interface MapperSportsInterface {
    public function populateSport(Sport $sport, $datas);
}
