<?php
/**
 * Created by PhpStorm.
 * User: ageorgin
 * Date: 17/11/14
 * Time: 11:22
 */

namespace Lequipe\Service;

use Guzzle\Http\Client;
use Guzzle\Http\ClientInterface;

class GuzzleService implements GuzzleServiceInterface
{
    /**
     * @var \Guzzle\Http\ClientInterface
     */
    protected $client;

    private $url;
    private $proxy;

    /**
     * @var UriParamServiceInterface
     */
    private $uriParamSvc;

    /**
     * @var AuthServiceInterface
     */
    private $authSvc;
    
    /**
     * @var DataFormatterServiceInterface
     */
    private $dataFormatterSvc;

    /**
     * @var ExceptionServiceInterface
     */
    private $exceptionSvc = null;

    public function __construct($url = null, ClientInterface $client = null,$proxy = null)
    {
        if (null === $client) {
            $client = new Client();
        }
        $this->client = $client;

        $this->url = $url;
        $this->proxy = $proxy;
    }
    

    /**
     * Send a GET request
     *
     * @param string|array|Url $uri URL or URI template
     *
     * @return ResponseInterface
     * @throws RequestException When an error is encountered
     */
    public function get($uri, $headers = array(), $params = array())
    {
        $this->client->getConfig()->set('curl.options', array(CURLOPT_CONNECTTIMEOUT => 10, CURLOPT_PROXY => $this->proxy));
        $format = $this->getDataFormatterSvc()->getFormat();
        
        $request = $this->client->get(
            $this->getUrl(),
            $headers,
            $this->getAuthSvc()->getAuthOptions()
        );

        $params = array_merge(
            $params,
            $this->getUriParamSvc()->extractParamFromUri($uri),
            $this->getAuthSvc()->getAuthParams(),
            $this->getDataFormatterSvc()->setFormatParams()
        );
        
        foreach ($params as $key => $value) {
            $request->getQuery()->add($key, $value);
        }

        try {
            $result = $request->send();
        } catch (\Exception $e) {
            $apiException = $this->getExceptionSvc()->getApiException($e);
            
            throw $apiException;
        }
        
        if ($format == 'json') {
            return $result->json();
        } else {
            return $result->xml();
        }
        
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param \Lequipe\Service\ExceptionServiceInterface $exceptionSvc
     */
    public function setExceptionSvc($exceptionSvc)
    {
        $this->exceptionSvc = $exceptionSvc;
    }

    /**
     * @return \Lequipe\Service\ExceptionServiceInterface
     */
    public function getExceptionSvc()
    {
        return $this->exceptionSvc;
    }

    /**
     * @param UriParamServiceInterface $uriParamSvc
     */
    public function setUriParamSvc($uriParamSvc)
    {
        $this->uriParamSvc = $uriParamSvc;
    }

    /**
     * @return UriParamServiceInterface
     */
    public function getUriParamSvc()
    {
        return $this->uriParamSvc;
    }

    /**
     * @param AuthServiceInterface $authSvc
     */
    public function setAuthSvc($authSvc)
    {
        $this->authSvc = $authSvc;
    }

    /**
     * @return AuthServiceInterface
     */
    public function getAuthSvc()
    {
        return $this->authSvc;
    }
    
    /**
     * @return DataFormatterServiceInterface
     */
    function getDataFormatterSvc() {
        return $this->dataFormatterSvc;
    }

    /**
     * @param DataFormatterServiceInterface $dataFormatterSvc
     */
    function setDataFormatterSvc($dataFormatterSvc) {
        $this->dataFormatterSvc = $dataFormatterSvc;
    }


}
