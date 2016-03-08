<?php
/**
 * Created by PhpStorm.
 * User: mmarynich
 * Date: 07/03/16
 * Time: 14:43
 */

namespace Lequipe\Service;


interface VideoLequipe21ServiceInterface
{
    public function getLastVideo($nb = 10, $idEmission = '', $tri = '', $page = '', $jours = '');

    public function getGrille($dateDebut, $dateFin);
}