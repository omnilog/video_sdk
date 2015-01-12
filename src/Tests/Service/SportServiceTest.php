<?php

/**
 * Description of SportServiceTest
 *
 * @author cguinet
 */
class SportServiceTest extends \PHPUnit_Framework_TestCase {
    
    public function testGetSport() {
        $mock = $this->getMock('\Lequipe\Service\Sport\ListSport', array('execute'));
        $mock
                ->expects($this->once())
                ->method('execute')
                ->willReturn('listSportSvc');
        
        $svc = new \Lequipe\Service\SportService();
        $svc->setListSportSvc($mock);
        $this->assertEquals('listSportSvc', $svc->getSport());
    }
}
