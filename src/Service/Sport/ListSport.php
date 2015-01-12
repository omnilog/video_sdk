<?php

namespace Lequipe\Service\Sport;
/**
 * Description of Sport
 *
 * @author cguinet
 */
class ListSport extends AbstractSport implements ListSportInterface {
    
    const URI = 'sports/getSports';
    
    public function execute() {
         $response = $this->getGuzzleSvc()->get(
            self::URI
        );
        return $this->getMapperSvc()->getSports($response);
    }

   
}
