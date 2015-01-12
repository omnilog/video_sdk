<?php

namespace Lequipe\Service\Sport;
/**
 * Description of Sport
 *
 * @author cguinet
 */
class Sport extends AbstractSport implements SportInterface {
    
    const URI = 'sports/getSports';
    
    public function execute() {
         $response = $this->getGuzzleSvc()->get(
            self::URI
        );
        return $this->getMapperSvc()->getSports($response);
    }

   
}
