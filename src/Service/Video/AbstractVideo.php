<?php

namespace Lequipe\Service\Video;

use Lequipe\Service\AbstractApiService;
/**
 * Description of AbstractVideos
 *
 * @author cguinet
 */
abstract class AbstractVideo extends AbstractApiService {

    const URI = '';

    /**
     * @var MapperVideoInterface
     */
    private $mapperSvc;
    
    /**
     * @var SerializerVideoInterface
     */
    private $serialiserSvc;


    /**
     * @param MapperVideoInterface $mapperSvc
     */
    public function setMapperSvc($mapperSvc)
    {
        $this->mapperSvc = $mapperSvc;
    }

    /**
     * @return MapperVideoInterface
     */
    public function getMapperSvc()
    {
        return $this->mapperSvc;
    }
    
    /**
     * @param SerializerVideoInterface $serializerSvc
     */
    public function setSerializerSvc($serializerSvc)
    {
        $this->mapperSvc = $mapperSvc;
    }

    /**
     * @return SerializerVideoInterface
     */
    public function getSerializerSvc()
    {
        return $this->serializerSvc;
    }
}
