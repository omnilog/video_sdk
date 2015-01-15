<?php

/**
 * Description of MapperVideoTest
 *
 * @author cguinet
 */
class MapperVideoTest extends \PHPUnit_Framework_TestCase {
     public function testPopulateVideo() {
        
        $vid = new \Lequipe\Entity\Video();
        $svc = new \Lequipe\Service\Video\MapperVideo();
        $svc->populateVideo($vid, array(
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
            )
        );
        
        $this->assertEquals('42', $vid->getId());
        $this->assertEquals('la vraie reponse', $vid->getLongTitle());
        $this->assertEquals('la reponse', $vid->getTitle());
        $this->assertEquals('Ou pas', $vid->getSurtitle1());
        $this->assertEquals('peut être', $vid->getSurtitle2());
        $this->assertEquals('la reponse a la question', $vid->getDescriptif());
        $this->assertEquals('122', $vid->getDuree());
        $this->assertEquals('Jan 11 2014 07:59:01:607PM', $vid->getDate());
        $this->assertEquals('101', $vid->getIdSport());
        $this->assertEquals('42 ; la reponse', $vid->getKeyword());
        $this->assertEquals('420', $vid->getNbVues());
        $this->assertEquals('Tag1', $vid->getTags());
        
    }
    
    public function testGetvideos() {

        $svc = new \Lequipe\Service\Video\MapperVideo();
        $actual = $svc->getVideos(
            array( "methodName" =>
                array( "realResults" =>
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
                )
            )
        );
        
        $vid1 = new \Lequipe\Entity\Video();
        $vid1->setId('42');
        $vid1->setLongTitle('la vraie reponse');
        $vid1->setTitle('la reponse');
        $vid1->setSurtitle1('Ou pas');
        $vid1->setSurtitle2('peut être');
        $vid1->setDescriptif('la reponse a la question');
        $vid1->setDuree('122');
        $vid1->setDate('Jan 11 2014 07:59:01:607PM');
        $vid1->setIdSport('101');
        $vid1->setKeyword('42 ; la reponse');
        $vid1->setNbVues('420');
        $vid1->setTags('Tag1');
        
        $vid2 = new \Lequipe\Entity\Video();
        $vid2->setId('38');
        $vid2->setLongTitle('mon titre long');
        $vid2->setTitle('mon titre');
        $vid2->setSurtitle1('mon surtitre 1');
        $vid2->setSurtitle2('mon surtitre 2');
        $vid2->setDescriptif('mon descriptif');
        $vid2->setDuree('90');
        $vid2->setDate('Jan 11 2014 07:59:01:607PM');
        $vid2->setIdSport('48');
        $vid2->setKeyword('keyword1 ; keyword2');
        $vid2->setNbVues('10520');
        $vid2->setTags('Tag2');
        
        $result = array($vid1, $vid2);
        
        $this->assertEquals(2, count($result));
        $this->assertEquals($result, $actual);

    }
    
    public function testGetTypeVideos() {
        $svc = new \Lequipe\Service\Video\MapperVideo();
        $actual = $svc->getTypeVideos(
            array( "methodename" =>
                array( "monarray" =>
                    array(
                        'ID' => '38',
                        'TYPE' => 'HOME', 
                    )
                )
            )
        );
        
        $typeVid = new \Lequipe\Entity\TypeVideo();
        $typeVid->setId('38');
        $typeVid->setType('HOME');
        
        $this->assertEquals($typeVid, $actual);
    }
    
    public function testPopulateTypeVideo() {
        $typeVid = new \Lequipe\Entity\TypeVideo();
        $svc = new \Lequipe\Service\Video\MapperVideo();
        $svc->populateTypeVideo($typeVid, array(
                'ID' => '676',
                'TYPE' => 'LST',
            )
        );
        
        $this->assertEquals('676', $typeVid->getId());
        $this->assertEquals('LST', $typeVid->getType());
        
    }
}
