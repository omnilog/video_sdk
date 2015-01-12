<?php

/**
 * Description of ListSportTest
 *
 * @author cguinet
 */
class ListSportTest extends \PHPUnit_Framework_TestCase {
    public function testExecute() {
        
        $response = array(
            array(
                'IDSPORT' => '22',
                'NOM' => 'Aviron'
            ),
            array(
                'IDSPORT' => '104',
                'NOM' => 'BMX'
            )
        );
        
        $mockGuzzle = $this->getMock('\Lequipe\Service\GuzzleService', array('get'));
        $mockGuzzle
            ->expects($this->once())
            ->method('get')
            ->willReturn($response);
        
        $mockMapperSvc = $this->getMock('\Lequipe\Service\Sport\MapperSport', array('getSports'));
        $mockMapperSvc
            ->expects($this->once())
            ->method('getSports')
            ->with($response)
            ->willReturn('OK getSports');

        $svc = new \Lequipe\Service\Sport\ListSport();
        $svc->setGuzzleSvc($mockGuzzle);
        $svc->setMapperSvc($mockMapperSvc);
        $this->assertEquals('OK getSports', $svc->execute());
        
    }
}
