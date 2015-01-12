<?php
namespace Lequipe\Service;

use Lequipe\Service\Video\LastVideoInterface;
use Lequipe\Service\Video\UneVideoInterface;
use Lequipe\Service\Video\TypeHomeVideoInterface;

/**
 * Description of Video
 *
 * @author cguinet
 */
class VideoService implements VideoServiceInterface{
    
    /**
     * 
     * @var LastVideoInterface
     */
    private $lastSvc;
    
    /**
     * 
     * @var UneVideoInterface
     */
    private $uneSvc;
    
    /**
     * 
     * @var TypeHomeVideoInterface
     */
    private $typeHomeSvc;

    public function getLastVideo($nb = 10, $idtag = "", $tri = "") {
        return $this->getLastSvc()->execute($nb, $idtag, $tri);
    }
    
    public function getUneVideo() {
        return $this->getUneSvc()->execute();
    }
    
    public function getTypeHomeVideo($idtag) {
        return $this->getTypeHomeSvc()->execute($idtag);
    }

    /**
     * @param \Lequipe\Service\Video\LastVideoInterface $lastSvc
     */
    public function setLastSvc($lastSvc)
    {
        $this->lastSvc = $lastSvc;
    }

    /**
     * @return \Lequipe\Service\Video\LastVideoInterface
     */
    public function getLastSvc()
    {
        return $this->lastSvc;
    }

    /**
     * @param \Lequipe\Service\Video\UneVideoInterface $uneSvc
     */
    public function setUneSvc($uneSvc)
    {
        $this->uneSvc = $uneSvc;
    }

    /**
     * @return \Lequipe\Service\Video\UneVideoInterface
     */
    public function getUneSvc()
    {
        return $this->uneSvc;
    }
    
    /**
     * @return \Lequipe\Service\Video\TypeHomeVideoInterface
     */
    function getTypeHomeSvc() {
        return $this->typeHomeSvc;
    }

    /**
     * @param \Lequipe\Service\Video\TypeHomeVideoInterface $typeHomeSvc
     */
    function setTypeHomeSvc($typeHomeSvc) {
        $this->typeHomeSvc = $typeHomeSvc;
    }


}
