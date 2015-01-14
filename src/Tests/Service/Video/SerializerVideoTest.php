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
        $arrayExpected = array('nb' => $nbTest,'idtag' => $idTagTest, 'tri' => $tri);

        $class = new \Lequipe\Service\Video\SerializerVideo();
        $this->assertEquals($arrayExpected, $class->serializeLast($nbTest, $idTagTest, $tri));
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
        $arrayExpected = array('recherche' => $termTest, "nb" => $nbTest);

        $class = new \Lequipe\Service\Video\SerializerVideo();
        $this->assertEquals($arrayExpected, $class->serializeSearch($termTest, $nbTest));
     }
}
