<?php

namespace Lequipe;

use Lequipe\Service\AuthService;
use Lequipe\Service\GuzzleService;
use Lequipe\Service\UriParamService;
use Lequipe\Service\DataFormatterService;
use Lequipe\Service\Video\UneVideo;
use Lequipe\Service\Video\LastVideo;
use Lequipe\Service\Video\TypeHomeVideo;
use Lequipe\Service\Video\MapperVideo;
use Lequipe\Service\Video\SerializerVideo;
use Lequipe\Service\VideoService;
use Lequipe\Service\VideoServiceInterface;

use Lequipe\Service\SportService;
use Lequipe\Service\Sport\ListSport;
use Lequipe\Service\Sport\MapperSport;
use Lequipe\Service\SportServiceInterface;

use Pimple\Container;

class LequipeFactory {
    
    private $url = null;
    private $login = null;
    private $password = null;
    private $format = null;

    public function __construct($url, $login, $password, $format)
    {
        $this->url = $url;
        $this->login = $login;
        $this->password = $password;
        $this->format = $format;
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
        $container['format'] = $this->format;

        //DataFormatter
        $container['service.data_formatter'] = function ($c) {
            return new DataFormatter($c['format']);
        };
        
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
            $svc->setDataFormatterSvc($c['service.data_formatter']);
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
            $svc->setSerializerSvc($c['service.video.serializer']);
            return $svc;
        };
        
        //TypeHomeVideos
        $container['service.video.typeHome'] = function($c) {
            $svc = new TypeHomeVideo();
            $svc->setGuzzleSvc($c['service.guzzle']);
            $svc->setMapperSvc($c['service.video.mapper']);
            $svc->setSerializerSvc($c['service.video.serializer']);
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
        $container['service.sport.list'] = function($c) {
            $svc = new ListSport();
            $svc->setGuzzleSvc($c['service.guzzle']);
            $svc->setMapperSvc($c['service.sport.mapper']);
            return $svc;
        };
        
        //SportService
        $container['service.sport'] = function($c) {
            $svc = new SportService();
            $svc->setListSportSvc($c['service.sport.list']);
            return $svc;
        };

        return $container;
    }
    
}

