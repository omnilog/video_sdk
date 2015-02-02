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
            $sport->setIdTag($datas->IDTAG);
            $sport->setLibelle($datas->LIBELLE);
            $sport->setIdSport($datas->IDSPORT);
        } else {
            $sport->setIdTag($datas['IDTAG']);
            $sport->setLibelle($datas['LIBELLE']);
            $sport->setIdSport($datas['IDSPORT']);
        }
    }
    
    public function getSports($datas) {
        $sports = array();
        
        if(is_object($datas)) {
            foreach ($datas->children()->children() as $d) {
                if(isset($d->IDTAG) && !empty($d->IDTAG)) {
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
                        if(is_array($value) && !empty($value['IDTAG'])) {
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
