<?php

namespace Lequipe\Service\GrilleLequipe21;

use Lequipe\Service\AbstractApiService;

/**
 * Description of AbstractSport
 *
 * @author cguinet
 */
class AbstractGrilleLequipe21 extends AbstractApiService {
    const URI = '';

    /**
     * @var MapperSportInterface
     */
    private $mapperSvc;

    /**
     * @var SerializerSportInterface
     */
    private $serializerSvc;
    
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

    /**
     * @param SerializerSportInterface $serializerSvc
     */
    public function setSerializerSvc($serializerSvc)
    {
        $this->serializerSvc = $serializerSvc;
    }

    /**
     * @return SerializerSportInterface
     */
    public function getSerializerSvc()
    {
        return $this->serializerSvc;
    }
    
}
