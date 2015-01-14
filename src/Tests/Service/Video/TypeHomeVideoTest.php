<?php

/**
 * Description of TypeHomeVideoTest
 *
 * @author cguinet
 */
class TypeHomeVideoTest extends \PHPUnit_Framework_TestCase {
    public function testExecute() {
         $response =
            array(
                'ID' => '42',
                'TYPE' => 'TOP'
            );
        
        $mockGuzzle = $this->getMock('\Lequipe\Service\GuzzleService', array('get'));
        $mockGuzzle
            ->expects($this->once())
            ->method('get')
            ->willReturn($response);
        
        $mockSerializerSvc = $this->getMock('\Lequipe\Service\Video\SerializerVideo', array('serializeTypeHome'));
        $mockSerializerSvc
            ->expects($this->once())
            ->method('serializeTypeHome')
            ->willReturn(array('serialize-typeHome'));
        
        $mockMapperSvc = $this->getMock('\Lequipe\Service\Video\MapperVideo', array('getTypeVideos'));
        $mockMapperSvc
            ->expects($this->once())
            ->method('getTypeVideos')
            ->with($response)
            ->willReturn('OK getTypeVideos');
        
        $svc = new \Lequipe\Service\Video\TypeHomeVideo();
        $svc->setGuzzleSvc($mockGuzzle);
        $svc->setSerializerSvc($mockSerializerSvc);
        $svc->setMapperSvc($mockMapperSvc);
        $this->assertEquals('OK getTypeVideos', $svc->execute(42));
    }
}
