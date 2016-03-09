<?php
/**
 * Created by PhpStorm.
 * User: mmarynich
 * Date: 09/03/16
 * Time: 14:25
 */

namespace Lequipe\Service\GrilleLequipe21;


use Lequipe\Entity\DiffusionLequipe21;

interface MapperGrilleLequipe21Interface
{
    public function populateDiffusionLequipe21(DiffusionLequipe21 $dif, $datas);

    public function getGrille($datas);

}