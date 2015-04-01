<?php

namespace Lequipe\Service\Sport;
/**
 * @author mmarynich
 */
class Tag extends AbstractSport implements TagInterface {

    const URI = 'videos2/getTag';

    public function execute($idtag) {
        $response = $this->getGuzzleSvc()->get(
            self::URI,
            "",
            $this->getSerializerSvc()->serializeTag($idtag)
        );
        return $this->getMapperSvc()->getSports($response);
    }
}
