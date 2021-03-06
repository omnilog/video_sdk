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
    
     public function testPopulateSportWithObjet() {
        
        $sport = new \Lequipe\Entity\Sport();
        
        $data->IDSPORT = '22';
        $data->IDTAG = '48';
        $data->LIBELLE = 'Football';
        
        $svc = new \Lequipe\Service\Sport\MapperSport();
        $svc->populateSport($sport, $data);
        
        $this->assertEquals('48', $sport->getIdTag());
        $this->assertEquals('Football', $sport->getLibelle());
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
    
    public function testGetSportsWithObject() {

        $svc = new \Lequipe\Service\Sport\MapperSport();
        
        $str = '<?xml version="1.0" encoding="UTF-8"?> <videos2 generator="zend" version="1.0">
                <getListSports>
                <key_0>
                      <IDTAG>48</IDTAG>
                      <LIBELLE>Football</LIBELLE>
                      <IDSPORT>36</IDSPORT>
                      <IMPORTANCE>320667</IMPORTANCE>
                </key_0>
                <key_1>
                      <IDTAG>51</IDTAG>
                      <LIBELLE>Tennis</LIBELLE>
                      <IDSPORT>39</IDSPORT>
                      <IMPORTANCE>49456</IMPORTANCE>
                </key_1>
                <status>success</status>
                </getListSports>
                </videos2>';
        
        $sport = new SimpleXMLElement($str);
        $actual = $svc->getSports( $sport);
            
        $sport1 = new \Lequipe\Entity\Sport();
        $sport1->setIdTag('48');
        $sport1->setLibelle('Football');
        $sport1->setIdSport('36');
        
        $sport2 = new \Lequipe\Entity\Sport();
        $sport2->setIdTag('51');
        $sport2->setLibelle('Tennis');
        $sport2->setIdSport('39');

        $result = array($sport1, $sport2);

        $this->assertEquals($result, $actual);
        
    }
}
