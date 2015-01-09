<?php

namespace Lequipe;

use Lequipe\Services\VideosService;
use Lequipe\Services\Videos\VideosLast;
use Lequipe\Services\Videos\VideosUne;

use Lequipe\Services\ExceptionService;
use Lequipe\Services\GuzzleService;

use Lequipe\Services\Videos\MapperVideo;
use Lequipe\Services\Videos\SerializerVideos;

//Services restants à créer :

//Mapper sport
//Sports Service

use Pimple\Container;

class LequipeFactory {
    
    public function getVideoService($url, $apiKey) {
        $container = self::getContainer($url, $apiKey);
        return $container['service.videos'];
    }
    
    public function getContainer($url, $apiKey) {   
        $container = new Container();
        
        $container['url'] = $url;
        $container['apikey'] = $apiKey;
        
        // ExceptionService
        $container['service.exception'] = function ($c) {
            return new ExceptionService();
        };
        
        // GuzzleService
        $container['service.guzzle'] = function ($c) {
            $svc = new GuzzleService();
            $svc->setUrl($c['api_url']);
            $svc->setExceptionService($c['service.exception']);
            return $svc;
        };
        
        // MapperVideos
        $container['service.videos.mapper'] = function ($c) {
            return new MapperVideo();
        };
        
        // SerializerVideos
        $container['service.videos.serializer'] = function ($c) {
            return new SerializerVideo();
        };
        //getLastVideos
        $container['service.videos.last'] = function ($c) {
            $svc = new VideosLast();
            $svc->setGuzzleSvc($c['service.guzzle']);
            $svc->setMapperSvc($c['service.videos.mapper']);
            $svc->setSerializerSvc($c['service.videos.serializer']);
            return $svc;
        };
        
        //getVideosUne
        $container['service.videos.une'] = function ($c) {
            $svc = new VideosUne();
            $svc->setGuzzleSvc($c['service.guzzle']);
            $svc->setMapperSvc($c['service.videos.mapper']);
            $svc->setSerializerSvc($c['service.videos.serializer']);
            return $svc;
        };
        
        //service videos
        $container['service.videos'] = function($c) {
            $svc = new VideosService();
            $svc->setLastSvc($c['service.videos.last']);
            $svc->setUneSvc($c['service.videos.une']);
        };
        
        // MapperSports
        $container['service.sports.mapper'] = function ($c) {
            return new MapperSport();
        };
        
        /*
      
        
        //getSports 
        $container['service.sport.search'] = function ($c) {
            $svc = new SportsSearch();
            //$svc->setGuzzleSvc($c['service.guzzle']);
            $svc->setMapperSvc($c['service.sports.mapper']);
            $svc->setSerializerSvc($c['service.sports.serializer']);
            return $svc;
        };
         
        //service sport
         $container['service.sports'] = function ($c) {
            $svc = new SportService();
            $svc->setSearchSvc($c['service.sport.search']);
        };
         
         * * 
        */
        
        return $container;
    }
   
    
}

