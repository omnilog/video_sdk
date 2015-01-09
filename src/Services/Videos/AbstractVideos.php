<?php

namespace Lequipe\Services\Videos;

use Lequipe\Services\AbstractApiService;
/**
 * Description of AbstractVideos
 *
 * @author cguinet
 */
abstract class AbstractVideos extends AbstractApiService {

//    const URI = '/';

    /**
     * @var MapperVideoInterface
     */
    private $mapperSvc;
    
    /**
     * @var SerializerVideosInterface
     */
    private $serialiserSvc;


    /**
     * @param MapperVideosInterface $mapperSvc
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
     * @param SerializerVideosInterface $serializerSvc
     */
    public function setSerializerSvc($serializerSvc)
    {
        $this->mapperSvc = $mapperSvc;
    }

    /**
     * @return SerializerVideosInterface
     */
    public function getSerializerSvc()
    {
        return $this->serializerSvc;
    }
}
