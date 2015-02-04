<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GuzzleServiceTest
 *
 * @author cguinet
 */
class GuzzleServiceTest extends \PHPUnit_Framework_TestCase{
    public function testGet() {
        
        //Mock response
        $mockResponse = $this->getMock('\Guzzle\Http\Message\Response', array('json'), array(), '', false);
        $mockResponse
            ->expects($this->once())
            ->method('json')
            ->willReturn('OK SEND GET');
        
        
        //Mock Request
        $mockRequest = $this->getMock('\Guzzle\Http\Message\Request', array('send'), array(), '', false);
        $mockRequest
            ->expects($this->any())
            ->method('send')
            ->willReturn($mockResponse);

        //Mock client
        $mockClient = $this->getMock('Guzzle\Http\Client', array('get'));
        $mockClient
            ->expects($this->once())
            ->method('get')
            ->with('url/uri', array('headers' => null), array(
                            'auth' => array(
                                'monlogin',
                                'monpassword'
                            )))
            ->willReturn($mockRequest);
        
        //mock Dataformatter
        $mockDataFormatterSvc = $this->getMock('\Lequipe\Service\DataFormatterService', array('getFormat', 'setFormat'), array('format' =>'json'), '', false);
        $mockDataFormatterSvc
           ->expects($this->once())
           ->method('setFormat')
           ->with('json')
           ->willReturn(array('outputType' => 'json'));
        
        $mockDataFormatterSvc
           ->expects($this->once())
           ->method('getFormat')
           ->willReturn('json');
        
        //mock Auth
        //$authParams = array('login' => 'monlogin', 'password' => 'monpassword');
        $mockAuthSvc = $this->getMock('\Lequipe\Service\AuthService', array(), array(), '', false);
        $mockAuthSvc
            ->expects($this->once())
            ->method('getAuthOptions')
            ->willReturn(array(
                            'auth' => array(
                                'monlogin',
                                'monpassword'
                            )
            ));
        
        $mockAuthSvc
            ->expects($this->once())
            ->method('getAuthParams')
           // ->with($authParams)
            ->willReturn(array(
                        'login' => 'monlogin',
                        'password' => 'monpassword'
                    ));
        
       //mock UriParam
        $mockUriParamSvc = $this->getMock('\Lequipe\Service\UriParamService', array());
        $mockUriParamSvc
            ->expects($this->once())
            ->method('extractParamFromUri')
          //  ->with('url/uri')
            ->willReturn(array(
                            'class' => 'url',
                            'method' => 'uri'
                        ));
        
        $svc = new \Lequipe\Service\GuzzleService('url/uri', $mockClient);
        $svc->setDataFormatterSvc($mockDataFormatterSvc);
        $svc->setAuthSvc($mockAuthSvc);
        $svc->setUriParamSvc($mockUriParamSvc);
        
        $this->assertEquals('OK SEND GET', $svc->get('url/uri', array('headers' => null), array()));
    }
}