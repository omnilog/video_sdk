<?php
namespace Lequipe\Service;

use Lequipe\Service\Video\LastVideoInterface;
use Lequipe\Service\Video\UneVideoInterface;
use Lequipe\Service\Video\TypeHomeVideoInterface;
use Lequipe\Service\Video\SearchVideoInterface;

/**
 * Description of Video
 *
 * @author cguinet
 */
class VideoService implements VideoServiceInterface{
    
    private $format = null;
    
    public function __construct($format) {
        $this->format = $format;
    }
    
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
    
    /**
     * 
     * @var SearchVideoInterface
     */
    private $searchSvc;

    public function getLastVideo($nb = 10, $idtag = "", $tri = "") {
        $format = $this->getFormat();
        return $this->getLastSvc()->execute($nb, $idtag, $tri, $format);
    }
    
    public function getUneVideo() {
        $format = $this->getFormat();
        return $this->getUneSvc()->execute($format);
    }
    
    public function getTypeHomeVideo($idtag) {
        $format = $this->getFormat();
        return $this->getTypeHomeSvc()->execute($idtag, $format);
    }

    public function getSearchVideo($term, $nb = 10) {
        $format = $this->getFormat();
        return $this->getSearchSvc()->execute($term, $nb, $format);
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

    /**
     * @return \Lequipe\Service\Video\SearchVideoInterface
     */
    function getSearchSvc() {
        return $this->searchVideoSvc;
    }

    /**
     * @param \Lequipe\Service\Video\SearchVideoInterface $searchSvc
     */
    function setSearchSvc($searchVideoSvc) {
        $this->searchVideoSvc = $searchVideoSvc;
    }

    public function getFormat() {
        return $this->format;
    }

}
