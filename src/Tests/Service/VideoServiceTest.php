<?php

class VideoServiceTest extends \PHPUnit_Framework_TestCase {

    public function testGetUneVideo() {
        $mock = $this->getMock('\Lequipe\Service\Video\UneVideo', array('execute'));
        $mock
            ->expects($this->once())
            ->method('execute')
            ->willReturn('uneSvc');
        
        $svc = new \Lequipe\Service\VideoService('xml');
        $svc->setUneSvc($mock);
        $this->assertEquals('uneSvc', $svc->getUneVideo());
    }
    
    public function testGetLast() {
        $mock = $this->getMock('\Lequipe\Service\Video\LastVideo', array('execute'));
        $mock
            ->expects($this->once())
            ->method('execute')
            ->willReturn('lastSvc');
        
        $svc = new \Lequipe\Service\VideoService('xml');
        $svc->setLastSvc($mock);
        $this->assertEquals('lastSvc', $svc->getLastVideo());
    }
    
    public function testGetTypeHomeVideo() {
        $mock = $this->getMock('\Lequipe\Service\Video\TypeHomeVideo', array('execute'));
        $mock
            ->expects($this->once())
            ->method('execute')
            ->willReturn('typeHomeSvc');
        
        $svc = new \Lequipe\Service\VideoService('xml');
        $svc->setTypeHomeSvc($mock);
        $this->assertEquals('typeHomeSvc', $svc->getTypeHomeVideo(48));   
    }
    
    public function testGetSearchVideo() {
        $mock = $this->getMock('\Lequipe\Service\Video\SearchVideo', array('execute'));
        $mock
            ->expects($this->once())
            ->method('execute')
            ->willReturn('searchSvc');
        
        $svc = new \Lequipe\Service\VideoService('xml');
        $svc->setSearchSvc($mock);
        $this->assertEquals('searchSvc', $svc->getSearchVideo("ribery"));
        
    }
}