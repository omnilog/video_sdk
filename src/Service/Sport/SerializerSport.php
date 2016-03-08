<?php

namespace Lequipe\Service\Sport;
/**
 * Description of SerializerSport
 *
 * @author mmarynich
 */
class SerializerSport implements SerializerSportInterface {

    public function serializeTag($idtag)
    {
        return array(
            "idtag" => $idtag
        );
    }
}
