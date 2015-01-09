<?php
namespace Lequipe\Service;

use Lequipe\Services\Videos\VideosLastInterface;
use Lequipe\Services\Videos\VideosUneInterface;

/**
 * Description of Video
 *
 * @author cguinet
 */
class VideoService implements VideoServiceInterface{
    
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
   
    public function getLastVideo($nb = 10, $idtag = "", $tri = "") {
        return $this->getLastSvc()->execute($nb, $idtag, $tri);
    }
    
    public function getUneVideo() {
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
