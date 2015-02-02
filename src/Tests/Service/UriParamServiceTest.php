<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UriParamServiceTest
 *
 * @author cguinet
 */
class UriParamServiceTest  extends \PHPUnit_Framework_TestCase {
    
    public function testExtractParamFromUri() {
        $testUri = "toto/tata";
        $svcUri = new Lequipe\Service\UriParamService();
        $actual = array("class" => "toto", "method" => "tata");
        $this->assertEquals( $actual, $svcUri->extractParamFromUri($testUri));
    }
}
