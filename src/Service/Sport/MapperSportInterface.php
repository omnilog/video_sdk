<?php

namespace Lequipe\Service\Sports;

use Lequipe\Entity\Sport;

/**
 *
 * @author cguinet
 */
interface MapperSportInterface {
    public function populateSport(Sport $sport, $datas);
}
