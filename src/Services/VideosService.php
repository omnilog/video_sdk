<?php
namespace Lequipe\Services;

use Lequipe\Services\Videos\VideosLastInterface;
use Lequipe\Services\Videos\VideosUneInterface;

/**
 * Description of Videos
 *
 * @author cguinet
 */
class VideosService implements VideosServiceInterface{
    
    /**
     * 
     * @var VideosLastInterface
     */
    private $lastSvc;
    
    /**
     * 
     * @var VideosUneInterface
     */
    private $uneSvc;
   
    public function getLastVideosSvc($nb = 10, $idtag = "", $tri = "") {
        return $this->getLastSvc()->execute($nb, $idtag, $tri);
    }
    
    public function getUneVideosSvc() {
        return $this->getUneSvc()->execute();
    }
    
    /**
     * @param VideosLastInterface $lastSvc
     */
    public function setLastSvc($lastSvc) {
        $this->lastSvc = $lastSvc;
    }
    
    /**
     * @return VideosLastInterface
     */
    public function getLastSvc() {
        return $this->lastSvc;
    }
   
    /**
     * @param VideosUneInterface $uneSvc
     */
    public function setUneSvc($uneSvc) {
        $this->uneSvc = $uneSvc;
    }
    
    /**
     * @return VideosUneInterface
     */
    public function getUneSvc() {
        return $this->uneSvc;
    }

 
}
