<?php

namespace Lequipe\Services\Sports;

use Lequipe\Entity\Sport;
/**
 * Description of MapperSport
 *
 * @author cguinet
 */
class MapperSports implements MapperSportsInterface {
    public function populateSport(Sport $sport, $datas) {
        $sport->setIdSport($datas['IDSPORT']);
        $sport->setNom($datas['NOM']);
    }
    
    public function getSports($datas) {
        $sports = [];
        foreach ($data as $d) {
            $tmp = new Sport();
            $this->populateSport($tmp, $d);
            $sports[] = $tmp;
            unset($tmp);
        }
        return $sports;
    }
}
