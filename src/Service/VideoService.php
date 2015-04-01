<?php
namespace Lequipe\Service;

use Lequipe\Service\Video\LastVideoInterface;
use Lequipe\Service\Video\UneVideoInterface;
use Lequipe\Service\Video\TypeHomeVideoInterface;
use Lequipe\Service\Video\SearchVideoInterface;
use Lequipe\Service\Video\InfoVideoInterface;
use Lequipe\Service\Sport\ListSportInterface;
use Lequipe\Service\Sport\TagInterface;
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
    
    /**
     * 
     * @var SearchVideoInterface
     */
    private $searchSvc;
    
    /**
     *
     * @var InfoVideoInterface
     */
    private $infoSvc;
    
    
    /**
     *
     * @var ListSportInterface
     */
    private $listSportSvc;

    /**
     *
     * @var TagLibelleInterface
     */
    private $tagSvc;
    

    public function getLastVideo($nb = 10, $idtag = "", $tri = "", $page = "", $jours = "") {
        return $this->getLastSvc()->execute($nb, $idtag, $tri, $page, $jours);
    }
    
    public function getUneVideo() {
        return $this->getUneSvc()->execute();
    }
    
    public function getTypeHomeVideo($idtag) {
        return $this->getTypeHomeSvc()->execute($idtag);
    }

    public function getSearchVideo($term, $nb = 10, $page = "") {
        return $this->getSearchSvc()->execute($term, $nb, $page);
    }
    
    public function getInfoVideo($id) {
        return $this->getInfoSvc()->execute($id);
    }
    
    public function getListSport() {
        return $this->getListSportSvc()->execute();
    }

    public function getTag($idtag) {
        return $this->getTagSvc()->execute($idtag);
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
    public function getTypeHomeSvc() {
        return $this->typeHomeSvc;
    }

    /**
     * @param \Lequipe\Service\Video\TypeHomeVideoInterface $typeHomeSvc
     */
    public function setTypeHomeSvc($typeHomeSvc) {
        $this->typeHomeSvc = $typeHomeSvc;
    }

    /**
     * @return \Lequipe\Service\Video\SearchVideoInterface
     */
    public function getSearchSvc() {
        return $this->searchSvc;
    }

    /**
     * @param \Lequipe\Service\Video\SearchVideoInterface $searchVideoSvc
     */
    public function setSearchSvc($searchVideoSvc) {
        $this->searchSvc = $searchVideoSvc;
    }

    /**
     * @return \Lequipe\Service\Video\InfoVideoInterface
     */
    public function getInfoSvc() {
        return $this->infoSvc;
    }
    
    /**
     * @param \Lequipe\Service\Video\InfoVideoInterface $infoVideoSvc
     */
    public function setInfoSvc($infoVideoSvc) {
        $this->infoSvc = $infoVideoSvc;
    }
    
    
    /**
     * @return \Lequipe\Service\Sport\ListSportInterface
     */
    public function getListSportSvc() {
        return $this->listSportSvc;
    }

    /**
     * @param \Lequipe\Service\Sport\ListSportInterface $listSportSvc
     */
    public function setListSportSvc(ListSportInterface $listSportSvc) {
        $this->listSportSvc = $listSportSvc;
    }

    /**
     * @return \Lequipe\Service\Sport\TagLibelleInterface
     */
    public function getTagSvc() {
        return $this->tagSvc;
    }

    /**
     * @param \Lequipe\Service\Sport\TagInterface $tagSvc
     */
    public function setTagSvc(TagInterface $tagSvc) {
        $this->tagSvc = $tagSvc;
    }
}
