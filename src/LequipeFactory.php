<?php

namespace Lequipe;

use Lequipe\Service\AuthService;
use Lequipe\Service\GuzzleService;
use Lequipe\Service\UriParamService;
use Lequipe\Service\Video\UneVideo;
use Lequipe\Service\Video\LastVideo;
use Lequipe\Service\Video\MapperVideo;
use Lequipe\Service\Video\SerializerVideo;
use Lequipe\Service\VideoService;
use Lequipe\Service\VideoServiceInterface;

use Lequipe\Service\SportService;
use Lequipe\Service\Sport\Sport;
use Lequipe\Service\Sport\MapperSport;
use Lequipe\Service\SportServiceInterface;

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

    /**
     * @return SportServiceInterface
     */
    public function getSportService() {
        $container = $this->getContainer();
        return $container['service.sport'];
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
        
        //SerializerVideo
        $container['service.video.serializer'] = function($c) {
            return new SerializerVideo();
        };

        // UneVideo
        $container['service.video.une'] = function ($c) {
            $svc = new UneVideo();
            $svc->setGuzzleSvc($c['service.guzzle']);
            $svc->setMapperSvc($c['service.video.mapper']);

            return $svc;
        };

        // LastVideos
        $container['service.video.last'] = function ($c) {
            $svc = new LastVideo();
            $svc->setGuzzleSvc($c['service.guzzle']);
            $svc->setMapperSvc($c['service.video.mapper']);
            $svc->setSerializer($c['service.video.serializer']);
            return $svc;
        };
        
        //TypeHomeVideos
        $container['service.video.typeHome'] = function($c) {
            $svc = new Lequipe\Service\Video\TypeHomeVideo();
            $svc->setGuzzleSvc($c['service.guzzle']);
            $svc->setMapperSvc($c['service.video.mapper']);
            $svc->setSerializer($c['service.video.serializer']);
            return $svc;
        };
        
        // VideoService
        $container['service.video'] = function ($c) {
            $svc = new VideoService();
            $svc->setUneSvc($c['service.video.une']);
            $svc->setLastSvc($c['service.video.last']);
            $svc->setTypeHomeSvc($c['service.video.typeHome']);
            return $svc;
        };
        
        // MapperSport
        $container['service.sport.mapper'] = function($c) {
            return new MapperSport();
        };
        
        //Sports
        $container['service.sport.sport'] = function($c) {
            $svc = new Sport;
            $svc->setGuzzleSvc($c['service.guzzle']);
            $svc->setMapperSvc($c['service.sport.mapper']);
            return $svc;
        };
        
        //SportService
        $container['service.sport'] = function($c) {
            $svc = new SportService;
            $svc->setSportSvc($c['service.sport.sport']);
            return $svc;
        };

        return $container;
    }
    
}

