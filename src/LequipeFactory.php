<?php

namespace Lequipe;

use Lequipe\Service\ExceptionService;
use Lequipe\Service\AuthService;
use Lequipe\Service\GrilleLequipe21\GrilleLequipe21;
use Lequipe\Service\GrilleLequipe21\MapperGrilleLequipe21;
use Lequipe\Service\GrilleLequipe21\SerializerGrilleLequipe21;
use Lequipe\Service\GuzzleService;
use Lequipe\Service\UriParamService;
use Lequipe\Service\DataFormatterService;
use Lequipe\Service\Video\LastVideoLequipe21;
use Lequipe\Service\Video\SerializerVideoLequipe21;
use Lequipe\Service\Video\UneVideo;
use Lequipe\Service\Video\LastVideo;
use Lequipe\Service\Video\TypeHomeVideo;
use Lequipe\Service\Video\SearchVideo;
use Lequipe\Service\Video\InfoVideo;
use Lequipe\Service\Video\MapperVideo;
use Lequipe\Service\Video\SerializerVideo;
use Lequipe\Service\VideoLequipe21Service;
use Lequipe\Service\VideoService;
use Lequipe\Service\VideoServiceInterface;

use Lequipe\Service\Sport\ListSport;
use Lequipe\Service\Sport\Tag;
use Lequipe\Service\Sport\MapperSport;
use Lequipe\Service\Sport\SerializerSport;

use Pimple\Container;

class LequipeFactory {
    
    private $url = null;
    private $login = null;
    private $password = null;
    private $format = null;
    private $acllog = null;
    private $aclpass = null;
    private $proxy = null;

    const SITE_VIDEO_LEQUIPE_FR = 1;
    const SITE_LEQUIPE21_LEQUIPE_FR = 2;
    
    public function __construct($url, $login, $password, $format, $acllog = "", $aclpass = "", $proxy="")
    {
        $this->url = $url;
        $this->login = $login;
        $this->password = $password;
        $this->format = $format;
        $this->acllog = $acllog;
        $this->aclpass = $aclpass;
        $this->proxy = $proxy;
    }

    /**
     * @return VideoServiceInterface
     */
    public function getVideoService($site = self::SITE_VIDEO_LEQUIPE_FR) {
        $container = $this->getContainer($site);
        return $container['service.video'];
    }
    
    private function getContainer($site)
    {
        $container = new Container();

        // init parameter
        $container['url'] = $this->url;
        $container['login'] = $this->login;
        $container['password'] = $this->password;
        $container['format'] = $this->format;
        $container['acllog'] = $this->acllog;
        $container['aclpass'] = $this->aclpass;
        $container['proxy'] = $this->proxy;

        // ExceptionService
        $container['service.exception'] = function ($c) {
            return new ExceptionService();
        };

        //DataFormatter
        $container['service.data_formatter'] = function ($c) {
            return new DataFormatterService($c['format']);
        };

        // UriParamService
        $container['service.uri_param'] = function ($c) {
            return new UriParamService();
        };

        // AuthService
        $container['service.auth'] = function ($c) {
            $svc = new AuthService($c['login'], $c['password'], $c['acllog'], $c['aclpass']);
            return $svc;
        };

        // GuzzleService
        $container['service.guzzle'] = function ($c) {
            $svc = new GuzzleService($c['url'],null,$c['proxy']);
            $svc->setExceptionSvc($c['service.exception']);
            $svc->setDataFormatterSvc($c['service.data_formatter']);
            $svc->setAuthSvc($c['service.auth']);
            $svc->setUriParamSvc($c['service.uri_param']);

            return $svc;
        };

        switch($site) {
            case self::SITE_VIDEO_LEQUIPE_FR:
                $this->addVideoLequipeFrSvcToContainer($container);
                break;

            case self::SITE_LEQUIPE21_LEQUIPE_FR:
                $this->addLequipe21LequipeFrSvcToContainer($container);
                break;
        }
       
        return $container;
    }

    private function addVideoLequipeFrSvcToContainer(\Pimple\Container $container)
    {
        // MapperVideo
        $container['service.video.mapper'] = function($c) {
            return new MapperVideo();
        };

        //MapperSport
        $container['service.sport.mapper'] = function($c) {
            return new MapperSport();
        };

        //SerializerVideo
        $container['service.video.serializer'] = function($c) {
            return new SerializerVideo();
        };

        //SerializerSport
        $container['service.sport.serializer'] = function($c) {
            return new SerializerSport();
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

        //SearchVideos
        $container['service.video.search'] = function($c) {
            $svc = new SearchVideo();
            $svc->setGuzzleSvc($c['service.guzzle']);
            $svc->setMapperSvc($c['service.video.mapper']);
            $svc->setSerializerSvc($c['service.video.serializer']);
            return $svc;
        };

        //InfoVideo
        $container['service.video.info'] = function($c) {
            $svc = new InfoVideo();
            $svc->setGuzzleSvc($c['service.guzzle']);
            $svc->setMapperSvc($c['service.video.mapper']);
            $svc->setSerializerSvc($c['service.video.serializer']);
            return $svc;
        };

        //ListSports
        $container['service.video.listSport'] = function($c) {
            $svc = new ListSport();
            $svc->setGuzzleSvc($c['service.guzzle']);
            $svc->setMapperSvc($c['service.sport.mapper']);
            return $svc;
        };

        //Tag
        $container['service.video.tag'] = function($c) {
            $svc = new Tag();
            $svc->setGuzzleSvc($c['service.guzzle']);
            $svc->setMapperSvc($c['service.sport.mapper']);
            $svc->setSerializerSvc($c['service.sport.serializer']);
            return $svc;
        };

        // VideoService
        $container['service.video'] = function ($c) {
            $svc = new VideoService();
            $svc->setUneSvc($c['service.video.une']);
            $svc->setLastSvc($c['service.video.last']);
            $svc->setTypeHomeSvc($c['service.video.typeHome']);
            $svc->setSearchSvc($c['service.video.search']);
            $svc->setInfoSvc($c['service.video.info']);
            $svc->setListSportSvc($c['service.video.listSport']);
            $svc->setTagSvc($c['service.video.tag']);
            return $svc;
        };
    }

    private function addLequipe21LequipeFrSvcToContainer(\Pimple\Container $container)
    {
        // MapperVideo
        $container['service.video.mapper'] = function($c) {
            return new MapperVideo();
        };

        // MapperGrille
        $container['service.grille.mapper'] = function($c) {
            return new MapperGrilleLequipe21();
        };

        // SerializerVideo
        $container['service.video.serializer'] = function($c) {
            return new SerializerVideoLequipe21();
        };

        // Serializer Grille
        $container['service.grille.serializer'] = function($c) {
            return new SerializerGrilleLequipe21();
        };

        // LastVideos
        $container['service.video.last'] = function ($c) {
            $svc = new LastVideoLequipe21();
            $svc->setGuzzleSvc($c['service.guzzle']);
            $svc->setMapperSvc($c['service.video.mapper']);
            $svc->setSerializerSvc($c['service.video.serializer']);
            return $svc;
        };

        // Grille
        $container['service.grille'] = function($c) {
            $svc = new GrilleLequipe21();
            $svc->setGuzzleSvc($c['service.guzzle']);
            $svc->setMapperSvc($c['service.grille.mapper']);
            $svc->setSerializerSvc($c['service.grille.serializer']);
            return $svc;
        };

        // VideoService
        $container['service.video'] = function ($c) {
            $svc = new VideoLequipe21Service();
            $svc->setLastSvc($c['service.video.last']);
            $svc->setGrilleSvc($c['service.grille']);
            return $svc;
        };

    }
    
}

