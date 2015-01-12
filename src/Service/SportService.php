<?php

namespace Lequipe\Service;

use Lequipe\Service\Sport\SportInterface;
/**
 * Description of SportsService
 *
 * @author cguinet
 */
class SportService implements SportServiceInterface{
    
    /**
     * 
     * @var SportInterface
     */
    private $sportSvc;
    
    /**
     * @return \Lequipe\Service\Video\SportInterface
     */
    function getSportSvc() {
        return $this->sportSvc;
    }
    
    /**
     * @param \Lequipe\Service\Video\SportInterface $sportSvc
     */
    function setSportSvc($sportSvc) {
        $this->sportSvc = $sportSvc;
    }

    public function getSport() {
        return $this->getSportSvc()->execute();
    }
}
