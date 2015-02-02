<?php

namespace Lequipe\Service\Sport;

use Lequipe\Entity\Sport;

/**
 *
 * @author cguinet
 */
interface MapperSportInterface {
    public function populateSport(Sport $sport, $datas);
}
