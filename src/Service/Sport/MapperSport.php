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
        if(is_object($datas)) {
            $sport->setIdSport($datas->IDSPORT);
            $sport->setNom($datas->NOM);
        } else {
            $sport->setIdSport($datas['IDSPORT']);
            $sport->setNom($datas['NOM']);
        }
    }
    
    public function getSports($datas) {
        $sports = array();
        $sportsExpected = array ("36","101", "39", "9", "46", "38", "37", "109");
        if(is_object($datas)) {
            foreach ($datas->children()->children() as $d) {
                if (in_array($d->IDSPORT, $sportsExpected)) {
                    $tmp = new Sport();
                    $this->populateSport($tmp, $d);
                    $sports[] = $tmp;
                    unset($tmp);
                }
            }
        } else {
            $iterator = new \RecursiveArrayIterator($datas);
            while ($iterator->valid()) {
                if ($iterator->hasChildren()) {
                    foreach ($iterator->getChildren() as $key => $value) {
                        if(is_array($value) && !empty($value) && in_array($value['IDSPORT'], $sportsExpected)) {
                            $tmp = new Sport();
                            $this->populateSport($tmp, $value);
                            $sports[] = $tmp;
                            unset($tmp);
                        }
                    }
                }
                $iterator->next();
            }
        }
        return $sports;
    }
}
