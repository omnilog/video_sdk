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
            'IDTAG' => '48' ,
            'LIBELLE' => 'Aviron',
            'IDSPORT' => '22' ,
            )
        );
        
        $this->assertEquals('48', $sport->getIdTag());
        $this->assertEquals('Aviron', $sport->getLibelle());
        $this->assertEquals('22', $sport->getIdSport());

    }
    
    public function testGetSports() {

        $svc = new \Lequipe\Service\Sport\MapperSport();
        $actual = $svc->getSports( 
            array( "methodName" =>
                array( "realResults" =>
                    array(
                        'IDTAG' => '48' ,
                        'LIBELLE' => 'Aviron',
                        'IDSPORT' => '22' ,
                    ),
                    array(
                        'IDTAG' => '49' ,
                        'LIBELLE' => 'BMX',
                        'IDSPORT' => '104'
                    )
                )
            )
        );
        
        $sport1 = new \Lequipe\Entity\Sport();
        $sport1->setIdTag('48');
        $sport1->setLibelle('Aviron');
        $sport1->setIdSport('22');
        
        $sport2 = new \Lequipe\Entity\Sport();
        $sport2->setIdTag('49');
        $sport2->setLibelle('BMX');
        $sport2->setIdSport('104');

        $result = array($sport1, $sport2);
        
        $this->assertEquals(2, count($result));
        
    }
}
