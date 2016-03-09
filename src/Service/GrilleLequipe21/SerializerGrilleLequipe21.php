<?php
/**
 * Created by PhpStorm.
 * User: mmarynich
 * Date: 08/03/16
 * Time: 17:43
 */

namespace Lequipe\Service\GrilleLequipe21;


class SerializerGrilleLequipe21 implements SerializerGrilleLequipe21Interface
{
    public function serializeGrille($dateDebut, $dateFin)
    {
        return array(
            'debut' => $dateDebut,
            'fin'   => $dateFin
        );
    }
}