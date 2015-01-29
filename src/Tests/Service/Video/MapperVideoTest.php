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
                'DMID' => 'x2emsac',
                'TITRE_LONG' => 'la vraie reponse', 
                'TITRE' =>  'la reponse',
                'SURTITRE1' => 'Ou pas',
                'SURTITRE2' =>  'peut être',
                'DESCRIPTIF' =>  'la reponse a la question',
                'DUREE' => '122' ,
                'DATE' => 'Jan 11 2014 07:59:01:607PM',
                'IDSPORT' => '101',
                'KEYWORDS' =>  '42 ; la reponse',
                'NB_VUES' =>  '420',
                'HORS_MOBILES' => '0',
                'PRIVEE' => '0',
                'CHAINE' => 'lequipe',
                'KID' => 'k1W21JxRxTRE0e9WGHy',
                'NB_COMMENTAIRES' => '350',
                'IMAGE' => 'http://placehold.it/650X250',
                'TAGS' => 'Tag1'
            )
        );
        
        $this->assertEquals('42', $vid->getId());
        $this->assertEquals('x2emsac', $vid->getDmid());
        $this->assertEquals('la vraie reponse', $vid->getLongTitle());
        $this->assertEquals('la reponse', $vid->getTitle());
        $this->assertEquals('Ou pas', $vid->getSurtitle1());
        $this->assertEquals('peut être', $vid->getSurtitle2());
        $this->assertEquals('la reponse a la question', $vid->getDescriptif());
        $this->assertEquals('02:02', $vid->getDuree());
        $this->assertEquals('11 JAN. 2014 | 19:59', $vid->getDate());
        $this->assertEquals('101', $vid->getIdSport());
        $this->assertEquals('42 ; la reponse', $vid->getKeywords());
        $this->assertEquals('420', $vid->getNbVues());
        $this->assertEquals('0', $vid->getHorsMobile());
        $this->assertEquals('0', $vid->getPrivee());
        $this->assertEquals('lequipe', $vid->getChaine());
        $this->assertEquals('k1W21JxRxTRE0e9WGHy', $vid->getKid());
        $this->assertEquals('350', $vid->getNbCommentaires());
        $this->assertEquals('http://placehold.it/650X250', $vid->getImage());
        $this->assertEquals('Tag1', $vid->getTags());
        
    }
    
    public function testGetvideos() {

        $svc = new \Lequipe\Service\Video\MapperVideo();
        $actual = $svc->getVideos(
            array( "methodName" =>
                array( "realResults" =>
                    array(
                        'ID' => '42',
                        'DMID' => 'x2emsac',
                        'TITRE_LONG' => 'la vraie reponse', 
                        'TITRE' =>  'la reponse',
                        'SURTITRE1' => 'Ou pas',
                        'SURTITRE2' =>  'peut être',
                        'DESCRIPTIF' =>  'la reponse a la question',
                        'DUREE' => '122' ,
                        'DATE' => 'Jan 11 2014 07:59:01:607PM',
                        'IDSPORT' => '101',
                        'KEYWORDS' =>  '42 ; la reponse',
                        'NB_VUES' =>  '420',
                        'HORS_MOBILES' => '0',
                        'PRIVEE' => '0',
                        'CHAINE' => 'lequipe',
                        'KID' => 'k1W21JxRxTRE0e9WGHy',
                        'NB_COMMENTAIRES' => '350',
                        'IMAGE' => 'http://placehold.it/650X250',
                        'TAGS' => 'Tag1'
                    ),
                    array(
                        'ID' => '38',
                        'DMID' => 'x2ejo21',
                        'TITRE_LONG' => 'mon titre long', 
                        'TITRE' =>  'mon titre',
                        'SURTITRE1' => 'mon surtitre 1',
                        'SURTITRE2' =>  'mon surtitre 2',
                        'DESCRIPTIF' =>  'mon descriptif',
                        'DUREE' => '90' ,
                        'DATE' => 'Jan 11 2014 07:59:01:607PM',
                        'IDSPORT' => '48',
                        'KEYWORDS' =>  'keyword1 ; keyword2',
                        'NB_VUES' =>  '10520',
                        'HORS_MOBILES' => '1',
                        'PRIVEE' => '1',
                        'CHAINE' => 'lequipeLigue1',
                        'KID' => 'k1W21JxRxTRE0e9WGHy',
                        'NB_COMMENTAIRES' => '120',
                        'IMAGE' => 'http://placehold.it/650X250',
                        'TAGS' => 'Tag2'
                    )
                )
            )
        );
        
        $vid1 = new \Lequipe\Entity\Video();
        $vid1->setId('42');
        $vid1->setDmid('x2emsac');
        $vid1->setLongTitle('la vraie reponse');
        $vid1->setTitle('la reponse');
        $vid1->setSurtitle1('Ou pas');
        $vid1->setSurtitle2('peut être');
        $vid1->setDescriptif('la reponse a la question');
        $vid1->setDuree('02:02');
        $vid1->setDate('11 JAN. 2014 | 19:59');
        $vid1->setIdSport('101');
        $vid1->setKeywords('42 ; la reponse');
        $vid1->setNbVues('420');
        $vid1->setHorsMobile('0');
        $vid1->setPrivee('0');
        $vid1->setChaine('lequipe');
        $vid1->setKid('k1W21JxRxTRE0e9WGHy');
        $vid1->setNbCommentaires('350');
        $vid1->setImage('http://placehold.it/650X250');
        $vid1->setTags('Tag1');
        
        $vid2 = new \Lequipe\Entity\Video();
        $vid2->setId('38');
        $vid2->setDmid('x2ejo21');
        $vid2->setLongTitle('mon titre long');
        $vid2->setTitle('mon titre');
        $vid2->setSurtitle1('mon surtitre 1');
        $vid2->setSurtitle2('mon surtitre 2');
        $vid2->setDescriptif('mon descriptif');
        $vid2->setDuree('01:30');
        $vid2->setDate('11 JAN. 2014 | 19:59');
        $vid2->setIdSport('48');
        $vid2->setKeywords('keyword1 ; keyword2');
        $vid2->setNbVues('10520');
        $vid2->setHorsMobile('1');
        $vid2->setPrivee('1');
        $vid2->setChaine('lequipeLigue1');
        $vid2->setKid('k1W21JxRxTRE0e9WGHy');
        $vid2->setNbCommentaires('120');
        $vid2->setImage('http://placehold.it/650X250');
        $vid2->setTags('Tag2');
        
        $result = array($vid1, $vid2);
        
        $this->assertEquals(2, count($result));
        $this->assertEquals($actual, $result);

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
