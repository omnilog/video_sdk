<?php

namespace Lequipe\Service;

use Lequipe\Service\Sport\ListSportInterface;
/**
 * Description of SportsService
 *
 * @author cguinet
 */
class SportService implements SportServiceInterface{
    
    /**
     * 
     * @var ListSportInterface
     */
    private $listSportSvc;
    
    /**
     * @return \Lequipe\Service\Sport\ListSportInterface
     */
    function getListSportSvc() {
        return $this->listSportSvc;
    }
    
    /**
     * @param \Lequipe\Service\Sport\ListSportInterface $listSportSvc
     */
    function setListSportSvc($listSportSvc) {
        $this->listSportSvc = $listSportSvc;
    }

    public function getSport() {
        return $this->getListSportSvc()->execute();
    }
}
