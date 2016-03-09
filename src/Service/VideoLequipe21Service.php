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
     * @var LastVideoLequipe21Interface
     */
    private $lastSvc;

    private $grilleSvc;

    public function getLastVideo($nb = 10, $idEmission = '', $tri = '', $page = '', $jours = '')
    {
        return $this->getLastSvc()->execute($nb, $idEmission, $tri, $page, $jours);
    }

    public function getGrille($dateDebut, $dateFin)
    {
        return $this->getGrilleSvc()->execute($dateDebut, $dateFin);
    }

    /**
     * @return \Lequipe\Service\Video\LastVideoLequipe21Interface
     */
    public function getLastSvc()
    {
        return $this->lastSvc;
    }

    /**
     * @param \Lequipe\Service\Video\LastVideoLequipe21Interface $lastSvc
     */
    public function setLastSvc($lastSvc)
    {
        $this->lastSvc = $lastSvc;
    }

    /**
     * @return mixed
     */
    public function getGrilleSvc()
    {
        return $this->grilleSvc;
    }

    /**
     * @param mixed $grilleSvc
     */
    public function setGrilleSvc($grilleSvc)
    {
        $this->grilleSvc = $grilleSvc;
    }
}