<?php
/**
 * Created by PhpStorm.
 * User: mmarynich
 * Date: 08/03/16
 * Time: 17:42
 */

namespace Lequipe\Service\GrilleLequipe21;


interface SerializerGrilleLequipe21Interface
{
    public function serializeGrille($dateDebut, $dateFin);
}