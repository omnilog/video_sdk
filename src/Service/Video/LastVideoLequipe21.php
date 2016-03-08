<?php
/**
 * Created by PhpStorm.
 * User: mmarynich
 * Date: 07/03/16
 * Time: 15:08
 */

namespace Lequipe\Service\Video;


class LastVideoLequipe21 extends AbstractVideo implements LastVideoLequipe21Interface
{
    const URI = 'videos2/getLastVideosE21';

    public function execute($nb = 10, $idEmission = '', $tri = '', $page = '', $jours = '')
    {
        $response = $this->getGuzzleSvc()->get(
            self::URI,
            '',
            $this->getSerializerSvc()->serializeLast($nb, $idEmission, $tri, $page, $jours)
        );

        return $this->getMapperSvc()->getVideos($response);
    }

}