<?php
/**
 * Created by PhpStorm.
 * User: mmarynich
 * Date: 07/03/16
 * Time: 16:47
 */

namespace Lequipe\Service\Video;


class SerializerVideoLequipe21 implements SerializerVideoLequipe21Interface
{
    public function serializeLast($nb, $idEmission, $tri, $page, $jours)
    {
        return array(
            'nb'    => $nb,
            'idemission' => $idEmission,
            'tri'   => $tri,
            'page'  => $page,
            'jours' => $jours
        );
    }

}