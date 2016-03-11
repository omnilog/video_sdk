<?php
/**
 * Created by PhpStorm.
 * User: mmarynich
 * Date: 08/03/16
 * Time: 17:43
 */

namespace Lequipe\Service\Lequipe21;


class SerializerLequipe21 implements SerializerLequipe21Interface
{
    public function serializeGrille($dateDebut, $dateFin)
    {
        return array(
            'debut' => $dateDebut,
            'fin'   => $dateFin
        );
    }

}