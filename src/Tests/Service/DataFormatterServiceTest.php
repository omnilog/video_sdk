<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataFormatterServiceTest
 *
 * @author cguinet
 */
class DataFormatterServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testGetFormat() {
        $format = 'xml';
        $formatter = new \Lequipe\Service\DataFormatterService($format);
        $this->assertEquals('xml', $formatter->getFormat());
        
        $format = 'json';
        $formatter = new \Lequipe\Service\DataFormatterService($format);
        $this->assertEquals('json', $formatter->getFormat());
        
        $format = 'toto';
        $formatter = new \Lequipe\Service\DataFormatterService($format);
        $this->assertEquals('toto', $formatter->getFormat());
    }
    
    public function testSetFormatParams() {
        $format = 'xml';
        $formatter = new \Lequipe\Service\DataFormatterService($format);
        $this->assertEquals( array('outputType' => 'xml'),$formatter->setFormatParams() );
    }
}
