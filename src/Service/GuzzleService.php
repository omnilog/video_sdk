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

    /**
     * @var UriParamServiceInterface
     */
    private $uriParamSvc;

    /**
     * @var AuthServiceInterface
     */
    private $authSvc;
    
    /**
     * @var DataFormatterInterface
     */
    private $dataFormatterSvc;

    /**
     * @var ExceptionServiceInterface
     */
    private $exceptionService = null;

    public function __construct($url = null, ClientInterface $client = null)
    {
        if (null === $client) {
            $client = new Client();
        }
        $this->client = $client;

        $this->url = $url;
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
    
        $request = $this->client->get(
            $this->getUrl(),
            $headers,
            $this->getAuthSvc()->getAuthOptions()
        );

        $params = array_merge(
            $params,
            $this->getUriParamSvc()->extractParamFromUri($uri),
            $this->getAuthSvc()->getAuthParams()
                
        );
        
        foreach ($params as $key => $value) {
            $request->getQuery()->add($key, $value);
        }

        try {
            $result = $request->send();
        } catch (\Exception $e) {
            $apiException = $this->getExceptionService()->getApiException($e);
            throw $apiException;
        }
        
        $result = $request->send();
        
        // recupération du format
        return $result->$this->getDataFormatterSvc()->getFormat($format);
        
        
        //TMP en ATTENDANT LE PATTERN STRATEGY 
        /*if(isset($params['outputType'])) {
            switch ($params['outputType']) {
                case 'json' :
                    return $result->json();
                    break;
                default :
                    return $result->xml();
                    break;
            }
        } else {
            return $result->xml();
        }*/

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
     * @param \Lequipe\Service\ExceptionServiceInterface $exceptionService
     */
    public function setExceptionService($exceptionService)
    {
        $this->exceptionService = $exceptionService;
    }

    /**
     * @return \Lequipe\Service\ExceptionServiceInterface
     */
    public function getExceptionService()
    {
        return $this->exceptionService;
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
     * @return DataFormatterInterface
     */
    function getDataFormatterSvc() {
        return $this->dataFormatterSvc;
    }

    /**
     * @param DataFormatterInterface $dataFormatterSvc
     */
    function setDataFormatterSvc($dataFormatterSvc) {
        $this->dataFormatterSvc = $dataFormatterSvc;
    }


}
