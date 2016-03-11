<?php
/**
 * Created by PhpStorm.
 * User: mmarynich
 * Date: 08/03/16
 * Time: 17:34
 */

namespace Lequipe\Service\Lequipe21;


class GrilleLequipe21 extends AbstractLequipe21 implements GrilleLequipe21Interface
{
    const URI = 'videos2/getGrilleE21';

    public function execute($dateDebut, $dateFin)
    {
        $response = $this->getGuzzleSvc()->get(
            self::URI,
            '',
            $this->getSerializerSvc()->serializeGrille($dateDebut, $dateFin)
        );

        return $this->getMapperSvc()->getGrille($response);
    }

}