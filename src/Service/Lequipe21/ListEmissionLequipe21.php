<?php
/**
 * Created by PhpStorm.
 * User: mmarynich
 * Date: 10/03/16
 * Time: 16:19
 */

namespace Lequipe\Service\Lequipe21;


class ListEmissionLequipe21 extends AbstractLequipe21 implements ListEmissionLequipe21Interface
{
    const URI = 'videos2/getListEmissionsE21';

    public function execute()
    {
        $response = $this->getGuzzleSvc()->get(
            self::URI
        );

        return $this->getMapperSvc()->getEmissions($response);
    }

}