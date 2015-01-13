<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LastVideoTest
 *
 * @author cguinet
 */
class LastVideoTest extends \PHPUnit_Framework_TestCase {
   public function testExecute() {
       $response = array(
            array(
                'ID' => '42',
                    'TITRE_LONG' => 'la vraie reponse', 
                    'TITRE' =>  'la reponse',
                    'SURTITRE1' => 'Ou pas',
                    'SURTITRE2' =>  'peut être',
                    'DESCRIPTIF' =>  'la reponse a la question',
                    'DUREE' => '122' ,
                    'DATE' => 'Jan 11 2014 07:59:01:607PM',
                    'IDSPORT' => '101',
                    'KEYWORD' =>  '42 ; la reponse',
                    'NB_VUES' =>  '420',
                    'TAGS' => 'Tag1'
            ),
            array(
                'ID' => '38',
                    'TITRE_LONG' => 'mon titre long', 
                    'TITRE' =>  'mon titre',
                    'SURTITRE1' => 'mon surtitre 1',
                    'SURTITRE2' =>  'mon surtitre 2',
                    'DESCRIPTIF' =>  'mon descriptif',
                    'DUREE' => '90' ,
                    'DATE' => 'Jan 11 2014 07:59:01:607PM',
                    'IDSPORT' => '48',
                    'KEYWORD' =>  'keyword1 ; keyword2',
                    'NB_VUES' =>  '10520',
                    'TAGS' => 'Tag2'
            )
        );
        
        $mockGuzzle = $this->getMock('\Lequipe\Service\GuzzleService', array('get'));
        $mockGuzzle
            ->expects($this->once())
            ->method('get')
            ->willReturn($response);
        
        $mockSerializerSvc = $this->getMock('\Lequipe\Service\Video\SerializerVideo', array('serializeLast'));
        $mockSerializerSvc
            ->expects($this->once())
            ->method('serializeLast')
            ->willReturn(array('serialize-last'));
        
        $mockMapperSvc = $this->getMock('\Lequipe\Service\Video\MapperVideo', array('getVideos'));
        $mockMapperSvc
            ->expects($this->once())
            ->method('getVideos')
            ->with($response)
            ->willReturn('OK getVideos');
        
        $svc = new \Lequipe\Service\Video\LastVideo();
        $svc->setGuzzleSvc($mockGuzzle);
        $svc->setSerializerSvc($mockSerializerSvc);
        $svc->setMapperSvc($mockMapperSvc);
        $this->assertEquals('OK getVideos', $svc->execute('2','',''));
   }
}
