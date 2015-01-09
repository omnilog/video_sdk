<?php

namespace Lequipe;

use Lequipe\Service\AuthService;
use Lequipe\Service\GuzzleService;
use Lequipe\Service\UriParamService;
use Lequipe\Service\Video\UneVideo;
use Lequipe\Service\Video\MapperVideo;
use Lequipe\Service\VideoService;

//Service restants à créer :

//Mapper sport
//Sport Service

use Lequipe\Service\VideoServiceInterface;
use Pimple\Container;

class LequipeFactory {
    
    private $url = null;
    private $login = null;
    private $password = null;

    public function __construct($url, $login, $password)
    {
        $this->url = $url;
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * @return VideoServiceInterface
     */
    public function getVideoService() {
        $container = $this->getContainer();
        return $container['service.video'];
    }

    private function getContainer()
    {
        $container = new Container();

        // init parameter
        $container['url'] = $this->url;
        $container['login'] = $this->login;
        $container['password'] = $this->password;

        // UriParamService
        $container['service.uri_param'] = function ($c) {
            return new UriParamService();
        };

        // AuthService
        $container['service.auth'] = function ($c) {
            $svc = new AuthService($c['login'], $c['password']);
            return $svc;
        };

        // GuzzleService
        $container['service.guzzle'] = function ($c) {
            $svc = new GuzzleService($c['url']);
            $svc->setAuthSvc($c['service.auth']);
            $svc->setUriParamSvc($c['service.uri_param']);

            return $svc;
        };

        // MapperVideo
        $container['service.video.mapper'] = function($c) {
            return new MapperVideo();
        };

        // UneVideo
        $container['service.video.une'] = function ($c) {
            $svc = new UneVideo();
            $svc->setGuzzleSvc($c['service.guzzle']);
            $svc->setMapperSvc($c['service.video.mapper']);

            return $svc;
        };

        // VideoService
        $container['service.video'] = function ($c) {
            $svc = new VideoService();
            $svc->setUneSvc($c['service.video.une']);

            return $svc;
        };

        return $container;
    }

//    public function getContainer($url, $apiKey) {
//        $container = new Container();
//
//        $container['url'] = $url;
//        $container['apikey'] = $apiKey;
//
//        // ExceptionService
//        $container['service.exception'] = function ($c) {
//            return new ExceptionService();
//        };
//
//        // GuzzleService
//        $container['service.guzzle'] = function ($c) {
//            $svc = new GuzzleService();
//            $svc->setUrl($c['api_url']);
//            $svc->setExceptionService($c['service.exception']);
//            return $svc;
//        };
//
//        // MapperVideos
//        $container['service.videos.mapper'] = function ($c) {
//            return new MapperVideo();
//        };
//
//        // SerializerVideos
//        $container['service.videos.serializer'] = function ($c) {
//            return new SerializerVideo();
//        };
//        //getLastVideos
//        $container['service.videos.last'] = function ($c) {
//            $svc = new VideosLast();
//            $svc->setGuzzleSvc($c['service.guzzle']);
//            $svc->setMapperSvc($c['service.videos.mapper']);
//            $svc->setSerializerSvc($c['service.videos.serializer']);
//            return $svc;
//        };
//
//        //getVideosUne
//        $container['service.videos.une'] = function ($c) {
//            $svc = new VideosUne();
//            $svc->setGuzzleSvc($c['service.guzzle']);
//            $svc->setMapperSvc($c['service.videos.mapper']);
//            $svc->setSerializerSvc($c['service.videos.serializer']);
//            return $svc;
//        };
//
//        //service videos
//        $container['service.videos'] = function($c) {
//            $svc = new VideosService();
//            $svc->setLastSvc($c['service.videos.last']);
//            $svc->setUneSvc($c['service.videos.une']);
//        };
//
//        // MapperSports
//        $container['service.sports.mapper'] = function ($c) {
//            return new MapperSport();
//        };
//
//        /*
//
//
//        //getSports
//        $container['service.sport.search'] = function ($c) {
//            $svc = new SportsSearch();
//            //$svc->setGuzzleSvc($c['service.guzzle']);
//            $svc->setMapperSvc($c['service.sports.mapper']);
//            $svc->setSerializerSvc($c['service.sports.serializer']);
//            return $svc;
//        };
//
//        //service sport
//         $container['service.sports'] = function ($c) {
//            $svc = new SportService();
//            $svc->setSearchSvc($c['service.sport.search']);
//        };
//
//         * *
//        */
//
//        return $container;
//    }
   
    
}

