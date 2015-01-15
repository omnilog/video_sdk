<?php

/**
 * Description of MapperSportTest
 *
 * @author cguinet
 */
class MapperSportTest extends \PHPUnit_Framework_TestCase{
    
    public function testPopulateSport() {
        
        $sport = new \Lequipe\Entity\Sport();
        $svc = new \Lequipe\Service\Sport\MapperSport();
        $svc->populateSport($sport, array(
            'IDSPORT' => '22' ,
            'NOM' => 'Aviron'
            )
        );
        
        $this->assertEquals('22', $sport->getIdSport());
        $this->assertEquals('Aviron', $sport->getNom());
        
    }
    
    public function testGetSports() {

        $svc = new \Lequipe\Service\Sport\MapperSport();
        $actual = $svc->getSports( 
            array( "methodName" =>
                array( "realResults" =>
                    array(
                        'IDSPORT' => '22' ,
                        'NOM' => 'Aviron'
                    ),
                    array(
                        'IDSPORT' => '104',
                        'NOM' => 'BMX'
                    )
                )
            )
        );
        
        $sport1 = new \Lequipe\Entity\Sport();
        $sport1->setIdSport('22');
        $sport1->setNom('Aviron');
        
        $sport2 = new \Lequipe\Entity\Sport();
        $sport2->setIdSport('104');
        $sport2->setNom('BMX');
        
        $result = array($sport1, $sport2);
        
        $this->assertEquals(2, count($result));
        $this->assertEquals($result, $actual);

    }
}
