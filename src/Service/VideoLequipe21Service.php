<?php
/**
 * Created by PhpStorm.
 * User: mmarynich
 * Date: 07/03/16
 * Time: 14:37
 */

namespace Lequipe\Service;


class VideoLequipe21Service implements VideoLequipe21ServiceInterface
{
    /**
     * @var \Lequipe\Service\Video\LastVideoLequipe21Interface
     */
    private $lastSvc;

    /**
     * @var \Lequipe\Service\Lequipe21\GrilleLequipe21Interface
     */
    private $grilleSvc;

    /**
     * @var \Lequipe\Service\Lequipe21\ListEmissionLequipe21Interface
     */
    private $listEmissionSvc;

    /**
     * @var \Lequipe\Service\Video\InfoVideoInterface
     */
    private $infoSvc;


    public function getLastVideo($nb = 10, $idEmission = '', $tri = '', $page = '', $jours = '')
    {
        return $this->getLastSvc()->execute($nb, $idEmission, $tri, $page, $jours);
    }

    public function getGrille($dateDebut, $dateFin)
    {
        return $this->getGrilleSvc()->execute($dateDebut, $dateFin);
    }

    public function getListEmission()
    {
        return $this->getListEmissionSvc()->execute();
    }

    public function getInfoVideo($idVideo)
    {
        return $this->getInfoSvc()->execute($idVideo);
    }

    /**
     * @return \Lequipe\Service\Video\LastVideoLequipe21Interface
     */
    public function getLastSvc()
    {
        return $this->lastSvc;
    }

    public function setLastSvc(\Lequipe\Service\Video\LastVideoLequipe21Interface $lastSvc)
    {
        $this->lastSvc = $lastSvc;
    }

    /**
     * @return \Lequipe\Service\Lequipe21\GrilleLequipe21Interface
     */
    public function getGrilleSvc()
    {
        return $this->grilleSvc;
    }

    public function setGrilleSvc(\Lequipe\Service\Lequipe21\GrilleLequipe21Interface $grilleSvc)
    {
        $this->grilleSvc = $grilleSvc;
    }

    /**
     * @return \Lequipe\Service\Lequipe21\ListEmissionLequipe21Interface
     */
    public function getListEmissionSvc()
    {
        return $this->listEmissionSvc;
    }

    public function setListEmissionSvc(\Lequipe\Service\Lequipe21\ListEmissionLequipe21Interface $listEmissionSvc)
    {
        $this->listEmissionSvc = $listEmissionSvc;
    }

    /**
     * @return \Lequipe\Service\Video\InfoVideoInterface
     */
    public function getInfoSvc()
    {
        return $this->infoSvc;
    }

    public function setInfoSvc(\Lequipe\Service\Video\InfoVideoInterface $infoVideoSvc)
    {
        $this->infoSvc = $infoVideoSvc;
    }
}