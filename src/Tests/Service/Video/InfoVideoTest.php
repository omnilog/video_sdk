<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InfoVideoTest
 *
 * @author cguinet
 */
class InfoVideoTest extends \PHPUnit_Framework_TestCase {
    public function testExecute() {
        $response = array(
            array(
                'ID' => '9561',
                'DMID' => 'x2el28u',
                'TITRE_LONG' => 'SOTCHI 2014 : Une journée particulière pour Miller', 
                'TITRE' =>  'Une journée particulière pour Miller',
                'SURTITRE1' => 'SOTCHI 2014',
                'SURTITRE2' =>  '',
                'DESCRIPTIF' =>  'VIDEO SOTCHI 2014 - Avec une médaille de bronze remportée lors du Super-G, Bode Miller est devenu le skieur olympique le plus titré des États-Unis. Une nouvelle récompense qu\'il dédie à son frère, décédé en avril dernier.',
                'DUREE' => '113' ,
                'DATE' => 'Feb 17 2014 12:21:10:000AM',
                'IDSPORT' => '1',
                'KEYWORD' =>  'jeux olympiques,olympisme',
                'NB_VUES' =>  '',
                'HORS_MOBILES' => '0',
                'PRIVEE' => '1',
                'KID' => '',
                'CHAINE' => 'lequipe',
                'NB_COMMENTAIRES' => '0',
                'IMAGE' => 'http://medias.lequipe.fr/img-video/f9a73a1ebcfs/960/0',
                'TAGS' => '<key_0>
                                <ID_TAG>15</ID_TAG>
                                <TYPE>SPORT</TYPE>
                                <LIBELLE>Tous sports</LIBELLE>
                                <ID_OBJET>1</ID_OBJET>
                                <ID_PARENT>13</ID_PARENT>
                          </key_0>'
            )
        );
        
        $mockGuzzle = $this->getMock('\Lequipe\Service\GuzzleService', array('get'));
        $mockGuzzle
            ->expects($this->once())
            ->method('get')
            ->willReturn($response);
        
        $mockSerializerSvc = $this->getMock('\Lequipe\Service\Video\SerializerVideo', array('serializeInfo'));
        $mockSerializerSvc
            ->expects($this->once())
            ->method('serializeInfo')
            ->willReturn(array('serialize-info'));
        
        $mockMapperSvc = $this->getMock('\Lequipe\Service\Video\MapperVideo', array('getVideos'));
        $mockMapperSvc
            ->expects($this->once())
            ->method('getVideos')
            ->with($response)
            ->willReturn('OK getVideos');
        
        $svc = new \Lequipe\Service\Video\InfoVideo();
        $svc->setGuzzleSvc($mockGuzzle);
        $svc->setMapperSvc($mockMapperSvc);
         $svc->setSerializerSvc($mockSerializerSvc);
        $this->assertEquals('OK getVideos', $svc->execute('x2el28u'));
        
    }

}
