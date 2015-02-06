<?php

/**
 * Description of SerializerVideoTest
 *
 * @author cguinet
 */
class SerializerVideoTest extends \PHPUnit_Framework_TestCase {
     public function testSerializeLast() {
        $nbTest = '12';
        $idTagTest = '42';
        $tri = 'TOP';
        $page = "1";
        $jours = "30";
        $arrayExpected = array('nb' => $nbTest,'idtag' => $idTagTest, 'tri' => $tri, 'page' => $page, 'jours' => $jours);

        $class = new \Lequipe\Service\Video\SerializerVideo();
        $this->assertEquals($arrayExpected, $class->serializeLast($nbTest, $idTagTest, $tri, $page, $jours));
     }
     
     public function testSerializeTypeHome() {
        $idTagTest = '42';
        $arrayExpected = array('idtag' => $idTagTest);

        $class = new \Lequipe\Service\Video\SerializerVideo();
        $this->assertEquals($arrayExpected, $class->serializeTypeHome($idTagTest));
     }
     
     public function testSerializeSearch() {
        $termTest = 'ribery';
        $nbTest = 5;
        $page= 1;
        $arrayExpected = array('recherche' => $termTest, "nb" => $nbTest, "page" => $page);

        $class = new \Lequipe\Service\Video\SerializerVideo();
        $this->assertEquals($arrayExpected, $class->serializeSearch($termTest, $nbTest, $page));
     }
     
     public function testSerializeInfo() {
        $id = '12';
        $arrayExpected = array('dmid' => $id);
        $class = new \Lequipe\Service\Video\SerializerVideo();
        $this->assertEquals($arrayExpected, $class->serializeInfo($id));
     }
}
