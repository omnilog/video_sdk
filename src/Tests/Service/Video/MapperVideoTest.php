<?php

/**
 * Description of MapperVideoTest.
 *
 * @author cguinet
 */
class MapperVideoTest extends \PHPUnit_Framework_TestCase
{
    public function testPopulateVideo()
    {
        $vid = new \Lequipe\Entity\Video();
        $svc = new \Lequipe\Service\Video\MapperVideo();
        $svc->populateVideo($vid, array(
                'ID' => '42',
                'DMID' => 'x2emsac',
                'TITRE_LONG' => 'la vraie reponse',
                'TITRE' => 'la reponse',
                'SURTITRE1' => 'Ou pas',
                'SURTITRE2' => 'peut être',
                'DESCRIPTIF' => 'la reponse a la question',
                'DUREE' => '122',
                'DATE' => 'Jan 11 2014 07:59:01:607PM',
                'IDSPORT' => '101',
                'KEYWORDS' => '42 ; la reponse',
                'NB_VUES' => '420',
                'HORS_MOBILES' => '0',
                'PRIVEE' => '0',
                'CHAINE' => 'lequipe',
                'KID' => 'k1W21JxRxTRE0e9WGHy',
                'NB_COMMENTAIRES' => '350',
                'IMAGE' => 'http://placehold.it/650X250',
                'TAGS' => 'Tag1',
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

    public function testPopulateVideoWithObject()
    {
        $vid = new \Lequipe\Entity\Video();
        $svc = new \Lequipe\Service\Video\MapperVideo();

        $data->ID = '42';
        $data->DMID = 'x2emsac';
        $data->TITRE_LONG = 'la vraie reponse';
        $data->TITRE = 'la reponse';
        $data->SURTITRE1 = 'Ou pas';
        $data->SURTITRE2 = 'peut être';
        $data->DESCRIPTIF = 'la reponse a la question';
        $data->DUREE = '122';
        $data->DATE = 'Jan 11 2014 07:59:01:607PM';
        $data->IDSPORT = '101';
        $data->KEYWORDS = '42 ; la reponse';
        $data->NB_VUES = '420';
        $data->HORS_MOBILES = '0';
        $data->PRIVEE = '0';
        $data->CHAINE = 'lequipe';
        $data->KID = 'k1W21JxRxTRE0e9WGHy';
        $data->NB_COMMENTAIRES = '350';
        $data->IMAGE = 'http://placehold.it/650X250';
        $data->TAGS = 'Tag1';

        $svc->populateVideo($vid, $data);

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

    public function testGetvideos()
    {
        $svc = new \Lequipe\Service\Video\MapperVideo();
        $actual = $svc->getVideos(
            array('methodName' => array('realResults' => array(
                        'ID' => '42',
                        'DMID' => 'x2emsac',
                        'TITRE_LONG' => 'la vraie reponse',
                        'TITRE' => 'la reponse',
                        'SURTITRE1' => 'Ou pas',
                        'SURTITRE2' => 'peut être',
                        'DESCRIPTIF' => 'la reponse a la question',
                        'DUREE' => '122',
                        'DATE' => 'Jan 11 2014 07:59:01:607PM',
                        'IDSPORT' => '101',
                        'KEYWORDS' => '42 ; la reponse',
                        'NB_VUES' => '420',
                        'HORS_MOBILES' => '0',
                        'PRIVEE' => '0',
                        'CHAINE' => 'lequipe',
                        'KID' => 'k1W21JxRxTRE0e9WGHy',
                        'NB_COMMENTAIRES' => '350',
                        'IMAGE' => 'http://placehold.it/650X250',
                        'TAGS' => 'Tag1',
                    ),
                    array(
                        'ID' => '38',
                        'DMID' => 'x2ejo21',
                        'TITRE_LONG' => 'mon titre long',
                        'TITRE' => 'mon titre',
                        'SURTITRE1' => 'mon surtitre 1',
                        'SURTITRE2' => 'mon surtitre 2',
                        'DESCRIPTIF' => 'mon descriptif',
                        'DUREE' => '90',
                        'DATE' => 'Jan 11 2014 07:59:01:607PM',
                        'IDSPORT' => '48',
                        'KEYWORDS' => 'keyword1 ; keyword2',
                        'NB_VUES' => '10520',
                        'HORS_MOBILES' => '1',
                        'PRIVEE' => '1',
                        'CHAINE' => 'lequipeLigue1',
                        'KID' => 'k1W21JxRxTRE0e9WGHy',
                        'NB_COMMENTAIRES' => '120',
                        'IMAGE' => 'http://placehold.it/650X250',
                        'TAGS' => 'Tag2',
                    ),
                ),
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

    public function testGetVideoWithObject()
    {
        $svc = new \Lequipe\Service\Video\MapperVideo();

        $str = '<?xml version="1.0" encoding="UTF-8"?> <videos2 generator="zend" version="1.0">
                <getLastVideos>
                <key_0>
                      <ID>9029</ID>
                      <DMID>x2ejo21</DMID>
                      <TITRE_LONG>Sport Confidentiel - Federer : pas si lisse, l icône</TITRE_LONG>
                      <TITRE>pas si lisse, l icône</TITRE>
                      <SURTITRE1>Sport Confidentiel</SURTITRE1>
                      <SURTITRE2>Federer</SURTITRE2>
                      <DESCRIPTIF>Retrouvez des facettes méconnues de Roger Federer, légende vivante du tennis mondial à travers un portrait diffusé dans Sport Confidentiel à la veille de la finale de la Coupe Davis 2014 remportée par la Suisse.</DESCRIPTIF>
                      <DUREE>695</DUREE>
                      <DATE>Dec 17 2014 04:39:01:000PM</DATE>
                      <IDSPORT>39</IDSPORT>
                      <KEYWORDS>federer,portrait,sport confidentiel,ppremium</KEYWORDS>
                      <NB_VUES>17057</NB_VUES>
                      <HORS_MOBILES>0</HORS_MOBILES>
                      <PRIVEE>0</PRIVEE>
                      <KID/>
                      <CHAINE>lequipe</CHAINE>
                      <NB_COMMENTAIRES>0</NB_COMMENTAIRES>
                      <IMAGE>http://medias.lequipe.fr/img-video/5942c85c024s/960/0</IMAGE>
                      <TAGS>51SPORTTennis393</TAGS>
                </key_0>
                <status>success</status>
                </getLastVideos>
                </videos2>';

        $videos = new SimpleXMLElement($str);
        $actual = $svc->getVideos($videos);

        $vid2 = new \Lequipe\Entity\Video();
        $vid2->setId('9029');
        $vid2->setDmid('x2ejo21');
        $vid2->setLongTitle('Sport Confidentiel - Federer : pas si lisse, l icône');
        $vid2->setTitle('pas si lisse, l icône');
        $vid2->setSurtitle1('Sport Confidentiel');
        $vid2->setSurtitle2('Federer');
        $vid2->setDescriptif('Retrouvez des facettes méconnues de Roger Federer, légende vivante du tennis mondial à travers un portrait diffusé dans Sport Confidentiel à la veille de la finale de la Coupe Davis 2014 remportée par la Suisse.');
        $vid2->setDuree('11:35');
        $vid2->setDate('17 DEC. 2014 | 16:39');
        $vid2->setIdSport('39');
        $vid2->setKeywords('federer,portrait,sport confidentiel,ppremium');
        $vid2->setNbVues('17057');
        $vid2->setHorsMobile('0');
        $vid2->setPrivee('0');
        $vid2->setChaine('lequipe');
        $vid2->setKid('');
        $vid2->setNbCommentaires('0');
        $vid2->setImage('http://medias.lequipe.fr/img-video/5942c85c024s/960/0');
        $vid2->setTags('51SPORTTennis393');

        $result = array($vid2);

        $this->assertEquals(1, count($result));
        $this->assertEquals($result, $actual);
    }

    public function testGetTypeVideos()
    {
        $svc = new \Lequipe\Service\Video\MapperVideo();
        $actual = $svc->getTypeVideos(
            array('methodename' => array('monarray' => array(
                        'ID' => '38',
                        'TYPE' => 'HOME',
                    ),
                ),
            )
        );

        $typeVid = new \Lequipe\Entity\TypeVideo();
        $typeVid->setId('38');
        $typeVid->setType('HOME');

        $this->assertEquals($typeVid, $actual);
    }

    public function testGetTypeVideosWithObject()
    {
        $svc = new \Lequipe\Service\Video\MapperVideo();
        $str = '<?xml version="1.0" encoding="UTF-8"?> <videos2 generator="zend" version="1.0">
                <getTypeHome>
                <key_0>
                      <ID>48</ID>
                      <TYPE>TOP</TYPE>
                </key_0>
                <status>success</status>
                </getTypeHome>
                </videos2>';

        $type = new SimpleXMLElement($str);
        $actual = $svc->getTypeVideos($type);

        $typeVid = new \Lequipe\Entity\TypeVideo();
        $typeVid->setId('48');
        $typeVid->setType('TOP');

        $this->assertEquals($typeVid, $actual);
    }

    public function testPopulateTypeVideo()
    {
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

    public function testPopulateTypeVideoWithObject()
    {
        $typeVid = new \Lequipe\Entity\TypeVideo();

        $data->ID = '676';
        $data->TYPE = 'LST';

        $svc = new \Lequipe\Service\Video\MapperVideo();
        $svc->populateTypeVideo($typeVid, $data);

        $this->assertEquals('676', $typeVid->getId());
        $this->assertEquals('LST', $typeVid->getType());
    }
}
