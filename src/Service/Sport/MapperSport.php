<?php

namespace Lequipe\Service\Sport;

use Lequipe\Entity\Sport;
/**
 * Description of MapperSport
 *
 * @author cguinet
 */
class MapperSport implements MapperSportInterface {
    public function populateSport(Sport $sport, $datas) {
        $sport->setIdSport($datas['IDSPORT']);
        $sport->setNom($datas['NOM']);
    }
    
    public function getSports($datas) {
        $sports = array();
        foreach ($data as $d) {
            $tmp = new Sport();
            $this->populateSport($tmp, $d);
            $sports[] = $tmp;
            unset($tmp);
        }
        return $sports;
    }
}
