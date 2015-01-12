<?php

namespace Lequipe\Service\Sport;

use Lequipe\Service\AbstractApiService;

/**
 * Description of AbstractSport
 *
 * @author cguinet
 */
class AbstractSport extends AbstractApiService {
    const URI = '';

    /**
     * @var MapperSportInterface
     */
    private $mapperSvc;
    
    /**
     * @param MapperSportInterface $mapperSvc
     */
    public function setMapperSvc($mapperSvc)
    {
        $this->mapperSvc = $mapperSvc;
    }

    /**
     * @return MapperSportInterface
     */
    public function getMapperSvc()
    {
        return $this->mapperSvc;
    }
    
}
