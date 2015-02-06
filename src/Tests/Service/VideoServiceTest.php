<?php

class VideoServiceTest extends \PHPUnit_Framework_TestCase {

    public function testGetUneVideo() {
        $mock = $this->getMock('\Lequipe\Service\Video\UneVideo', array('execute'));
        $mock
            ->expects($this->once())
            ->method('execute')
            ->willReturn('uneSvc');
        
        $svc = new \Lequipe\Service\VideoService();
        $svc->setUneSvc($mock);
        $this->assertEquals('uneSvc', $svc->getUneVideo());
    }
    
    public function testGetLast() {
        $mock = $this->getMock('\Lequipe\Service\Video\LastVideo', array('execute'));
        $mock
            ->expects($this->once())
            ->method('execute')
            ->willReturn('lastSvc');
        
        $svc = new \Lequipe\Service\VideoService();
        $svc->setLastSvc($mock);
        $this->assertEquals('lastSvc', $svc->getLastVideo());
    }
    
    public function testGetTypeHomeVideo() {
        $mock = $this->getMock('\Lequipe\Service\Video\TypeHomeVideo', array('execute'));
        $mock
            ->expects($this->once())
            ->method('execute')
            ->willReturn('typeHomeSvc');
        
        $svc = new \Lequipe\Service\VideoService();
        $svc->setTypeHomeSvc($mock);
        $this->assertEquals('typeHomeSvc', $svc->getTypeHomeVideo(48));   
    }
    
    public function testGetSearchVideo() {
        $mock = $this->getMock('\Lequipe\Service\Video\SearchVideo', array('execute'));
        $mock
            ->expects($this->once())
            ->method('execute')
            ->willReturn('searchSvc');
        
        $svc = new \Lequipe\Service\VideoService();
        $svc->setSearchSvc($mock);
        $this->assertEquals('searchSvc', $svc->getSearchVideo("ribery"));
    }
    
    public function testGetListSport() {
        $mock = $this->getMock('\Lequipe\Service\Sport\ListSport', array('execute'));
        $mock
            ->expects($this->once())
            ->method('execute')
            ->willReturn('listSportSvc');
        
        $svc = new \Lequipe\Service\VideoService();
        $svc->setListSportSvc($mock);
        $this->assertEquals('listSportSvc', $svc->getListSport());
    }
    
    public function testGetInfoVideo() {
        $mock = $this->getMock('\Lequipe\Service\Video\InfoVideo', array('execute'));
        $mock
            ->expects($this->once())
            ->method('execute')
            ->willReturn('infoSvc');
        
        $svc = new \Lequipe\Service\VideoService();
        $svc->setInfoSvc($mock);
        $this->assertEquals('infoSvc', $svc->getInfoVideo('x2emsac'));
    }
}