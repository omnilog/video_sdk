<?php
/**
 * Created by PhpStorm.
 * User: mmarynich
 * Date: 07/03/16
 * Time: 15:07
 */

namespace Lequipe\Service\Video;


interface LastVideoLequipe21Interface
{
    public function execute($nb = 10, $idEmission = '', $tri = '', $page = '', $jours = '');
}