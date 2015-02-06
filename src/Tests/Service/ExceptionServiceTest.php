<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExceptionServiceTest
 *
 * @author cguinet
 */
class ExceptionServiceTest extends \PHPUnit_Framework_TestCase {
    public function testGetApiException()
    {
        $svc = new \Lequipe\Service\ExceptionService();
        $exception = $svc->getApiException(new \Exception('message exception', 666));
        $this->assertInstanceOf('\Lequipe\Exception\ApiException', $exception);
        $this->assertEquals(666, $exception->getCode());
        $this->assertEquals('message exception', $exception->getMessage());
    }
    
    /**
     * @dataProvider getApiExceptionDataProvider
     */
    public function testGetApiExceptionResponse($exceptionCode, $exceptionMessage, $bodyCode, $bodyMessage)
    {
        $response = new \Guzzle\Http\Message\Response(404);
        $response->setBody(json_encode(array(
            'error' => array(
                'code' => $bodyCode,
                'message' => $bodyMessage
            )
        )));
        $originException = new \Guzzle\Http\Exception\ClientErrorResponseException($exceptionMessage, $exceptionCode);
        $originException->setResponse($response);
        
        $svc = new \Lequipe\Service\ExceptionService();
        $exception = $svc->getApiException($originException);
        
        $this->assertInstanceOf('\Lequipe\Exception\ApiException', $exception);
        if (null === $bodyCode) {
            $this->assertEquals($exceptionCode, $exception->getCode());
        } else {
            $this->assertEquals($bodyCode, $exception->getCode());
        }
        if (null === $bodyMessage) {
            $this->assertEquals($exceptionMessage, $exception->getMessage());
        } else {
            $this->assertEquals($bodyMessage, $exception->getMessage());
        }
    }
    public function getApiExceptionDataProvider()
    {
        return array(
            array(666, 'message exception', null, null),
            array(666, 'message exception', 123456789, null),
            array(666, 'message exception', null, 'body message'),
            array(666, 'message exception', 123456789, 'body message'),
        );
    }
}
