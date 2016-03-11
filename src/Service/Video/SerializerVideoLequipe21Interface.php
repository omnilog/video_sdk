<?php
/**
 * Created by PhpStorm.
 * User: mmarynich
 * Date: 07/03/16
 * Time: 16:47
 */

namespace Lequipe\Service\Video;


interface SerializerVideoLequipe21Interface
{
    public function serializeLast($nb, $idEmission, $tri, $page, $jours);

    public function serializeInfo($idVideo);
}